@extends('landing.layouts.app')

@section('content')
<div class="container py-5 my-5">
    <div class="row align-items-center justify-content-center">
        <!-- Left Column: Image and Text -->
        <div class="col-lg-5 pe-lg-5 mb-5 mb-lg-0 d-none d-lg-block">
            <div class="mb-4">
                <img src="{{ asset('assets/img/Login-img.png') }}" alt="Login Cover" class="img-fluid" style="border-radius: 40px; border-bottom-left-radius: 40px; border-top-right-radius: 0; max-height: 400px; object-fit: cover;">
            </div>
            <h1 class="fw-bold mb-3 display-6" style="color: var(--bs-primary); line-height: 1.2;">Hunian Nyaman<br>Anda dimulai dari<br>sini.</h1>
            <p class="text-muted" style="line-height: 1.6; font-size: 1.05rem;">Masuk ke akun Anda untuk mengelola hunian, memantau pemesanan, dan mengakses berbagai layanan dengan mudah.</p>
        </div>

        <!-- Right Column: Login Form Card -->
        <div class="col-lg-5 ms-lg-5">
            <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 24px;">
                <div class="card-body p-0">
                    <h3 class="fw-bold mb-2 text-primary">Selamat Datang kembali</h3>
                    <p class="text-muted mb-4 small">Log in Ke Akun Anda</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-4 position-relative">
                            <label for="email" class="form-label small fw-semibold text-muted bg-white px-1 position-absolute" style="top: -10px; left: 12px; z-index: 5;">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg rounded-3 fs-6 px-3 py-3" placeholder="Masukkan email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            @error('email')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4 position-relative">
                            <label for="password" class="form-label small fw-semibold text-muted bg-white px-1 position-absolute" style="top: -10px; left: 12px; z-index: 5;">Kata Sandi</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg rounded-3 fs-6 px-3 py-3" placeholder="••••••••••••••••" required autocomplete="current-password">
                            @error('password')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                <label class="form-check-label small text-muted" for="remember_me">
                                    Ingat saya
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="small text-decoration-none" style="color: #e74c3c;">Lupa Kata Sandi</a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3 fw-semibold py-3 shadow-none">Log In</button>
                        </div>

                        <div class="text-center small">
                            <span class="text-muted">Belum punya akun?</span> 
                            <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-semibold">Daftar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
