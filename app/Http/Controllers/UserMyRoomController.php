<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class UserMyRoomController extends Controller
{
    public function index()
    {
        if (!auth()->user()->hasRole('user')) {
            abort(403, 'Unauthorized action.');
        }

        $tenant = Tenant::with(['room.roomType'])
            ->where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'active'])
            ->first();

        return view('dashboard.role.penyewa.kamar-saya', compact('tenant'));
    }
}
