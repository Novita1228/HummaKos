<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserRoomController extends Controller
{
    public function index()
    {
        // Fetch available rooms, paginated
        $rooms = Room::with('roomType')
            ->where('status', 'available')
            ->latest()
            ->paginate(6);

        // Calculate how many room types have available rooms
        $availableRoomTypesCount = Room::where('status', 'available')
            ->distinct('room_type_id')
            ->count('room_type_id');

        return view('dashboard.role.penyewa.cari-kamar', compact('rooms', 'availableRoomTypesCount'));
    }

    public function show(Room $room)
    {
        $room->load('roomType');

        return view('dashboard.role.penyewa.detail-kamar', compact('room'));
    }

    public function book(Room $room)
    {
        $room->load('roomType');

        return view('dashboard.role.penyewa.pesan-kamar', compact('room'));
    }

    public function storeBooking(Request $request, Room $room)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'whatsapp' => 'required|string',
            'email' => 'required|email',
            'ktp' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'durasi' => 'required|string',
            'foto_ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'terms' => 'accepted'
        ]);

        $foto_ktp_path = null;
        if ($request->hasFile('foto_ktp')) {
            $foto_ktp_path = $request->file('foto_ktp')->store('documents/ktp', 'public');
        }

        // Calculate end date based on duration
        $startDate = Carbon::parse($request->tanggal_masuk);
        $months = (int) filter_var($request->durasi, FILTER_SANITIZE_NUMBER_INT);
        $endDate = $startDate->copy()->addMonths($months);

        $tenant = Tenant::create([
            'user_id' => auth()->id(),
            'room_id' => $room->id,
            'nama_lengkap' => $request->nama_lengkap,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'ktp_number' => $request->ktp,
            'foto_ktp' => $foto_ktp_path,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'durasi' => $request->durasi,
            'status' => 'pending',
            'amount_paid' => 0,
        ]);

        return redirect()->route('user.room.payment', ['room' => $room->id, 'tenant' => $tenant->id]);
    }

    public function payment(Room $room, Tenant $tenant)
    {
        if ($tenant->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $room->load('roomType');

        return view('dashboard.role.penyewa.pembayaran', compact('room', 'tenant'));
    }

    public function storePayment(Request $request, Room $room, Tenant $tenant)
    {
        if ($tenant->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_path = $request->file('bukti_pembayaran')->store('documents/pembayaran', 'public');
            
            $tenant->update([
                'bukti_pembayaran' => $bukti_path,
                // Status remains pending until admin approves
            ]);
        }

        return redirect()->route('user.my-room')->with('success', 'Bukti pembayaran berhasil diunggah! Menunggu konfirmasi admin.');
    }
}
