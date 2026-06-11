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
                <h4 class="fw-bold mb-1" style="color: #333;">Tambah Kamar Baru</h4>
                <p class="text-muted mb-4" style="font-size: 14px;">Isi detail kamar yang ingin ditambahkan.</p>

                @if($errors->any())
                <div class="alert alert-danger" style="border-radius: 10px; font-size: 14px;">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="room_type_id" class="form-label fw-semibold" style="font-size: 14px;">Tipe Kamar <span class="text-danger">*</span></label>
                        <select class="form-select rounded-3 py-2" id="room_type_id" name="room_type_id" required>
                            <option value="">-- Pilih Tipe Kamar --</option>
                            @foreach($roomTypes as $type)
                            <option value="{{ $type->id }}" {{ old('room_type_id', request('type')) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }} - Rp {{ number_format($type->price, 0, ',', '.') }}/bln
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="room_number" class="form-label fw-semibold" style="font-size: 14px;">Nomor Kamar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-3 py-2" id="room_number" name="room_number" value="{{ old('room_number') }}" placeholder="Contoh: A-01, B-03" required>
                    </div>

                    <div class="mb-3">
                        <label for="floor" class="form-label fw-semibold" style="font-size: 14px;">Lantai <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-3 py-2" id="floor" name="floor" value="{{ old('floor') }}" placeholder="Contoh: Lantai 1, Lantai 2" required>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label fw-semibold" style="font-size: 14px;">Status <span class="text-danger">*</span></label>
                        <select class="form-select rounded-3 py-2" id="status" name="status" required>
                            <option value="available" {{ old('status') === 'available' ? 'selected' : '' }}>Tersedia</option>
                            <option value="occupied" {{ old('status') === 'occupied' ? 'selected' : '' }}>Terisi</option>
                            <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 14px;">Foto Kamar (Maksimal 3 Foto)</label>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="image_1" class="form-label text-muted" style="font-size: 13px;">Foto 1 (Utama)</label>
                                <input class="form-control" type="file" id="image_1" name="image_1" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label for="image_2" class="form-label text-muted" style="font-size: 13px;">Foto 2</label>
                                <input class="form-control" type="file" id="image_2" name="image_2" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label for="image_3" class="form-label text-muted" style="font-size: 13px;">Foto 3</label>
                                <input class="form-control" type="file" id="image_3" name="image_3" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                            Simpan Kamar
                        </button>
                        <a href="{{ route('admin.rooms.index') }}" class="btn btn-light px-4 py-2 rounded-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
