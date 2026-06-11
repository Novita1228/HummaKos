@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Back Button -->
    <a href="{{ route('admin.tenants.index') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-4" style="color: #00897B; font-size: 13px; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
        Kembali ke Daftar Penyewa
    </a>

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h4 class="fw-bold mb-1" style="color: #333;">Detail Penyewa</h4>
            <p class="text-muted mb-0" style="font-size: 14px;">Informasi lengkap yang diisi oleh calon penyewa.</p>
        </div>
        <div>
            @if($tenant->status == 'pending')
                <span class="badge rounded-pill bg-warning text-dark px-3 py-2" style="font-size: 12px; font-weight: 600;">⏳ Menunggu Konfirmasi</span>
            @elseif($tenant->status == 'active')
                <span class="badge rounded-pill px-3 py-2" style="background-color: #e8f5e9; color: #2e7d32; font-size: 12px; font-weight: 600;">✅ Aktif</span>
            @elseif($tenant->status == 'rejected')
                <span class="badge rounded-pill bg-danger px-3 py-2" style="font-size: 12px; font-weight: 600;">❌ Ditolak</span>
            @else
                <span class="badge rounded-pill bg-secondary px-3 py-2" style="font-size: 12px; font-weight: 600;">{{ ucfirst($tenant->status) }}</span>
            @endif
        </div>
    </div>

    <div class="row g-4">
        <!-- Left Column: Personal Info -->
        <div class="col-12 col-lg-8">
            <!-- Informasi Pribadi -->
            <div class="dashboard-card p-0 overflow-hidden mb-4">
                <div class="p-4 border-bottom d-flex align-items-center gap-2" style="background-color: #f8f9fa;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00897B" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                    <h6 class="fw-bold mb-0" style="color: #00897B;">Informasi Pribadi</h6>
                </div>
                <div class="p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Nama Lengkap</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ $tenant->nama_lengkap ?? '-' }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Email</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ $tenant->email ?? $tenant->user->email ?? '-' }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Nomor WhatsApp</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ $tenant->whatsapp ?? '-' }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Nomor KTP</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ $tenant->ktp_number ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rincian Sewa -->
            <div class="dashboard-card p-0 overflow-hidden mb-4">
                <div class="p-4 border-bottom d-flex align-items-center gap-2" style="background-color: #f8f9fa;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00897B" viewBox="0 0 16 16"><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                    <h6 class="fw-bold mb-0" style="color: #00897B;">Rincian Sewa</h6>
                </div>
                <div class="p-4">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Kamar</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ $tenant->room->room_number ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Tipe Kamar</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ $tenant->room->roomType->name ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Harga / Bulan</div>
                            <div class="fw-bold" style="font-size: 15px; color: #00897B;">Rp {{ number_format($tenant->room->roomType->price ?? 0, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Tanggal Masuk</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ \Carbon\Carbon::parse($tenant->start_date)->format('d M Y') }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Tanggal Berakhir</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ \Carbon\Carbon::parse($tenant->end_date)->format('d M Y') }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Durasi</div>
                            <div class="fw-bold text-dark" style="font-size: 15px;">{{ $tenant->durasi ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dokumen -->
            <div class="dashboard-card p-0 overflow-hidden">
                <div class="p-4 border-bottom d-flex align-items-center gap-2" style="background-color: #f8f9fa;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00897B" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5z"/></svg>
                    <h6 class="fw-bold mb-0" style="color: #00897B;">Dokumen</h6>
                </div>
                <div class="p-4">
                    <div class="row g-4">
                        <!-- Foto KTP -->
                        <div class="col-md-6">
                            <div class="text-muted mb-2" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Foto KTP</div>
                            @if($tenant->foto_ktp)
                                <a href="{{ asset('storage/' . $tenant->foto_ktp) }}" target="_blank" class="d-block">
                                    <img src="{{ asset('storage/' . $tenant->foto_ktp) }}" alt="Foto KTP" class="img-fluid rounded-3 shadow-sm" style="max-height: 250px; object-fit: cover; border: 2px solid #e0e0e0; width: 100%;">
                                </a>
                                <small class="text-muted mt-1 d-block" style="font-size: 11px;">Klik gambar untuk membuka ukuran penuh</small>
                            @else
                                <div class="text-center p-4 rounded-3" style="background-color: #f8f9fa; border: 2px dashed #ddd;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ccc" class="mb-2" viewBox="0 0 16 16"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/><path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/></svg>
                                    <div class="text-muted" style="font-size: 12px;">Belum diunggah</div>
                                </div>
                            @endif
                        </div>

                        <!-- Bukti Pembayaran -->
                        <div class="col-md-6">
                            <div class="text-muted mb-2" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Bukti Pembayaran</div>
                            @if($tenant->bukti_pembayaran)
                                <a href="{{ asset('storage/' . $tenant->bukti_pembayaran) }}" target="_blank" class="d-block">
                                    <img src="{{ asset('storage/' . $tenant->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid rounded-3 shadow-sm" style="max-height: 250px; object-fit: cover; border: 2px solid #e0e0e0; width: 100%;">
                                </a>
                                <small class="text-muted mt-1 d-block" style="font-size: 11px;">Klik gambar untuk membuka ukuran penuh</small>
                            @else
                                <div class="text-center p-4 rounded-3" style="background-color: #f8f9fa; border: 2px dashed #ddd;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ccc" class="mb-2" viewBox="0 0 16 16"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/><path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/></svg>
                                    <div class="text-muted" style="font-size: 12px;">Belum diunggah</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Summary & Actions -->
        <div class="col-12 col-lg-4">
            <!-- Profile Card -->
            <div class="dashboard-card p-4 text-center mb-4">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($tenant->nama_lengkap ?? $tenant->user->name) }}&background=00897B&color=fff&size=128" alt="Avatar" class="rounded-circle mb-3 shadow" width="80" height="80" style="border: 3px solid #e0f2f1;">
                <h5 class="fw-bold mb-1 text-dark">{{ $tenant->nama_lengkap ?? $tenant->user->name }}</h5>
                <div class="text-muted mb-3" style="font-size: 12px;">{{ $tenant->email ?? $tenant->user->email }}</div>
                <div class="d-flex justify-content-center gap-2 mb-3">
                    <span class="badge rounded-pill px-3 py-1" style="background-color: #e0f2f1; color: #00695C; font-size: 11px;">Kamar {{ $tenant->room->room_number ?? '-' }}</span>
                    <span class="badge rounded-pill px-3 py-1" style="background-color: #fff3e0; color: #e65100; font-size: 11px;">{{ $tenant->durasi ?? '-' }}</span>
                </div>
                <hr class="my-3">
                <div class="text-start">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted" style="font-size: 12px;">Tanggal Pengajuan</span>
                        <span class="fw-bold text-dark" style="font-size: 12px;">{{ $tenant->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted" style="font-size: 12px;">Akun Terdaftar</span>
                        <span class="fw-bold text-dark" style="font-size: 12px;">{{ $tenant->user->name ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons (visible for pending) -->
            @if($tenant->status == 'pending')
            <div class="dashboard-card p-4">
                <h6 class="fw-bold mb-3 text-dark" style="font-size: 14px;">Tindakan</h6>
                <div class="d-flex flex-column gap-2">
                    <form action="{{ route('admin.tenants.approve', $tenant) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn w-100 fw-bold py-2 d-flex align-items-center justify-content-center gap-2" style="background-color: #00897B; color: white; font-size: 13px;" onclick="return confirm('Setujui penyewa ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
                            Terima Penyewa
                        </button>
                    </form>
                    <form action="{{ route('admin.tenants.reject', $tenant) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100 fw-bold py-2 d-flex align-items-center justify-content-center gap-2" style="font-size: 13px;" onclick="return confirm('Tolak penyewa ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>
                            Tolak Permintaan
                        </button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
