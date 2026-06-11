@extends('dashboard.layouts.app')

@section('content')
<div class="container py-4" style="max-width: 800px;">
    <!-- Back Button -->
    <a href="{{ route('user.complaints.index') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-4" style="color: #00897B; font-size: 13px; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
        Kembali ke Daftar Keluhan
    </a>

    <!-- Form Card -->
    <div class="dashboard-card p-0 overflow-hidden">
        <div class="p-4 border-bottom">
            <h4 class="fw-bold mb-1" style="color: #333;">Kirim Keluhan Baru</h4>
            <p class="text-muted mb-0" style="font-size: 13px;">Sampaikan kendala atau keluhan Anda agar kami dapat segera membantu menyelesaikannya.</p>
        </div>

        <form action="{{ route('user.complaints.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf

            <!-- Judul Keluhan -->
            <div class="mb-4">
                <label for="title" class="form-label" style="font-size: 11px; font-weight: 700; color: #555;">Judul Keluhan</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Contoh: AC Kamar 302 Tidak Dingin" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi Detail -->
            <div class="mb-4">
                <label for="description" class="form-label" style="font-size: 11px; font-weight: 700; color: #555;">Deskripsi Detail</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Jelaskan secara detail kendala yang Anda alami..." required>{{ old('description') }}</textarea>
                <div class="text-end text-muted mt-1" style="font-size: 10px;">Maksimal 1000 karakter</div>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Lampiran Foto -->
            <div class="mb-4">
                <label for="image" class="form-label" style="font-size: 11px; font-weight: 700; color: #555;">Lampiran Foto (Opsional)</label>
                <div class="position-relative">
                    <input type="file" name="image" id="image" class="form-control position-absolute top-0 start-0 w-100 h-100 opacity-0" style="cursor: pointer; z-index: 2;" accept="image/png, image/jpeg, image/jpg">
                    <div class="d-flex flex-column align-items-center justify-content-center p-4 rounded-3 text-center" style="background-color: #f8f9fa; border: 2px dashed #b2dfdb;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#00897B" class="mb-2" viewBox="0 0 16 16"><path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/></svg>
                        <div class="fw-bold text-dark" style="font-size: 13px;" id="file-name-display">Klik atau seret foto ke sini</div>
                        <div class="text-muted" style="font-size: 10px;">PNG, JPG up to 5MB</div>
                    </div>
                </div>
                @error('image')
                    <div class="text-danger mt-1" style="font-size: 12px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn text-white fw-bold px-4 py-2 d-flex align-items-center gap-2" style="background-color: #00897B; border-radius: 8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/></svg>
                Kirim Keluhan
            </button>
        </form>
    </div>
</div>

@endsection
