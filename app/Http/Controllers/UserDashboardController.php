<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->hasRole('user')) {
            abort(403, 'Unauthorized action.');
        }

        // Check if user has an active room rental
        $tenant = Tenant::with(['room.roomType'])
            ->where('user_id', auth()->id())
            ->where('status', 'active')
            ->first();

        $hasRoom = $tenant ? true : false;
        
        // Allow force showing the slicing with ?demo=1
        if ($request->has('demo')) {
            $hasRoom = true;
        }

        return view('dashboard.role.penyewa.index', compact('hasRoom', 'tenant'));
    }
}
