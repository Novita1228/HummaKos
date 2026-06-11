@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Back Button -->
    <a href="{{ route('admin.complaints.index') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-4" style="color: #00897B; font-size: 13px; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
        Kembali ke Daftar Keluhan
    </a>

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h4 class="fw-bold mb-1" style="color: #333;">Detail Keluhan</h4>
            <p class="text-muted mb-0" style="font-size: 14px;">Informasi rinci terkait keluhan yang disampaikan oleh penyewa.</p>
        </div>
        <div>
            @if($complaint->status == 'pending')
                <span class="badge rounded-pill bg-warning text-dark px-3 py-2" style="font-size: 12px; font-weight: 600;">⏳ Menunggu Diproses</span>
            @elseif($complaint->status == 'in_progress')
                <span class="badge rounded-pill bg-info text-white px-3 py-2" style="font-size: 12px; font-weight: 600;">🔧 Sedang Diproses</span>
            @elseif($complaint->status == 'resolved')
                <span class="badge rounded-pill bg-success px-3 py-2" style="font-size: 12px; font-weight: 600;">✅ Selesai</span>
            @endif
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Left Column: Complaint Details -->
        <div class="col-12 col-lg-8">
            <div class="dashboard-card p-0 overflow-hidden mb-4">
                <div class="p-4 border-bottom d-flex align-items-center gap-2" style="background-color: #f8f9fa;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00897B" viewBox="0 0 16 16"><path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/></svg>
                    <h6 class="fw-bold mb-0" style="color: #00897B;">Informasi Keluhan</h6>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <div class="text-muted mb-1" style="font-size: 11px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Judul Keluhan</div>
                        <h5 class="fw-bold text-dark">{{ $complaint->title }}</h5>
                    </div>
                    <div class="mb-4">
                        <div class="text-muted mb-1" style="font-size: 11px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Deskripsi Detail</div>
                        <div class="p-3 bg-light rounded-3 text-dark" style="font-size: 14px; white-space: pre-wrap;">{{ $complaint->description }}</div>
                    </div>
                    <div class="mb-0">
                        <div class="text-muted mb-2" style="font-size: 11px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Lampiran Foto</div>
                        @if($complaint->image)
                            <a href="{{ asset('storage/' . $complaint->image) }}" target="_blank">
                                <img src="{{ asset('storage/' . $complaint->image) }}" alt="Lampiran Keluhan" class="img-fluid rounded-3 shadow-sm border" style="max-height: 300px; object-fit: cover;">
                            </a>
                            <div class="mt-1 text-muted" style="font-size: 11px;">Klik gambar untuk memperbesar</div>
                        @else
                            <div class="text-muted bg-light p-3 rounded-3" style="font-size: 13px; border: 1px dashed #ccc;">
                                Tidak ada foto lampiran yang disertakan.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Tenant Info & Actions -->
        <div class="col-12 col-lg-4">
            <!-- Profile Card -->
            <div class="dashboard-card p-4 text-center mb-4">
                <div class="text-start mb-3 border-bottom pb-2">
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 13px;">Pelapor</h6>
                </div>
                <img src="https://ui-avatars.com/api/?name={{ urlencode($complaint->tenant->nama_lengkap ?? $complaint->tenant->user->name) }}&background=00897B&color=fff&size=128" alt="Avatar" class="rounded-circle mb-3 shadow" width="64" height="64" style="border: 3px solid #e0f2f1;">
                <h6 class="fw-bold mb-1 text-dark">{{ $complaint->tenant->nama_lengkap ?? $complaint->tenant->user->name }}</h6>
                <div class="text-muted mb-3" style="font-size: 12px;">{{ $complaint->tenant->email ?? $complaint->tenant->user->email }}</div>
                
                <div class="d-flex justify-content-center gap-2 mb-3">
                    <span class="badge rounded-pill px-3 py-1" style="background-color: #e0f2f1; color: #00695C; font-size: 11px;">Kamar {{ $complaint->tenant->room->room_number ?? '-' }}</span>
                    <span class="badge rounded-pill px-3 py-1 bg-light text-dark" style="font-size: 11px;">WA: {{ $complaint->tenant->whatsapp ?? '-' }}</span>
                </div>
                
                <hr class="my-3">
                <div class="text-start">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted" style="font-size: 12px;">Dikirim Pada</span>
                        <span class="fw-bold text-dark" style="font-size: 12px;">{{ $complaint->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted" style="font-size: 12px;">Tipe Kamar</span>
                        <span class="fw-bold text-dark" style="font-size: 12px;">{{ $complaint->tenant->room->roomType->name ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="dashboard-card p-4">
                <h6 class="fw-bold mb-3 text-dark" style="font-size: 13px;">Ubah Status Keluhan</h6>
                <form action="{{ route('admin.complaints.update', $complaint) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <select name="status" class="form-select" style="font-size: 13px;">
                            <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending (Menunggu)</option>
                            <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>In Progress (Sedang Diproses)</option>
                            <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Resolved (Selesai)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn w-100 fw-bold py-2" style="background-color: #00897B; color: white; font-size: 13px;">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
