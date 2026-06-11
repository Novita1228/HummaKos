@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <!-- Total Keluhan -->
        <div class="col-12 col-md-4">
            <div class="dashboard-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div class="text-muted" style="font-size: 13px; font-weight: 600;">Total Keluhan</div>
                    <div class="icon-box bg-transparent" style="width: auto; height: auto;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00897B" viewBox="0 0 16 16">
                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="fw-bold mb-1" style="color: #333; font-size: 32px;">{{ $totalCount }}</h2>
                <div class="d-flex align-items-center gap-1 text-muted" style="font-size: 12px;">
                    <span style="color: #00897B; font-weight: 600;">Semua riwayat keluhan</span>
                </div>
            </div>
        </div>
        
        <!-- Pending -->
        <div class="col-12 col-md-4">
            <div class="dashboard-card h-100 p-4" style="border: 1px solid #FF9800;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div class="text-muted" style="font-size: 13px; font-weight: 600;">Pending</div>
                    <div class="icon-box bg-transparent" style="width: auto; height: auto;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FF9800" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="fw-bold mb-1" style="color: #333; font-size: 32px;">{{ $pendingCount }}</h2>
                <div class="text-muted" style="font-size: 12px;">
                    Belum diproses
                </div>
            </div>
        </div>

        <!-- Selesai -->
        <div class="col-12 col-md-4">
            <div class="dashboard-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div class="text-muted" style="font-size: 13px; font-weight: 600;">Selesai</div>
                    <div class="icon-box bg-transparent" style="width: auto; height: auto;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00897B" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="fw-bold mb-1" style="color: #333; font-size: 32px;">{{ $complaints->where('status', 'resolved')->count() }}</h2>
                <div class="text-muted" style="font-size: 12px;">
                    Keluhan tuntas
                </div>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="dashboard-card p-0 overflow-hidden mb-4">
        <!-- Toolbar -->
        <div class="d-flex flex-column flex-md-row justify-content-between p-3 border-bottom gap-3">
            <div class="position-relative" style="width: 100%; max-width: 350px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#9E9E9E" class="position-absolute" style="left: 12px; top: 11px;" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                <input type="text" class="form-control" placeholder="Cari penyewa atau judul keluhan..." style="padding-left: 36px; font-size: 13px; background-color: #f8f9fa; border: 1px solid #eef0f2; border-radius: 8px;">
            </div>
            <button class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2" style="font-size: 12px; font-weight: 600; background-color: #f8f9fa; white-space: nowrap;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zM2.646 2v1.207l4.155 4.986A.5.5 0 0 1 7 8.5v4.793l2-.667V8.5a.5.5 0 0 1 .199-.393L13.354 3.207V2H2.646z"/></svg>
                Filter Status
            </button>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table dashboard-table mb-0">
                <thead>
                    <tr>
                        <th style="font-size: 10px; color: #666; padding-left: 20px;">Penyewa</th>
                        <th style="font-size: 10px; color: #666;">Judul Keluhan</th>
                        <th style="font-size: 10px; color: #666;">Tanggal</th>
                        <th style="font-size: 10px; color: #666;">Status</th>
                        <th style="font-size: 10px; color: #666;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $complaint)
                    <tr>
                        <td style="padding-left: 20px;">
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($complaint->tenant->nama_lengkap ?? $complaint->tenant->user->name) }}&background=random" alt="Avatar" class="rounded-circle" width="36" height="36" style="object-fit: cover;">
                                <div>
                                    <div class="fw-bold" style="font-size: 13px; color: #333;">{{ $complaint->tenant->nama_lengkap ?? $complaint->tenant->user->name }}</div>
                                    <div class="text-muted" style="font-size: 11px;">Kamar {{ $complaint->tenant->room->room_number ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold" style="font-size: 13px; color: #333;">{{ $complaint->title }}</div>
                            <div class="text-muted text-truncate" style="font-size: 11px; max-width: 250px;">{{ $complaint->description }}</div>
                        </td>
                        <td>
                            <div style="font-size: 12px; color: #333;">
                                {{ $complaint->created_at->format('d M Y') }}<br><span class="text-muted">{{ $complaint->created_at->format('H:i') }}</span>
                            </div>
                        </td>
                        <td>
                            @if($complaint->status === 'pending')
                                <span class="badge rounded-pill bg-warning text-dark px-2 py-1" style="font-size: 10px; font-weight: 600;">Pending</span>
                            @elseif($complaint->status === 'in_progress')
                                <span class="badge rounded-pill bg-info text-white px-2 py-1" style="font-size: 10px; font-weight: 600;">Diproses</span>
                            @else
                                <span class="badge rounded-pill bg-success px-2 py-1" style="font-size: 10px; font-weight: 600;">Selesai</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <a href="{{ route('admin.complaints.show', $complaint) }}" class="btn btn-primary btn-sm px-3" style="font-size: 11px; font-weight: 600; padding-top: 5px; padding-bottom: 5px; background-color: #00796B; border-color: #00796B;">Lihat Detail</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data keluhan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Pagination -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center p-3 border-top" style="background-color: #fafafa;">
            <span class="text-muted mb-2 mb-md-0" style="font-size: 11px;">Menampilkan 1 - 6 dari 6 keluhan</span>
            <div class="d-flex align-items-center gap-2" style="font-size: 11px; font-weight: 600;">
                <button class="btn btn-link text-muted p-0 text-decoration-none">&lt;</button>
                <button class="btn btn-primary btn-sm px-2 py-0" style="font-size: 11px; min-width: 20px; background-color: #00897B; border-color: #00897B;">1</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">2</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">3</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">&gt;</button>
            </div>
        </div>
    </div>
</div>
@endsection
