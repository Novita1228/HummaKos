@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="color: #333;">Keluhan Saya</h3>
            <p class="text-muted mb-0" style="font-size: 14px;">Riwayat laporan kendala atau keluhan terkait fasilitas kamar kos.</p>
        </div>
        @if($tenant && $tenant->status == 'active')
            <a href="{{ route('user.complaints.create') }}" class="btn px-4 py-2 text-white fw-bold d-flex align-items-center gap-2" style="background-color: #00897B; border-radius: 8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                Buat Keluhan
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(!$tenant || $tenant->status != 'active')
        <!-- Not Active Tenant State -->
        <div class="dashboard-card text-center py-5 mt-4 d-flex flex-column align-items-center justify-content-center" style="min-height: 400px; border: 1px dashed #ccc;">
            <div class="icon-box bg-light mb-3" style="width: 64px; height: 64px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#9e9e9e" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/></svg>
            </div>
            <h4 class="fw-bold text-dark mb-2">Tidak Bisa Mengirim Keluhan</h4>
            <p class="text-muted mb-4" style="max-width: 400px; font-size: 14px;">Kamu harus memiliki kamar aktif untuk dapat mengirimkan laporan keluhan fasilitas.</p>
        </div>
    @elseif($complaints->isEmpty())
        <!-- Empty State -->
        <div class="dashboard-card text-center py-5 mt-4 d-flex flex-column align-items-center justify-content-center" style="min-height: 400px; border: 1px dashed #ccc;">
            <div class="icon-box bg-light mb-3" style="width: 64px; height: 64px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#9e9e9e" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                </svg>
            </div>
            <h4 class="fw-bold text-dark mb-2">Belum Ada Keluhan</h4>
            <p class="text-muted mb-0" style="max-width: 400px; font-size: 14px;">Kamu belum pernah mengirimkan laporan keluhan apapun.</p>
        </div>
    @else
        <!-- Table -->
        <div class="dashboard-card p-0 overflow-hidden mb-4">
            <div class="table-responsive">
                <table class="table dashboard-table mb-0">
                    <thead>
                        <tr>
                            <th style="font-size: 10px; color: #666; padding-left: 20px;">TANGGAL</th>
                            <th style="font-size: 10px; color: #666;">JUDUL KELUHAN</th>
                            <th style="font-size: 10px; color: #666;">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complaints as $complaint)
                        <tr>
                            <td style="padding-left: 20px;">
                                <div class="text-muted" style="font-size: 13px;">{{ $complaint->created_at->format('d M Y') }}</div>
                                <div class="text-muted" style="font-size: 10px;">{{ $complaint->created_at->format('H:i') }}</div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark mb-1" style="font-size: 13px;">{{ $complaint->title }}</div>
                                <div class="text-muted" style="font-size: 12px; max-width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $complaint->description }}
                                </div>
                            </td>
                            <td>
                                @if($complaint->status == 'pending')
                                    <span class="badge rounded-pill bg-warning text-dark px-3 py-1" style="font-size: 10px; font-weight: 600;">Pending</span>
                                @elseif($complaint->status == 'in_progress')
                                    <span class="badge rounded-pill bg-info text-white px-3 py-1" style="font-size: 10px; font-weight: 600;">In Progress</span>
                                @else
                                    <span class="badge rounded-pill bg-success px-3 py-1" style="font-size: 10px; font-weight: 600;">Resolved</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
