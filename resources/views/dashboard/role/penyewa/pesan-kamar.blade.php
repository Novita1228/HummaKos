@extends('dashboard.layouts.app')

@section('content')
<div class="container py-2" style="max-width: 1100px;">
    <!-- Back Button -->
    <a href="{{ route('user.room.show', $room) }}" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-4" style="color: #00897B; font-size: 13px; font-weight: 700;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
        Kembali
    </a>

    <div class="row g-4">
        <!-- Left Column: Form -->
        <div class="col-12 col-lg-7 col-xl-8">
            <div class="card border-0 rounded-4" style="background-color: #f1f5f4; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold mb-2" style="color: #00695C;">Pesan Kamar Anda</h2>
                    <p class="text-muted mb-4" style="font-size: 14px;">Lengkapi detail berikut untuk mengamankan unit Anda di HummaKos.</p>

                    <form action="{{ route('user.room.store-booking', $room) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Informasi Pribadi -->
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00695C" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 15px;">Informasi Pribadi</h6>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-dark" style="font-size: 12px; font-weight: 600;">Nama Lengkap (sesuai KTP)</label>
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control rounded-3 py-2 border-0 @error('nama_lengkap') is-invalid @enderror" placeholder="e.g. Adhi Nugraha" style="font-size: 13px;" required>
                                @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark" style="font-size: 12px; font-weight: 600;">Nomor WhatsApp</label>
                                <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" class="form-control rounded-3 py-2 border-0 @error('whatsapp') is-invalid @enderror" placeholder="+62 812 XXXX XXXX" style="font-size: 13px;" required>
                                @error('whatsapp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark" style="font-size: 12px; font-weight: 600;">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-3 py-2 border-0 @error('email') is-invalid @enderror" placeholder="adhi@example.com" style="font-size: 13px;" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark" style="font-size: 12px; font-weight: 600;">Nomor Identitas (KTP)</label>
                                <input type="text" name="ktp" value="{{ old('ktp') }}" class="form-control rounded-3 py-2 border-0 @error('ktp') is-invalid @enderror" placeholder="16-digit ID number" style="font-size: 13px;" required>
                                @error('ktp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <!-- Rincian Sewa -->
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00695C" viewBox="0 0 16 16"><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 15px;">Rincian Sewa</h6>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-dark" style="font-size: 12px; font-weight: 600;">Tanggal Pindah Masuk yang Direncanakan</label>
                                <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" class="form-control rounded-3 py-2 border-0 text-muted @error('tanggal_masuk') is-invalid @enderror" style="font-size: 13px;" required>
                                @error('tanggal_masuk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark" style="font-size: 12px; font-weight: 600;">Durasi Menginap</label>
                                <select name="durasi" class="form-select rounded-3 py-2 border-0 text-dark @error('durasi') is-invalid @enderror" style="font-size: 13px;" required>
                                    <option value="6 Months" {{ old('durasi') == '6 Months' ? 'selected' : '' }}>6 Months</option>
                                    <option value="12 Months" {{ old('durasi') == '12 Months' ? 'selected' : '' }}>12 Months</option>
                                </select>
                                @error('durasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <!-- Unggahan Dokumen -->
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00695C" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5zM8.5 11.5A.5.5 0 0 1 8 12H2a.5.5 0 0 1 0-1h6a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M8.5 13.5A.5.5 0 0 1 8 14H2a.5.5 0 0 1 0-1h6a.5.5 0 0 1 .5.5z"/></svg>
                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 15px;">Unggahan Dokumen</h6>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-dark" style="font-size: 12px; font-weight: 600;">Foto Kartu Identitas (KTP)</label>

                            <!-- Drag and Drop Area -->
                            <div class="position-relative text-center p-4 rounded-3 @error('foto_ktp') border-danger @enderror" style="border: 2px dashed #b2dfdb; background-color: #f1f8f7;">
                                <input type="file" name="foto_ktp" class="position-absolute w-100 h-100 start-0 top-0 opacity-0" style="cursor: pointer;" accept="image/*,application/pdf">
                                <div class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#00897B" class="mb-2" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/></svg>
                                    <div style="font-size: 13px; font-weight: 600; color: #555;">Click or drag and drop KTP photo here</div>
                                    <div style="font-size: 11px;">Maximum size 5MB (JPG, PNG, PDF)</div>
                                </div>
                            </div>
                            @error('foto_ktp')<div class="text-danger mt-1" style="font-size: 12px;">{{ $message }}</div>@enderror
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="mb-4 p-3 rounded-3" style="background-color: #e8eaf6;">
                            <div class="form-check d-flex align-items-start gap-2">
                                <input class="form-check-input mt-1 @error('terms') is-invalid @enderror" type="checkbox" name="terms" id="termsCheck" required style="cursor: pointer;">
                                <label class="form-check-label text-muted" for="termsCheck" style="font-size: 12px; line-height: 1.5;">
                                    I agree to the <a href="#" style="color: #3f51b5; text-decoration: none; font-weight: 600;">Terms and Conditions</a> and the Privacy Policy of HummaKos. I confirm that all information provided is accurate and authentic.
                                </label>
                            </div>
                            @error('terms')<div class="text-danger mt-1" style="font-size: 12px;">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn w-100 py-3 rounded-3 fw-bold d-flex align-items-center justify-content-center gap-2" style="background-color: #00695C; color: white; font-size: 15px;">
                            Ajukan Penyewaan
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column: Room Preview -->
        <div class="col-12 col-lg-5 col-xl-4">
            <!-- Room Card -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                <div class="position-relative" style="height: 180px;">
                    @if($room->image_1)
                        <img src="{{ asset('storage/' . $room->image_1) }}" alt="Foto Kamar" class="w-100 h-100" style="object-fit: cover;">
                    @else
                        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=600&auto=format&fit=crop" alt="Foto Kamar Default" class="w-100 h-100" style="object-fit: cover;">
                    @endif
                    <div class="position-absolute" style="top: 12px; left: 12px;">
                        <span class="badge rounded-pill px-3 py-1" style="background-color: #00897B; color: white; font-weight: 500; font-size: 10px;">Tersedia</span>
                    </div>
                </div>

                <div class="card-body p-4">
                    <h5 class="fw-bold mb-1" style="color: #333;">Kamar {{ $room->room_number }}</h5>
                    <div class="mb-3 text-muted" style="font-size: 12px;">HummaKos, Malang.</div>

                    <div class="d-flex flex-column gap-2 mb-4">
                        @php
                            $facilities = $room->roomType->facilities ?? [];
                        @endphp

                        @if(!empty($facilities))
                            @foreach(array_slice($facilities, 0, 3) as $facility)
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/></svg>
                                {{ $facility }}
                            </div>
                            @endforeach
                        @else
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h11A1.5 1.5 0 0 1 15 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zm1.5-.5a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-11z"/></svg>
                                24 m² Floor Area
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z"/><path d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091l.016-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .708 0l.707-.707z"/></svg>
                                High Speed Internet
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 12px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-2.586l-1.646 1.647a.5.5 0 1 1-.708-.708l2.5-2.5a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 1 1-.708.708L8.5 10.207v2.586l1.354 1.353a.5.5 0 0 1-.708.708L8.5 14.207V15.5a.5.5 0 0 1-.5.5zM3.464 13.536a.5.5 0 0 1-.707 0L1.404 12.18a.5.5 0 0 1 0-.707l1.353-1.353a.5.5 0 1 1 .708.707L2.404 11.82l1.06 1.06a.5.5 0 0 1 0 .708h.001zm9.072 0a.5.5 0 0 1 0-.708l1.06-1.06-1.06-1.06a.5.5 0 0 1 .708-.707l1.353 1.353a.5.5 0 0 1 0 .707l-1.353 1.353a.5.5 0 0 1-.708 0zM14.5 8a.5.5 0 0 1-.5.5H13a.5.5 0 0 1 0-1h1.5a.5.5 0 0 1 .5.5zm-11 0a.5.5 0 0 1-.5.5H1.5a.5.5 0 0 1 0-1H3a.5.5 0 0 1 .5.5zm8.536-4.536a.5.5 0 0 1 0 .707l-1.06 1.06-1.06-1.06a.5.5 0 1 1 .708-.708l1.353 1.354a.5.5 0 0 1 0 .707l-1.353 1.353a.5.5 0 1 1-.708-.707l1.06-1.06-1.06-1.06a.5.5 0 0 1 .708-.707l1.353 1.353a.5.5 0 0 1 0-.707v.001zm-9.072 0a.5.5 0 0 1 0 .707L2.404 5.232l1.06 1.06a.5.5 0 1 1-.708.707L1.404 5.646a.5.5 0 0 1 0-.707l1.353-1.353a.5.5 0 1 1 .708.707l-1.06 1.06 1.06 1.06a.5.5 0 0 1 0 .707zM8 4.5a.5.5 0 0 1-.5-.5V2.707l-.646.647a.5.5 0 1 1-.708-.708l2.5-2.5a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 1 1-.708.708L8.5 2.707V4a.5.5 0 0 1-.5.5z"/></svg>
                                Air Conditioning
                            </div>
                        @endif
                    </div>

                    <hr class="mt-0 mb-3" style="border-color: #eee;">

                    <div class="d-flex justify-content-between align-items-end">
                        <div class="text-muted" style="font-size: 10px; font-weight: 700;">Harga Perbulan</div>
                        <h5 class="fw-bold mb-0" style="color: #00897B; font-size: 18px;">
                            Rp {{ number_format($room->roomType->price ?? 1500000, 0, ',', '.') }}
                        </h5>
                    </div>
                </div>
            </div>

            <!-- Secure Booking Box -->
            <div class="card border-0 rounded-3 p-3" style="background-color: #f1f8f7; border: 1px solid #b2dfdb !important;">
                <div class="d-flex align-items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00695C" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/></svg>
                    <div>
                        <div class="fw-bold text-dark" style="font-size: 11px;">Secure Booking</div>
                        <div class="text-muted" style="font-size: 10px; line-height: 1.3;">Your data is encrypted and managed according to HummaKos security standards.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
