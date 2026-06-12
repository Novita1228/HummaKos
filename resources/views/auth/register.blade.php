@extends('landing.layouts.app')

@section('content')
<div class="container py-5 my-5">
    <div class="row align-items-center justify-content-center">
        <!-- Left Column: Text and Image -->
        <div class="col-lg-5 pe-lg-5 mb-5 mb-lg-0 d-none d-lg-block">
            <h1 class="fw-bold mb-4 display-6" style="color: var(--bs-primary); line-height: 1.2;">Mulai Perjalanan Anda<br>Menuju Hunian yang<br>Lebih Nyaman.</h1>
            <p class="text-muted mb-4" style="line-height: 1.6; font-size: 1.05rem;">Daftarkan akun Anda untuk mengakses informasi kamar, melakukan pemesanan, dan mengelola hunian dengan lebih mudah melalui HummaKos.</p>
            <div class="mt-4">
                <img src="{{ asset('assets/img/register-img.png') }}" alt="Register Cover" class="img-fluid" style="border-radius: 24px; max-height: 400px; width: 100%; object-fit: cover;">
            </div>
        </div>

        <!-- Right Column: Register Form Card -->
        <div class="col-lg-6 ms-lg-auto">
            <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 24px;">
                <div class="card-body p-0">
                    <h3 class="fw-bold mb-2 text-primary">Daftar</h3>
                    <p class="text-muted mb-4 small">Selamat datang! Silakan masukkan detail Anda.</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4 position-relative">
                            <label for="name" class="form-label small fw-semibold text-muted bg-white px-1 position-absolute" style="top: -10px; left: 12px; z-index: 5;">Nama</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg rounded-3 fs-6 px-3 py-3" placeholder="Masukkan Nama" value="{{ old('name') }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3 mb-4">
                            <!-- Email Address -->
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <label for="email" class="form-label small fw-semibold text-muted bg-white px-1 position-absolute" style="top: -10px; left: 12px; z-index: 5;">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg rounded-3 fs-6 px-3 py-3" placeholder="Masukkan Email" value="{{ old('email') }}" required autocomplete="username">
                                    @error('email')
                                        <div class="text-danger mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <label for="phone" class="form-label small fw-semibold text-muted bg-white px-1 position-absolute" style="top: -10px; left: 12px; z-index: 5;">Nomor Telepon</label>
                                    <input type="text" id="phone" name="phone" class="form-control form-control-lg rounded-3 fs-6 px-3 py-3" placeholder="Masukkan Nomor Telepon" value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                        <div class="text-danger mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4 position-relative">
                            <label for="password" class="form-label small fw-semibold text-muted bg-white px-1 position-absolute" style="top: -10px; left: 12px; z-index: 5;">Kata Sandi</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg rounded-3 fs-6 px-3 py-3" placeholder="••••••••••••••••" required autocomplete="new-password">
                            @error('password')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4 position-relative">
                            <label for="password_confirmation" class="form-label small fw-semibold text-muted bg-white px-1 position-absolute" style="top: -10px; left: 12px; z-index: 5;">Konfirmasi Kata Sandi</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg rounded-3 fs-6 px-3 py-3" placeholder="••••••••••••••••" required autocomplete="new-password">
                            @error('password_confirmation')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Terms -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                <label class="form-check-label small text-muted" for="terms">
                                    Saya setuju dengan semua <a href="#" class="text-decoration-none" style="color: #e74c3c;">Syarat</a> dan <a href="#" class="text-decoration-none" style="color: #e74c3c;">Kebijakan Privasi</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3 fw-semibold py-3 shadow-none">Buat Akun</button>
                        </div>

                        <div class="text-center small">
                            <span class="text-muted">Sudah punya akun?</span>
                            <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-semibold">Log In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
