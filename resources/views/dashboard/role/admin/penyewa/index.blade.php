@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Header Section -->
    <div class="mb-4">
        <h4 class="fw-bold mb-1" style="color: #333;">Kelola Penyewa</h4>
        <p class="text-muted mb-0" style="font-size: 14px;">Kelola direktori penyewa dan tinjau permintaan sewa masuk.</p>
    </div>

    <!-- Summary Cards -->
    <div class="row g-3 mb-5">
        <!-- Total Penyewa -->
        <div class="col-12 col-md-6">
            <div class="dashboard-card h-100 py-3 px-4">
                <div class="text-muted mb-2" style="font-size: 11px; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase;">Total Penyewa</div>
                <div class="d-flex justify-content-between align-items-end">
                    <h2 class="fw-bold mb-0" style="color: #333;">{{ $totalCount }}</h2>
                    <div class="d-flex align-items-center gap-1 text-teal" style="font-size: 12px; color: #00897B; font-weight: 600;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/></svg>
                        +12%
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Permintaan Pending -->
        <div class="col-12 col-md-6">
            <div class="dashboard-card h-100 py-3 px-4" style="background-color: #E8F5E9; border: 1px solid #C8E6C9;">
                <div class="text-teal mb-2" style="font-size: 11px; font-weight: 700; color: #00796B; letter-spacing: 0.5px; text-transform: uppercase;">Permintaan Pending</div>
                <div class="d-flex justify-content-between align-items-end">
                    <h2 class="fw-bold mb-0" style="color: #004D40;">{{ $pendingCount }}</h2>
                    <span class="badge rounded-pill" style="background-color: #00695C; font-size: 10px; padding: 4px 10px;">NEW</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Header Title -->
    <div class="d-flex align-items-center gap-2 mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00897B" viewBox="0 0 16 16">
            <path d="M4.5 11a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zM3 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM1.5 2.5A1.5 1.5 0 0 1 3 1h10a1.5 1.5 0 0 1 1.5 1.5v5H1.5v-5zM1 8h14v6.5a1.5 1.5 0 0 1-1.5 1.5H2.5A1.5 1.5 0 0 1 1 14.5V8zm4 4.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 1 0v-1a.5.5 0 0 0-.5-.5z"/>
        </svg>
        <h5 class="fw-bold mb-0" style="color: #333; font-size: 16px;">Permintaan Sewa Baru</h5>
        <span class="badge rounded-pill bg-teal-light text-teal" style="font-size: 11px; color: #00897B; padding: 4px 10px; margin-left: 8px;">{{ $pendingCount }} Pending</span>
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
                        <th style="font-size: 10px; color: #666; padding-left: 20px;">NAMA</th>
                        <th style="font-size: 10px; color: #666;">DETAIL KONTAK</th>
                        <th style="font-size: 10px; color: #666;">KAMAR</th>
                        <th style="font-size: 10px; color: #666;">BUKTI TF</th>
                        <th style="font-size: 10px; color: #666;">STATUS</th>
                        <th style="font-size: 10px; color: #666; text-align: center;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tenants as $tenant)
                    <tr>
                        <td style="padding-left: 20px;">
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($tenant->nama_lengkap ?? $tenant->user->name) }}&background=random" alt="Avatar" class="rounded-circle" width="36" height="36" style="object-fit: cover;">
                                <div>
                                    <div class="fw-bold" style="font-size: 13px; color: #333;">{{ $tenant->nama_lengkap ?? $tenant->user->name }}</div>
                                    <div class="text-muted" style="font-size: 10px;">Joined {{ $tenant->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column gap-1">
                                <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 12px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/></svg>
                                    {{ $tenant->email ?? $tenant->user->email }}
                                </div>
                                <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 12px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg>
                                    {{ $tenant->whatsapp ?? '-' }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2 fw-bold" style="font-size: 13px; color: #333;">
                                <span class="legend-dot {{ $tenant->status == 'active' ? 'terisi' : 'kosong' }}" style="width: 6px; height: 6px; {{ $tenant->status == 'active' ? '' : 'background-color: #ccc;' }}"></span>
                                {{ $tenant->room->room_number ?? '-' }}
                            </div>
                        </td>
                        <td>
                            @if($tenant->bukti_pembayaran)
                                <a href="{{ asset('storage/' . $tenant->bukti_pembayaran) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $tenant->bukti_pembayaran) }}" alt="Bukti TF" class="rounded" width="40" height="40" style="object-fit: cover; cursor: pointer; border: 1px solid #e0e0e0;">
                                </a>
                            @else
                                <span class="text-muted" style="font-size: 11px;">Belum ada</span>
                            @endif
                        </td>
                        <td>
                            @if($tenant->status == 'pending')
                                <span class="badge rounded-pill bg-warning text-dark px-3 py-1" style="font-size: 10px; font-weight: 600;">Pending</span>
                            @elseif($tenant->status == 'active')
                                <span class="badge rounded-pill px-3 py-1" style="background-color: #e8f5e9; color: #2e7d32; font-size: 10px; font-weight: 600;">Active</span>
                            @else
                                <span class="badge rounded-pill bg-danger px-3 py-1" style="color: white; font-size: 10px; font-weight: 600;">{{ ucfirst($tenant->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <a href="{{ route('admin.tenants.show', $tenant) }}" class="btn btn-link p-0" style="color: #00897B;" title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>
                                </a>
                                @if($tenant->status == 'pending')
                                    <form action="{{ route('admin.tenants.reject', $tenant) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 text-danger" title="Tolak" onclick="return confirm('Tolak penyewa ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.tenants.approve', $tenant) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 text-success" title="Terima" onclick="return confirm('Setujui penyewa ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada penyewa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Pagination -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center p-3 border-top" style="background-color: #fafafa;">
            <span class="text-muted mb-2 mb-md-0" style="font-size: 11px;">Showing 1 to 2 of 12 tenants</span>
            <div class="d-flex align-items-center gap-2" style="font-size: 11px; font-weight: 600;">
                <button class="btn btn-link text-muted p-0 text-decoration-none">&lt;</button>
                <button class="btn btn-primary btn-sm px-2 py-0" style="font-size: 11px; min-width: 20px; background-color: #00897B; border-color: #00897B;">1</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">2</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">3</button>
                <span class="text-muted">...</span>
                <button class="btn btn-link text-muted p-0 text-decoration-none">321</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">&gt;</button>
            </div>
        </div>
    </div>

    <!-- View All Link -->
    <div class="text-center mt-3 mb-5">
        <a href="#" class="text-decoration-none" style="font-size: 12px; font-weight: 600; color: #00897B;">Lihat Semua Permintaan (12)</a>
    </div>
</div>
@endsection
