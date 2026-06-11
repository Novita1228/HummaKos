<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Tenant;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();
        $occupiedRooms = Room::where('status', 'occupied')->count();
        $availableRooms = Room::where('status', 'available')->count();
        $maintenanceRooms = Room::where('status', 'maintenance')->count();

        $occupancyRate = $totalRooms > 0 ? round(($occupiedRooms / $totalRooms) * 100) : 0;

        $roomTypes = RoomType::with(['rooms.activeTenant.user'])->get();

        $recentTenants = Tenant::with(['user', 'room.roomType'])
            ->where('status', 'active')
            ->latest()
            ->take(5)
            ->get();

        $activeComplaints = \App\Models\Complaint::where('status', '!=', 'resolved')->count();

        return view('dashboard.role.admin.index', compact(
            'totalRooms',
            'occupiedRooms',
            'availableRooms',
            'maintenanceRooms',
            'occupancyRate',
            'roomTypes',
            'recentTenants',
            'activeComplaints'
        ));
    }
}
