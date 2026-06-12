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

        $nextDueDate = null;
        $showPaymentButton = false;

        if ($tenant && $tenant->status === 'active') {
            $startDate = \Carbon\Carbon::parse($tenant->start_date);
            $endDate = \Carbon\Carbon::parse($tenant->end_date);
            $now = \Carbon\Carbon::now();

            $monthsPassed = $startDate->diffInMonths($now);
            $nextDueDate = $startDate->copy()->addMonths($monthsPassed + 1);

            if ($nextDueDate->greaterThanOrEqualTo($endDate)) {
                $showPaymentButton = false;
            } else {
                $daysToDueDate = $now->diffInDays($nextDueDate, false);
                $showPaymentButton = $daysToDueDate <= 7;
            }
        }

        return view('dashboard.role.penyewa.kamar-saya', compact('tenant', 'nextDueDate', 'showPaymentButton'));
    }
}
