@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Greeting -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1" style="color: #333;">Halo, {{ auth()->user()->name }}!</h3>
        <p class="text-muted mb-0" style="font-size: 14px;">Selamat datang kembali di hunian nyamanmu. Berikut ringkasan akun penyewaanmu hari ini.</p>
    </div>

    @if($hasRoom)
    <div class="row g-4 mb-4">
        <!-- Informasi Kamar Saya -->
        <div class="col-12 col-lg-7">
            <div class="dashboard-card h-100 p-0 overflow-hidden d-flex flex-column">
                <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00897B" viewBox="0 0 16 16">
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        </svg>
                        <h6 class="fw-bold mb-0" style="color: #00897B;">Informasi Kamar Saya</h6>
                    </div>
                    <span class="badge rounded-pill bg-teal-light text-teal px-3 py-1" style="font-size: 11px; font-weight: 600;">Aktif</span>
                </div>

                <div class="p-4 flex-grow-1">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">NOMOR KAMAR</div>
                            <h4 class="fw-bold mb-0 text-dark">{{ $tenant->room->room_number ?? 'A-01' }}</h4>
                        </div>
                        <div class="col-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">TIPE KAMAR</div>
                            <h4 class="fw-bold mb-0 text-dark">{{ $tenant->room->roomType->name ?? 'B' }}</h4>
                        </div>
                        <div class="col-4">
                            <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">HARGA SEWA</div>
                            <h4 class="fw-bold mb-0 text-teal" style="color: #00897B;">
                                Rp {{ number_format($tenant->room->roomType->price ?? 3500000, 0, ',', '.') }}<span style="font-size: 12px; font-weight: 500; color: #757575;">/bln</span>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="p-3 mx-4 mb-4 rounded-3 d-flex justify-content-between align-items-center" style="background-color: #f8f9fa; border: 1px solid #eee;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box bg-white shadow-sm" style="width: 32px; height: 32px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#333" viewBox="0 0 16 16"><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                        </div>
                        <div>
                            <div class="text-muted" style="font-size: 10px; font-weight: 600;">Jatuh Tempo Berikutnya</div>
                            <div class="fw-bold text-dark" style="font-size: 13px;">15 Desember 2026</div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm px-3" style="font-size: 12px; font-weight: 600;">Bayar Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Ringkasan Keluhan -->
        <div class="col-12 col-lg-5">
            <div class="dashboard-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#333" viewBox="0 0 16 16"><path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zM1 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/><path d="M5.5 6.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zM5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/></svg>
                        <h6 class="fw-bold mb-0 text-dark">Ringkasan Keluhan</h6>
                    </div>
                    <a href="#" class="text-teal text-decoration-none" style="font-size: 11px; font-weight: 700;">Lihat Semua</a>
                </div>

                <div class="d-flex flex-column gap-2 mb-4">
                    <!-- Total Laporan -->
                    <div class="d-flex justify-content-between align-items-center p-3 rounded-3" style="background-color: #f1f3f4; border: 1px solid #e8eaed;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box bg-white shadow-sm" style="width: 28px; height: 28px; padding: 6px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="#5f6368" viewBox="0 0 16 16"><path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/></svg>
                            </div>
                            <span class="text-dark" style="font-size: 13px; font-weight: 500;">Total Laporan</span>
                        </div>
                        <span class="fw-bold" style="font-size: 16px; color: #333;">12</span>
                    </div>

                    <!-- Diproses -->
                    <div class="d-flex justify-content-between align-items-center p-3 rounded-3" style="background-color: #fff8e1; border: 1px solid #ffecb3;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box bg-white shadow-sm" style="width: 28px; height: 28px; padding: 6px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="#f57c00" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>
                            </div>
                            <span style="font-size: 13px; font-weight: 500; color: #b26500;">Diproses</span>
                        </div>
                        <span class="fw-bold" style="font-size: 16px; color: #f57c00;">2</span>
                    </div>

                    <!-- Selesai -->
                    <div class="d-flex justify-content-between align-items-center p-3 rounded-3" style="background-color: #e0f2f1; border: 1px solid #b2dfdb;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box bg-white shadow-sm" style="width: 28px; height: 28px; padding: 6px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="#00897b" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                            </div>
                            <span style="font-size: 13px; font-weight: 500; color: #00695c;">Selesai</span>
                        </div>
                        <span class="fw-bold" style="font-size: 16px; color: #00897b;">10</span>
                    </div>
                </div>

                <button class="btn btn-outline-secondary w-100 d-flex justify-content-center align-items-center gap-2" style="border-style: dashed; font-size: 13px; font-weight: 500; color: #555;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                    Buat Keluhan Baru
                </button>
            </div>
        </div>
    </div>

    <!-- Masa Sewa -->
    <div class="dashboard-card text-center p-5 mb-4 d-flex flex-column align-items-center justify-content-center" style="background-color: #fafafa; border: 1px solid #eee;">
        <div class="icon-box bg-light shadow-sm mb-3" style="width: 48px; height: 48px; border: 1px solid #e0e0e0;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#555" viewBox="0 0 16 16"><path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/><path d="M4.5 10a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/></svg>
        </div>
        <h5 class="fw-bold mb-1 text-dark">Masa Sewa</h5>
        <p class="text-muted mb-0" style="font-size: 13px;">Masa berlaku s/d 11 July 2026</p>
    </div>

    <!-- Banner -->
    <div class="rounded-4 p-4 position-relative overflow-hidden shadow-sm" style="background-image: url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=2000&auto=format&fit=crop'); background-size: cover; background-position: center; min-height: 200px;">
        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to right, rgba(0,77,64,0.9) 0%, rgba(0,77,64,0.7) 50%, rgba(0,77,64,0.2) 100%);"></div>

        <!-- Content -->
        <div class="position-relative z-1 d-flex flex-column justify-content-center h-100" style="max-width: 500px;">
            <h4 class="fw-bold text-white mb-2">Punya Masalah dengan Kamar?</h4>
            <p class="text-white mb-4" style="font-size: 13px; opacity: 0.9; line-height: 1.6;">Laporkan segera kerusakan atau kendala fasilitas Anda melalui pusat bantuan kami untuk penanganan cepat.</p>
            <div>
                <button class="btn btn-light rounded-pill px-4 py-2" style="font-size: 12px; font-weight: 700; color: #00695C;">Hubungi Tim Maintenance</button>
            </div>
        </div>
    </div>

    @else
    <!-- Empty State -->
    <div class="dashboard-card text-center py-5 mt-4 d-flex flex-column align-items-center justify-content-center" style="min-height: 400px; border: 1px dashed #ccc;">
        <div class="icon-box bg-light mb-3" style="width: 64px; height: 64px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#9e9e9e" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm-1-9V4h2v3h-2zm0 4v-2h2v2h-2z"/>
            </svg>
        </div>
        <h4 class="fw-bold text-dark mb-2">Belum Ada Sewaan</h4>
        <p class="text-muted mb-4" style="max-width: 400px; font-size: 14px;">Kamu belum menyewa kamar apapun saat ini. Silakan cari kamar yang tersedia dan mulai pengalaman ngekos yang nyaman bersama HummaKos.</p>
        <a href="{{ route('user.cari-kamar') }}" class="btn btn-primary px-4 py-2 d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
            Cari Kamar Sekarang
        </a>
    </div>
    @endif
</div>
@endsection
