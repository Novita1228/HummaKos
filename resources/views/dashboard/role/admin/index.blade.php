@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Header -->
    <div class="mb-4">
        <h4 class="fw-bold mb-1" style="color: #333;">Dashboard Overview</h4>
        <p class="text-muted" style="font-size: 14px;">Welcome back, manage your property operations effortlessly.</p>
    </div>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <!-- Total Rooms -->
        <div class="col-6 col-lg-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box bg-teal-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                        </svg>
                    </div>
                    <span class="text-muted d-none d-sm-inline" style="font-size: 12px; font-weight: 500;">Total Rooms</span>
                </div>
                <div class="text-muted d-sm-none mb-1" style="font-size: 11px;">Total Rooms</div>
                <h3 class="fw-bold mb-0">{{ $totalRooms }}</h3>
            </div>
        </div>

        <!-- Kamar Terisi -->
        <div class="col-6 col-lg-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box bg-gray-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#757575" viewBox="0 0 16 16">
                            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                        </svg>
                    </div>
                    <span class="status-badge bg-teal-light d-none d-sm-inline">{{ $occupancyRate }}% Occupied</span>
                </div>
                <div class="text-muted mb-1" style="font-size: 13px;">Kamar Terisi</div>
                <h3 class="fw-bold mb-0">{{ $occupiedRooms }}</h3>
            </div>
        </div>

        <!-- Kamar Kosong -->
        <div class="col-6 col-lg-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box bg-gray-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#757575" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                        </svg>
                    </div>
                    <span class="status-badge bg-gray-light d-none d-sm-inline">Available</span>
                </div>
                <div class="text-muted mb-1" style="font-size: 13px;">Kamar Kosong</div>
                <h3 class="fw-bold mb-0">{{ $availableRooms }}</h3>
            </div>
        </div>

        <!-- Keluhan Aktif -->
        <div class="col-6 col-lg-3">
            <div class="dashboard-card h-100" style="border-color: #ffebee;">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box bg-red-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.437-.99.98-1.767L8.982 1.566z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                        </svg>
                    </div>
                    <span class="status-badge bg-red-light d-none d-sm-inline">Action Required</span>
                </div>
                <div class="text-muted mb-1" style="font-size: 13px;">Keluhan Aktif</div>
                <h3 class="fw-bold mb-0 text-danger">{{ $activeComplaints }}</h3>
            </div>
        </div>
    </div>

    <!-- Middle Row -->
    <div class="row g-3 mb-4">
        <!-- Matriks Ketersediaan Kamar -->
        <div class="col-12 col-lg-8">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0" style="font-size: 16px;">Matriks Ketersediaan Kamar</h5>
                    <div class="room-legend">
                        <div><span class="legend-dot terisi"></span> Terisi</div>
                        <div><span class="legend-dot kosong"></span> Kosong</div>
                    </div>
                </div>

                @forelse($roomTypes as $type)
                <div class="mb-4">
                    <h6 class="text-muted mb-2" style="font-size: 13px;">{{ $type->name }}</h6>
                    <div class="room-grid">
                        @foreach($type->rooms as $room)
                        <div class="room-box {{ $room->status === 'occupied' ? 'terisi' : ($room->status === 'maintenance' ? 'maintenance' : 'kosong') }}">
                            {{ $room->room_number }}
                            <br>
                            @if($room->status === 'occupied')
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="mt-1" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="mt-1" viewBox="0 0 16 16"><path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/><path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/></svg>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="text-center text-muted py-4">
                    <p class="mb-2">Belum ada data kamar.</p>
                    <a href="{{ route('admin.rooms.index') }}" class="btn btn-sm btn-primary">Kelola Kamar</a>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Penyewa Baru -->
        <div class="col-12 col-lg-4">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0" style="font-size: 16px;">Penyewa Baru</h5>
                    <a href="#" class="text-decoration-none" style="font-size: 12px; font-weight: 600; color: #00897B;">View All</a>
                </div>

                <div class="tenant-list">
                    @forelse($recentTenants as $tenant)
                    <div class="tenant-item">
                        <div class="d-flex gap-3 align-items-center">
                            <img src="{{ asset('assets/img/default-avatar.png') }}" class="rounded-circle" width="40" height="40" alt="Avatar">
                            <div>
                                <h6 class="mb-0 fw-bold" style="font-size: 13px;">{{ $tenant->user->name ?? '-' }}</h6>
                                <small class="text-muted" style="font-size: 11px;">Room {{ $tenant->room->room_number ?? '-' }} • {{ $tenant->room->roomType->name ?? '-' }}</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="text-muted mb-1" style="font-size: 11px;">{{ $tenant->created_at->diffForHumans() }}</div>
                            <span class="status-badge bg-teal-light" style="font-size: 10px; padding: 2px 6px;">Paid</span>
                        </div>
                    </div>
                    @empty
                    <div class="text-center text-muted py-3">
                        <p class="mb-0" style="font-size: 13px;">Belum ada penyewa.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Row -->
    <div class="row g-3 mb-4">
        <!-- Payment Status Overview -->
        <div class="col-12">
            <div class="dashboard-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0" style="font-size: 16px;">Payment Status Overview</h5>

                        

                </div>

                <div class="table-responsive">
                    <table class="table dashboard-table mb-0">
                        <thead>
                            <tr>
                                <th>TENANT</th>
                                <th>ROOM</th>
                                <th>DUE DATE</th>
                                <th>AMOUNT</th>
                                <th>STATUS</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentTenants as $tenant)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="table-avatar">{{ strtoupper(substr($tenant->user->name ?? 'N', 0, 1)) }}{{ strtoupper(substr(explode(' ', $tenant->user->name ?? 'A')[1] ?? '', 0, 1)) }}</div>
                                        <span class="fw-bold">{{ $tenant->user->name ?? '-' }}</span>
                                    </div>
                                </td>
                                <td>Room {{ $tenant->room->room_number ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($tenant->end_date)->format('M d, Y') }}</td>
                                <td>Rp {{ number_format($tenant->amount_paid, 0, ',', '.') }}</td>
                                <td>
                                    <span class="status-badge {{ $tenant->status === 'active' ? 'bg-teal-light' : 'bg-red-light' }}">
                                        {{ $tenant->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">Belum ada data pembayaran.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
