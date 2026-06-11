@extends('dashboard.layouts.app')

@section('content')
<div class="container py-2" style="max-width: 1000px;">
    <!-- Back Button -->
    <a href="{{ route('user.room.show', $room) }}" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-5" style="color: #00897B; font-size: 13px; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
        Kembali
    </a>

    <!-- Success Header -->
    <div class="text-center mb-5">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px; background-color: #00897B;">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
        </div>
        <h2 class="fw-bold mb-2" style="color: #00695C;">Pemesanan Berhasil Dibuat</h2>
        <p class="text-muted" style="font-size: 14px;">Segera selesaikan pembayaran DP untuk mengamankan kamar Anda.</p>
    </div>

    <div class="row g-4 mb-4">
        <!-- Detail Pembayaran -->
        <div class="col-12 col-md-6">
            <div class="card border-0 rounded-4 h-100" style="box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                <div class="card-body p-4 p-md-5 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0 text-dark">Detail Pembayaran</h5>
                        <span class="badge rounded-pill" style="background-color: #00897B; color: white; font-weight: 600; font-size: 11px; padding: 6px 12px;">Batas Waktu: 23:59:59</span>
                    </div>

                    <div class="text-muted mb-1" style="font-size: 13px;">Silakan lakukan pembayaran DP sebesar</div>
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <h2 class="fw-bold mb-0" style="color: #00897B;">Rp 500.000</h2>
                        <button class="btn btn-link p-0" style="color: #00897B;" title="Salin Nominal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/></svg>
                        </button>
                    </div>

                    <div class="p-3 rounded-3 mb-4 d-flex justify-content-between align-items-center" style="background-color: #f8f9fa; border: 1px solid #eef0f2;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-white rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border: 1px solid #ddd;">
                                <div class="fw-bold" style="color: #0066cc; font-size: 14px; font-style: italic;">BCA</div>
                            </div>
                            <div>
                                <div class="text-muted" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">TRANSFER KE REKENING</div>
                                <div class="fw-bold text-dark" style="font-size: 16px;">1234567890</div>
                                <div class="text-muted" style="font-size: 12px;">a.n. HummaKos</div>
                            </div>
                        </div>
                        <a href="#" class="text-decoration-none fw-bold" style="color: #00897B; font-size: 13px;">Salin</a>
                    </div>

                    <h6 class="fw-bold mb-3" style="font-size: 13px;">Instruksi Transfer:</h6>
                    <div class="d-flex flex-column gap-3 flex-grow-1">
                        <div class="d-flex align-items-start gap-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 20px; height: 20px; background-color: #00897B; font-size: 11px; font-weight: bold; flex-shrink: 0;">1</div>
                            <div style="font-size: 13px; color: #555;">Gunakan mobile banking, internet banking, atau ATM.</div>
                        </div>
                        <div class="d-flex align-items-start gap-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 20px; height: 20px; background-color: #00897B; font-size: 11px; font-weight: bold; flex-shrink: 0;">2</div>
                            <div style="font-size: 13px; color: #555;">Pastikan nominal transfer sesuai hingga digit terakhir.</div>
                        </div>
                        <div class="d-flex align-items-start gap-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 20px; height: 20px; background-color: #00897B; font-size: 11px; font-weight: bold; flex-shrink: 0;">3</div>
                            <div style="font-size: 13px; color: #555;">Simpan bukti transfer untuk diunggah di kolom sebelah kanan.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konfirmasi Pembayaran Form -->
        <div class="col-12 col-md-6">
            <div class="card border-0 rounded-4 h-100" style="box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                <div class="card-body p-4 p-md-5 d-flex flex-column">
                    <h5 class="fw-bold mb-3 text-dark">Konfirmasi Pembayaran</h5>
                    <p class="text-muted mb-4" style="font-size: 13px;">Unggah bukti transfer Anda di sini untuk segera kami verifikasi.</p>

                    <form action="{{ route('user.room.store-payment', ['room' => $room->id, 'tenant' => $tenant->id]) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column flex-grow-1">
                        @csrf
                        <div class="position-relative text-center p-4 rounded-4 mb-4 flex-grow-1 d-flex flex-column justify-content-center align-items-center" style="border: 2px dashed #b2dfdb; background-color: #f1f8f7; min-height: 200px;">
                            <input type="file" name="bukti_pembayaran" class="position-absolute w-100 h-100 start-0 top-0 opacity-0" style="cursor: pointer;" accept="image/*,.pdf" required>
                            <div class="text-muted">
                                <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 48px; height: 48px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00897B" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/></svg>
                                </div>
                                <div style="font-size: 14px; font-weight: 700; color: #333;">Upload Bukti Transfer</div>
                                <div style="font-size: 12px;">Klik atau seret file ke sini</div>
                                <div class="mt-2" style="font-size: 11px; color: #888;">Mendukung: JPG, PNG, PDF (Maks. 5MB)</div>
                            </div>
                        </div>

                        <button type="submit" class="btn w-100 py-3 rounded-3 fw-bold text-white mb-3" style="background-color: #80cbc4; font-size: 14px;">
                            Kirim Bukti Pembayaran
                        </button>

                        <div class="text-center text-muted d-flex align-items-center justify-content-center gap-2" style="font-size: 11px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/></svg>
                            Pembayaran diproses dengan enkripsi 256-bit
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Need Help Box & Room Preview Row -->
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6">
            <!-- Help Box -->
            <div class="p-4 rounded-4 d-flex align-items-center justify-content-between h-100" style="background-color: #e8eaf6;">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#3f51b5" viewBox="0 0 16 16"><path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/></svg>
                    </div>
                    <div>
                        <div class="fw-bold" style="font-size: 13px; color: #283593;">Butuh Bantuan?</div>
                        <div class="text-muted" style="font-size: 12px;">Hubungi tim support kami jika ada kendala.</div>
                    </div>
                </div>
                <a href="#" class="btn bg-white fw-bold px-3 py-2 rounded-3 shadow-sm" style="color: #00897B; font-size: 12px; border: 1px solid #e0e0e0;">Chat Admin</a>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <!-- Room Wide Card -->
            <div class="card border-0 rounded-4 overflow-hidden h-100" style="box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                <div class="row g-0 h-100">
                    <div class="col-4 position-relative">
                        @if($room->image_1)
                            <img src="{{ asset('storage/' . $room->image_1) }}" alt="Kamar" class="img-fluid h-100 w-100" style="object-fit: cover;">
                        @else
                            <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=300&auto=format&fit=crop" alt="Kamar" class="img-fluid h-100 w-100" style="object-fit: cover;">
                        @endif
                    </div>
                    <div class="col-8 p-4 d-flex flex-column justify-content-center">
                        <span class="badge rounded-pill mb-2" style="background-color: #e0f2f1; color: #00897B; font-weight: 600; font-size: 10px; width: fit-content;">Kamar {{ $room->room_number }}</span>
                        <h6 class="fw-bold mb-2 text-dark">HummaKos Residence - Malang</h6>

                        <div class="d-flex align-items-center gap-4 text-muted" style="font-size: 11px;">
                            <div class="d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" viewBox="0 0 16 16"><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                                Check-in: {{ \Carbon\Carbon::parse($tenant->start_date)->format('d M Y') }}
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
                                Kec. Singosari, Malang
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
