<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRoomController extends Controller
{
    /**
     * Display room management page with all room types and rooms.
     */
    public function index()
    {
        $totalRooms = Room::count();
        $occupiedRooms = Room::where('status', 'occupied')->count();
        $availableRooms = Room::where('status', 'available')->count();
        $maintenanceRooms = Room::where('status', 'maintenance')->count();
        $occupancyRate = $totalRooms > 0 ? round(($occupiedRooms / $totalRooms) * 100) : 0;

        $roomTypes = RoomType::with(['rooms.activeTenant.user'])->get();

        return view('dashboard.role.admin.kamar.index', compact(
            'totalRooms',
            'occupiedRooms',
            'availableRooms',
            'maintenanceRooms',
            'occupancyRate',
            'roomTypes'
        ));
    }

    // ========== ROOM TYPE CRUD ==========

    /**
     * Show form to create a new room type.
     */
    public function createType()
    {
        return view('dashboard.role.admin.kamar.create-type');
    }

    /**
     * Store a new room type.
     */
    public function storeType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:room_types,name',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'facilities' => 'nullable|string',
        ]);

        RoomType::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'facilities' => $request->facilities ? array_map('trim', explode(',', $request->facilities)) : null,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Tipe kamar berhasil ditambahkan!');
    }

    /**
     * Show form to edit a room type.
     */
    public function editType(RoomType $roomType)
    {
        return view('dashboard.role.admin.kamar.edit-type', compact('roomType'));
    }

    /**
     * Update an existing room type.
     */
    public function updateType(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:room_types,name,' . $roomType->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'facilities' => 'nullable|string',
        ]);

        $roomType->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'facilities' => $request->facilities ? array_map('trim', explode(',', $request->facilities)) : null,
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Tipe kamar berhasil diperbarui!');
    }

    /**
     * Delete a room type and all its rooms.
     */
    public function destroyType(RoomType $roomType)
    {
        $roomType->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Tipe kamar berhasil dihapus!');
    }

    // ========== ROOM CRUD ==========

    /**
     * Show form to create a new room.
     */
    public function create()
    {
        $roomTypes = RoomType::all();
        return view('dashboard.role.admin.kamar.create-room', compact('roomTypes'));
    }

    /**
     * Store a new room.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|string|max:255|unique:rooms,room_number',
            'room_type_id' => 'required|exists:room_types,id',
            'floor' => 'required|string|max:255',
            'status' => 'required|in:available,occupied,maintenance',
            'image_1' => 'nullable|image|max:2048',
            'image_2' => 'nullable|image|max:2048',
            'image_3' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('room_number', 'room_type_id', 'floor', 'status');

        if ($request->hasFile('image_1')) {
            $data['image_1'] = $request->file('image_1')->store('rooms', 'public');
        }
        if ($request->hasFile('image_2')) {
            $data['image_2'] = $request->file('image_2')->store('rooms', 'public');
        }
        if ($request->hasFile('image_3')) {
            $data['image_3'] = $request->file('image_3')->store('rooms', 'public');
        }

        Room::create($data);

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil ditambahkan!');
    }

    /**
     * Show form to edit a room.
     */
    public function edit(Room $room)
    {
        $roomTypes = RoomType::all();
        return view('dashboard.role.admin.kamar.edit-room', compact('room', 'roomTypes'));
    }

    /**
     * Update an existing room.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|string|max:255|unique:rooms,room_number,' . $room->id,
            'room_type_id' => 'required|exists:room_types,id',
            'floor' => 'required|string|max:255',
            'status' => 'required|in:available,occupied,maintenance',
            'image_1' => 'nullable|image|max:2048',
            'image_2' => 'nullable|image|max:2048',
            'image_3' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('room_number', 'room_type_id', 'floor', 'status');

        if ($request->hasFile('image_1')) {
            if ($room->image_1) {
                Storage::disk('public')->delete($room->image_1);
            }
            $data['image_1'] = $request->file('image_1')->store('rooms', 'public');
        }
        
        if ($request->hasFile('image_2')) {
            if ($room->image_2) {
                Storage::disk('public')->delete($room->image_2);
            }
            $data['image_2'] = $request->file('image_2')->store('rooms', 'public');
        }

        if ($request->hasFile('image_3')) {
            if ($room->image_3) {
                Storage::disk('public')->delete($room->image_3);
            }
            $data['image_3'] = $request->file('image_3')->store('rooms', 'public');
        }

        $room->update($data);

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil diperbarui!');
    }

    /**
     * Delete a room.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil dihapus!');
    }
}
