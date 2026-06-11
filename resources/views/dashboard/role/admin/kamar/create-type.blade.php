@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <!-- Back Button -->
            <a href="{{ route('admin.rooms.index') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none text-muted mb-4" style="font-size: 14px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
                Kembali ke Manajemen Kamar
            </a>

            <div class="dashboard-card">
                <h4 class="fw-bold mb-1" style="color: #333;">Tambah Tipe Kamar Baru</h4>
                <p class="text-muted mb-4" style="font-size: 14px;">Isi detail tipe kamar yang ingin ditambahkan.</p>

                @if($errors->any())
                <div class="alert alert-danger" style="border-radius: 10px; font-size: 14px;">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.room-types.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold" style="font-size: 14px;">Nama Tipe Kamar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-3 py-2" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Tipe A, Standard, Deluxe" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-semibold" style="font-size: 14px;">Harga per Bulan (Rp) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control rounded-3 py-2" id="price" name="price" value="{{ old('price') }}" placeholder="Contoh: 1500000" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold" style="font-size: 14px;">Deskripsi</label>
                        <textarea class="form-control rounded-3 py-2" id="description" name="description" rows="3" placeholder="Deskripsi singkat tentang tipe kamar ini...">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="facilities" class="form-label fw-semibold" style="font-size: 14px;">Fasilitas</label>
                        <input type="text" class="form-control rounded-3 py-2" id="facilities" name="facilities" value="{{ old('facilities') }}" placeholder="Pisahkan dengan koma: AC, WiFi, Kamar Mandi Dalam">
                        <small class="text-muted">Pisahkan setiap fasilitas dengan tanda koma.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                            Simpan Tipe Kamar
                        </button>
                        <a href="{{ route('admin.rooms.index') }}" class="btn btn-light px-4 py-2 rounded-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
