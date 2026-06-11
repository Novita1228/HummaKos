<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with(['tenant.user', 'tenant.room'])->orderBy('created_at', 'desc')->get();
        $pendingCount = $complaints->where('status', 'pending')->count();
        $totalCount = $complaints->count();

        return view('dashboard.role.admin.keluhan.index', compact('complaints', 'pendingCount', 'totalCount'));
    }

    public function show(Complaint $complaint)
    {
        $complaint->load(['tenant.user', 'tenant.room.roomType']);
        
        return view('dashboard.role.admin.keluhan.show', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved'
        ]);

        $complaint->update(['status' => $validated['status']]);

        return back()->with('success', 'Status keluhan berhasil diperbarui.');
    }
}
