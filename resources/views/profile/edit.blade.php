@extends('dashboard.layouts.app')

@section('content')
<div class="container py-4" style="max-width: 800px;">
    <!-- Back Button -->
    <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('dashboard') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-4" style="color: #00897B; font-size: 13px; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
        Kembali ke Dashboard
    </a>

    <!-- Header -->
    <div class="mb-4">
        <h4 class="fw-bold mb-1" style="color: #333;">Edit Profile</h4>
        <p class="text-muted mb-0" style="font-size: 13px;">Perbarui informasi profil Anda dan alamat email.</p>
    </div>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Profil berhasil diperbarui.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('status') === 'password-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Password berhasil diperbarui.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Profile Information -->
        <div class="col-12">
            <div class="dashboard-card p-0 overflow-hidden">
                <div class="p-4 border-bottom bg-light">
                    <h6 class="fw-bold mb-0 text-dark">Informasi Profil</h6>
                </div>
                <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-4">
                    @csrf
                    @method('patch')

                    <!-- Avatar -->
                    <div class="mb-4 d-flex align-items-center gap-4">
                        <div class="position-relative">
                            <img id="avatar-preview" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=00897B&color=fff' }}" alt="Profile Photo" class="rounded-circle object-fit-cover shadow-sm" width="100" height="100" style="border: 3px solid #e0f2f1;">
                            <label for="avatar" class="position-absolute bottom-0 end-0 bg-white rounded-circle shadow-sm d-flex justify-content-center align-items-center cursor-pointer" style="width: 32px; height: 32px; border: 1px solid #ccc; cursor: pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#00897B" viewBox="0 0 16 16"><path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/></svg>
                            </label>
                            <input type="file" name="avatar" id="avatar" class="d-none" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-dark">Foto Profil</h6>
                            <p class="text-muted mb-0" style="font-size: 11px;">Format JPG atau PNG. Ukuran maksimal 5MB.</p>
                            @error('avatar')
                                <div class="text-danger mt-1" style="font-size: 12px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label" style="font-size: 12px; font-weight: 600;">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label" style="font-size: 12px; font-weight: 600;">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn text-white fw-bold px-4" style="background-color: #00897B; border-radius: 8px;">Simpan Profil</button>
                </form>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-12">
            <div class="dashboard-card p-0 overflow-hidden">
                <div class="p-4 border-bottom bg-light">
                    <h6 class="fw-bold mb-0 text-dark">Ubah Password</h6>
                </div>
                <form method="post" action="{{ route('password.update') }}" class="p-4">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="update_password_current_password" class="form-label" style="font-size: 12px; font-weight: 600;">Password Saat Ini</label>
                        <input type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" id="update_password_current_password" name="current_password" autocomplete="current-password">
                        @error('current_password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="update_password_password" class="form-label" style="font-size: 12px; font-weight: 600;">Password Baru</label>
                        <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" id="update_password_password" name="password" autocomplete="new-password">
                        @error('password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="update_password_password_confirmation" class="form-label" style="font-size: 12px; font-weight: 600;">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
                        @error('password_confirmation', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn text-white fw-bold px-4" style="background-color: #333; border-radius: 8px;">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('avatar').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar-preview').src = e.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>
@endsection
