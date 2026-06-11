<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Tenant;
use Illuminate\Http\Request;

class UserComplaintController extends Controller
{
    public function index()
    {
        $tenant = Tenant::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'active'])
            ->first();

        $complaints = collect();
        if ($tenant) {
            $complaints = Complaint::where('tenant_id', $tenant->id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('dashboard.role.penyewa.keluhan.index', compact('tenant', 'complaints'));
    }

    public function create()
    {
        $tenant = Tenant::where('user_id', auth()->id())
            ->where('status', 'active')
            ->first();

        if (!$tenant) {
            return redirect()->route('user.complaints.index')->with('error', 'Anda harus memiliki kamar aktif untuk mengirim keluhan.');
        }

        return view('dashboard.role.penyewa.keluhan.create', compact('tenant'));
    }

    public function store(Request $request)
    {
        $tenant = Tenant::where('user_id', auth()->id())
            ->where('status', 'active')
            ->first();

        if (!$tenant) {
            return redirect()->route('user.complaints.index')->with('error', 'Anda harus memiliki kamar aktif untuk mengirim keluhan.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('complaints', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['tenant_id'] = $tenant->id;
        $validated['status'] = 'pending';

        Complaint::create($validated);

        return redirect()->route('user.complaints.index')->with('success', 'Keluhan berhasil dikirim.');
    }
}
