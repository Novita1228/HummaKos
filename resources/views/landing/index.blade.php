@extends('landing.layouts.app')

@section('content')
<!-- Hero Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 pe-lg-5">
                <span class="bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-2 mb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                    </svg>
                    HUNIAN NYAMAN & TERPERCAYA
                </span>
                <h1 class="display-4 fw-bold mb-4" style="line-height: 1.2;">Portal Hunian Modern <br><span class="text-primary">HummaKos</span></h1>
                <p class="text-muted mb-4 fs-5" style="max-width: 450px; line-height: 1.6;">Hunian kos modern di Malang yang menawarkan berbagai tipe kamar, fasilitas lengkap, serta lingkungan yang nyaman dan aman untuk mahasiswa maupun pekerja.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('login') }}" class="btn btn-primary px-5 py-2 rounded-2 fw-semibold shadow-none">Login </a>
                    <a href="#" class="btn bg-white border text-primary px-4 py-2 rounded-2 fw-semibold d-flex align-items-center gap-2 shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                        </svg>
                        Panduan Penghuni
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-images-container d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/img/heroimg.png') }}" alt="Hero Image" class="img-fluid" style="width: 100%; max-width: 100%; height: auto; object-fit: contain; transform: scale(1.25);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan & Fasilitas Penghuni -->
<section class="py-5 bg-white">
    <div class="container text-center mb-5">
        <h2 class="fw-bold mb-3 fs-3">Layanan & Fasilitas Penghuni</h2>
        <p class="text-muted mx-auto" style="max-width: 600px; line-height: 1.6;">Kami berkomitmen memberikan pengalaman tinggal terbaik dengan dukungan sistem digital yang memudahkan segala urusan hunian Anda.</p>
    </div>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 hover-lift">
                    <div class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-4 mb-4" style="width: 56px; height: 56px;">
                        <img src="{{ asset('assets/img/kursi.png') }}" alt="Fasilitas" width="24" height="24">
                    </div>
                    <h5 class="fw-bold mb-3 fs-5">Fasilitas Lengkap</h5>
                    <p class="text-muted mb-4" style="line-height: 1.6; font-size: 0.95rem;">Nikmati akses ke area komunal, WiFi kecepatan tinggi, dll. sesuai dengan tipe kamar yang dipilih.</p>
                    <span class="badge bg-primary-light text-primary border border-0">Free WiFi</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 hover-lift">
                    <div class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-4 mb-4" style="width: 56px; height: 56px;">
                        <img src="{{ asset('assets/img/tangtang.png') }}" alt="Lapor Keluhan" width="24" height="24">
                    </div>
                    <h5 class="fw-bold mb-3 fs-5">Kemudahan Lapor Keluhan</h5>
                    <p class="text-muted mb-0" style="line-height: 1.6; font-size: 0.95rem;">Ada kendala di kamar? Kirim tiket laporan langsung dari portal dan pantau status perbaikan secara real-time.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 hover-lift">
                    <div class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-4 mb-4" style="width: 56px; height: 56px;">
                        <img src="{{ asset('assets/img/dompet.png') }}" alt="Cek Tagihan" width="24" height="24">
                    </div>
                    <h5 class="fw-bold mb-3 fs-5">Cek Tagihan Mandiri</h5>
                    <p class="text-muted mb-0" style="line-height: 1.6; font-size: 0.95rem;">Pantau masa tagihan bulanan dan riwayat pembayaran Anda. Transparan, akurat, dan dapat diunduh kapan saja.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Kami -->
<section class="py-5 my-md-5">
    <div class="container text-center mb-5">
        <h2 class="fw-bold fs-3">Tentang Kami</h2>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 pe-lg-5">
                <div class="position-relative rounded-4 shadow-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Tentang Kami" class="w-100 d-block rounded-4 object-fit-cover">

                </div>
            </div>
            <div class="col-lg-6 ps-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div style="width: 30px; height: 2px; background-color: var(--primary);"></div>
                    <span class="text-primary fw-bold text-uppercase" style="font-size: 12px; letter-spacing: 1px;">Tentang Kami</span>
                </div>
                <h2 class="display-6 fw-bold mb-4" style="line-height: 1.2;">Solusi Hunian Modern <br>& Terkelola</h2>
                <p class="text-muted mb-4" style="line-height: 1.8; font-size: 1.05rem;">
                    HummaKos adalah platform manajemen kos yang membantu pemilik dan penyewa mengelola hunian secara lebih praktis dan terorganisir. Dengan berbagai pilihan kamar, fasilitas lengkap, serta sistem digital yang terintegrasi, HummaKos menghadirkan pengalaman tinggal yang nyaman, aman, dan efisien.
                </p>
                <a href="#" class="btn btn-primary px-4 py-3 rounded-3 fw-semibold shadow-sm">
                    Pelajari Lebih Lanjut
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 mb-5">
    <div class="container">
        <div class="bg-dark text-white rounded-5 shadow-lg overflow-hidden position-relative hover-perspective-container">
            <div class="row align-items-center g-0 h-100">
                <div class="col-lg-6 p-5">
                    <div class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-4 mb-4" style="width: 56px; height: 56px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>
                    </div>
                    <h2 class="fw-bold mb-3 display-6" style="color: var(--primary);">Komunitas Terintegrasi</h2>
                    <p class="mb-4" style="color: #adb5bd; line-height: 1.8; font-size: 1.05rem;">Dapatkan info terkini seputar kegiatan penghuni, pengumuman penting, dan promo eksklusif dari partner kami langsung di dashboard Anda.</p>
                    <a href="#" class="text-white text-decoration-none fw-semibold d-inline-flex align-items-center" style="font-size: 1.05rem;">
                        Lihat Pengumuman Terbaru
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="ms-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                    </a>
                </div>
                <div class="col-lg-6 p-5 d-flex align-items-center justify-content-center overflow-hidden h-100">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Dashboard Mockup" class="cta-image">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
