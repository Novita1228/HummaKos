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
                <h4 class="fw-bold mb-1" style="color: #333;">Edit Kamar: {{ $room->room_number }}</h4>
                <p class="text-muted mb-4" style="font-size: 14px;">Perbarui detail kamar.</p>

                @if($errors->any())
                <div class="alert alert-danger" style="border-radius: 10px; font-size: 14px;">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="room_type_id" class="form-label fw-semibold" style="font-size: 14px;">Tipe Kamar <span class="text-danger">*</span></label>
                        <select class="form-select rounded-3 py-2" id="room_type_id" name="room_type_id" required>
                            <option value="">-- Pilih Tipe Kamar --</option>
                            @foreach($roomTypes as $type)
                            <option value="{{ $type->id }}" {{ old('room_type_id', $room->room_type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }} - Rp {{ number_format($type->price, 0, ',', '.') }}/bln
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="room_number" class="form-label fw-semibold" style="font-size: 14px;">Nomor Kamar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-3 py-2" id="room_number" name="room_number" value="{{ old('room_number', $room->room_number) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="floor" class="form-label fw-semibold" style="font-size: 14px;">Lantai <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-3 py-2" id="floor" name="floor" value="{{ old('floor', $room->floor) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label fw-semibold" style="font-size: 14px;">Status <span class="text-danger">*</span></label>
                        <select class="form-select rounded-3 py-2" id="status" name="status" required>
                            <option value="available" {{ old('status', $room->status) === 'available' ? 'selected' : '' }}>Tersedia</option>
                            <option value="occupied" {{ old('status', $room->status) === 'occupied' ? 'selected' : '' }}>Terisi</option>
                            <option value="maintenance" {{ old('status', $room->status) === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 14px;">Foto Kamar (Biarkan kosong jika tidak ingin mengubah)</label>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="image_1" class="form-label text-muted" style="font-size: 13px;">Foto 1 (Utama)</label>
                                @if($room->image_1)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $room->image_1) }}" alt="Foto 1" class="img-thumbnail" style="height: 100px; object-fit: cover; width: 100%;">
                                    </div>
                                @endif
                                <input class="form-control" type="file" id="image_1" name="image_1" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label for="image_2" class="form-label text-muted" style="font-size: 13px;">Foto 2</label>
                                @if($room->image_2)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $room->image_2) }}" alt="Foto 2" class="img-thumbnail" style="height: 100px; object-fit: cover; width: 100%;">
                                    </div>
                                @endif
                                <input class="form-control" type="file" id="image_2" name="image_2" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label for="image_3" class="form-label text-muted" style="font-size: 13px;">Foto 3</label>
                                @if($room->image_3)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $room->image_3) }}" alt="Foto 3" class="img-thumbnail" style="height: 100px; object-fit: cover; width: 100%;">
                                    </div>
                                @endif
                                <input class="form-control" type="file" id="image_3" name="image_3" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10z"/></svg>
                            Perbarui Kamar
                        </button>
                        <a href="{{ route('admin.rooms.index') }}" class="btn btn-light px-4 py-2 rounded-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
