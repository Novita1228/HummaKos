@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Header -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1" style="color: #333;">Kamar Saya</h3>
        <p class="text-muted mb-0" style="font-size: 14px;">Detail informasi kamar kos yang sedang kamu sewa.</p>
    </div>

    @if(!$tenant)
    <!-- Empty State -->
    <div class="dashboard-card text-center py-5 mt-4 d-flex flex-column align-items-center justify-content-center" style="min-height: 400px; border: 1px dashed #ccc;">
        <div class="icon-box bg-light mb-3" style="width: 64px; height: 64px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#9e9e9e" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm-1-9V4h2v3h-2zm0 4v-2h2v2h-2z"/>
            </svg>
        </div>
        <h4 class="fw-bold text-dark mb-2">Belum Ada Sewaan</h4>
        <p class="text-muted mb-4" style="max-width: 400px; font-size: 14px;">Kamu belum memiliki kamar. Silakan cari kamar impianmu dan ajukan penyewaan.</p>
        <a href="{{ route('user.cari-kamar') }}" class="btn px-4 py-2 text-white fw-bold d-flex align-items-center gap-2" style="background-color: #00897B; border-radius: 8px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
            Cari Kamar Sekarang
        </a>
    </div>

    @elseif($tenant->status === 'pending')
    <!-- Pending State -->
    <div class="dashboard-card text-center py-5 mt-4 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden" style="min-height: 400px;">
        <div class="position-absolute w-100 h-100" style="background: repeating-linear-gradient(45deg, #f8f9fa, #f8f9fa 10px, #ffffff 10px, #ffffff 20px); opacity: 0.5; z-index: 0;"></div>

        <div class="position-relative z-1 d-flex flex-column align-items-center">
            <div class="spinner-grow text-warning mb-3" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h4 class="fw-bold text-dark mb-2">Menunggu Konfirmasi Admin</h4>
            <p class="text-muted mb-4" style="max-width: 500px; font-size: 14px;">Pemesanan Kamar <strong>{{ $tenant->room->room_number }}</strong> sedang diproses. Tim kami akan segera memverifikasi pembayaran Anda.</p>

            <div class="card bg-white shadow-sm border-0 text-start" style="width: 100%; max-width: 350px;">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3" style="font-size: 13px; color: #555;">Detail Pengajuan:</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted" style="font-size: 12px;">Kamar</span>
                        <span class="fw-bold text-dark" style="font-size: 12px;">{{ $tenant->room->room_number }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted" style="font-size: 12px;">Durasi</span>
                        <span class="fw-bold text-dark" style="font-size: 12px;">{{ $tenant->durasi }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted" style="font-size: 12px;">Tanggal Masuk</span>
                        <span class="fw-bold text-dark" style="font-size: 12px;">{{ \Carbon\Carbon::parse($tenant->start_date)->format('d M Y') }}</span>
                    </div>
                    <hr class="my-2">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="text-muted" style="font-size: 12px;">Status Pembayaran</span>
                        <span class="badge" style="background-color: #fff3e0; color: #e65100;">Verifikasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif($tenant->status === 'active')
    <!-- Active State -->
    <div class="row g-4">
        <!-- Main Info -->
        <div class="col-12 col-lg-8">
            <div class="dashboard-card h-100 p-0 overflow-hidden d-flex flex-column">
                <div class="p-4 border-bottom d-flex justify-content-between align-items-center" style="background-color: #f8f9fa;">
                    <div class="d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00897B" viewBox="0 0 16 16">
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        </svg>
                        <h6 class="fw-bold mb-0" style="color: #00897B;">Informasi Kamar Aktif</h6>
                    </div>
                    <span class="badge rounded-pill px-3 py-1" style="background-color: #e8f5e9; color: #2e7d32; font-size: 11px; font-weight: 600;">Sedang Disewa</span>
                </div>

                <div class="row g-0 flex-grow-1">
                    <div class="col-12 col-md-5 p-4 d-flex justify-content-center align-items-center border-end">
                        @if($tenant->room->image_1)
                            <img src="{{ asset('storage/' . $tenant->room->image_1) }}" alt="Foto Kamar" class="img-fluid rounded-4 shadow-sm" style="max-height: 200px; object-fit: cover;">
                        @else
                            <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=400&auto=format&fit=crop" alt="Foto Kamar" class="img-fluid rounded-4 shadow-sm" style="max-height: 200px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="col-12 col-md-7 p-4">
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">NOMOR KAMAR</div>
                                <h4 class="fw-bold mb-0 text-dark">{{ $tenant->room->room_number }}</h4>
                            </div>
                            <div class="col-6">
                                <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">TIPE KAMAR</div>
                                <h5 class="fw-bold mb-0 text-dark">{{ $tenant->room->roomType->name }}</h5>
                            </div>
                            <div class="col-6">
                                <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">TANGGAL MASUK</div>
                                <h6 class="fw-bold mb-0 text-dark">{{ \Carbon\Carbon::parse($tenant->start_date)->format('d M Y') }}</h6>
                            </div>
                            <div class="col-6">
                                <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">BERAKHIR PADA</div>
                                <h6 class="fw-bold mb-0 text-dark">{{ \Carbon\Carbon::parse($tenant->end_date)->format('d M Y') }}</h6>
                            </div>
                            <div class="col-6">
                                <div class="text-muted mb-1" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;"> </div>
                                <h6 class="fw-bold mb-0 text-dark">Informasi : Lakukan pelunasan kekurangan pembayaran saat mengambil kunci kamar diresepsionis</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tagihan & Pembayaran -->
        <div class="col-12 col-lg-4">
            <div class="dashboard-card h-100 p-4 d-flex flex-column">
                <h6 class="fw-bold mb-4 text-dark">Informasi Tagihan</h6>

                @if($nextDueDate && $nextDueDate->lessThan(\Carbon\Carbon::parse($tenant->end_date)))
                <div class="bg-light p-3 rounded-3 mb-4 flex-grow-1 border">
                    <div class="text-center mb-3">
                        <div class="text-muted mb-1" style="font-size: 12px;">Tagihan Bulan Berikutnya</div>
                        <h3 class="fw-bold mb-0" style="color: #00897B;">Rp {{ number_format($tenant->room->roomType->price, 0, ',', '.') }}</h3>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted" style="font-size: 12px;">Jatuh Tempo:</div>
                        <div class="fw-bold text-dark" style="font-size: 13px;">{{ $nextDueDate->format('d M Y') }}</div>
                    </div>
                </div>

                @if($showPaymentButton)
                <a href="{{ route('user.room.payment', ['room' => $tenant->room->id, 'tenant' => $tenant->id]) }}" class="btn w-100 fw-bold py-2" style="background-color: #00897B; color: white;">Bayar Sekarang</a>
                @else
                <button class="btn w-100 fw-bold py-2" style="background-color: #e0e0e0; color: #757575;" disabled>Sudah Dibayar</button>
                @endif

                @else
                <!-- No more payments needed -->
                <div class="bg-light p-3 rounded-3 mb-4 flex-grow-1 border d-flex flex-column align-items-center justify-content-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#4caf50" class="mb-2" viewBox="0 0 16 16">
                      <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg>
                    <h5 class="fw-bold text-success mb-1">Lunas</h5>
                    <p class="text-muted mb-0" style="font-size: 12px;">Seluruh tagihan untuk sewa ini sudah diselesaikan.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
