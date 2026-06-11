<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class AdminTenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with(['user', 'room'])->orderBy('created_at', 'desc')->get();
        $pendingCount = $tenants->where('status', 'pending')->count();
        $totalCount = $tenants->count();

        return view('dashboard.role.admin.penyewa.index', compact('tenants', 'pendingCount', 'totalCount'));
    }

    public function show(Tenant $tenant)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $tenant->load(['user', 'room.roomType']);
        
        return view('dashboard.role.admin.penyewa.show', compact('tenant'));
    }

    public function approve(Tenant $tenant)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $tenant->update(['status' => 'active']);
        
        // Also update room status
        if ($tenant->room) {
            $tenant->room->update(['status' => 'occupied']);
        }

        return redirect()->route('admin.tenants.index')->with('success', 'Penyewa berhasil disetujui.');
    }

    public function reject(Tenant $tenant)
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $tenant->update(['status' => 'rejected']);

        return redirect()->route('admin.tenants.index')->with('success', 'Permintaan penyewa ditolak.');
    }
}
