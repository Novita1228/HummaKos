@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Header Section -->
    <div class="mb-5">
        <h2 class="fw-bold mb-2" style="color: #2c3e50; font-size: 28px;">Cari Kamar Impianmu</h2>
        <p class="text-muted" style="font-size: 14px; max-width: 600px; line-height: 1.6;">
            Temukan hunian yang nyaman, aman, dan terpercaya dengan pengelolaan profesional dari HummaKos.
        </p>
    </div>

    <!-- Filter/Sorting Bar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="fw-semibold text-muted" style="font-size: 13px;">
            {{ $availableRoomTypesCount }} Tipe kamar tersedia
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="text-muted" style="font-size: 12px;">Urutkan:</span>
            <select class="form-select form-select-sm shadow-sm" style="width: 130px; border-radius: 6px; border: 1px solid #dee2e6; color: #495057; font-size: 13px;">
                <option value="terbaru">Terbaru</option>
                <option value="termurah">Termurah</option>
                <option value="termahal">Termahal</option>
            </select>
        </div>
    </div>

    <!-- Rooms Grid -->
    <div class="row g-4">
        @forelse($rooms as $room)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="transition: transform 0.2s ease, box-shadow 0.2s ease;">
                <!-- Image Section -->
                <div class="position-relative" style="height: 200px;">
                    @if($room->image_1)
                        <img src="{{ asset('storage/' . $room->image_1) }}" alt="Foto Kamar" class="w-100 h-100" style="object-fit: cover;">
                    @else
                        <!-- Placeholder Image if no image uploaded -->
                        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=600&auto=format&fit=crop" alt="Foto Kamar Default" class="w-100 h-100" style="object-fit: cover;">
                    @endif
                    
                    <!-- Badge Overlay -->
                    <div class="position-absolute" style="top: 12px; left: 12px;">
                        <span class="badge rounded-pill px-3 py-1" style="background-color: #00897B; color: white; font-weight: 500; font-size: 11px;">
                            Tersedia
                        </span>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold mb-1" style="color: #333;">Kamar {{ $room->room_number }}</h5>
                    <div class="mb-3" style="color: #00897B; font-size: 13px; font-weight: 600;">
                        HummaKos, Malang.
                    </div>

                    <!-- Facilities -->
                    <div class="d-flex flex-column gap-2 mb-4 flex-grow-1">
                        @php
                            $facilities = $room->roomType->facilities ?? [];
                        @endphp

                        @if(!empty($facilities))
                            @foreach(array_slice($facilities, 0, 3) as $facility)
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 13px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/></svg>
                                {{ $facility }}
                            </div>
                            @endforeach
                        @else
                            <!-- Default Mockup Facilities if empty -->
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 13px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h11A1.5 1.5 0 0 1 15 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zm1.5-.5a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-11z"/></svg>
                                24 m² Floor Area
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 13px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z"/><path d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091l.016-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .708 0l.707-.707z"/></svg>
                                High Speed Internet
                            </div>
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 13px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-2.586l-1.646 1.647a.5.5 0 1 1-.708-.708l2.5-2.5a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 1 1-.708.708L8.5 10.207v2.586l1.354 1.353a.5.5 0 0 1-.708.708L8.5 14.207V15.5a.5.5 0 0 1-.5.5zM3.464 13.536a.5.5 0 0 1-.707 0L1.404 12.18a.5.5 0 0 1 0-.707l1.353-1.353a.5.5 0 1 1 .708.707L2.404 11.82l1.06 1.06a.5.5 0 0 1 0 .708h.001zm9.072 0a.5.5 0 0 1 0-.708l1.06-1.06-1.06-1.06a.5.5 0 0 1 .708-.707l1.353 1.353a.5.5 0 0 1 0 .707l-1.353 1.353a.5.5 0 0 1-.708 0zM14.5 8a.5.5 0 0 1-.5.5H13a.5.5 0 0 1 0-1h1.5a.5.5 0 0 1 .5.5zm-11 0a.5.5 0 0 1-.5.5H1.5a.5.5 0 0 1 0-1H3a.5.5 0 0 1 .5.5zm8.536-4.536a.5.5 0 0 1 0 .707l-1.06 1.06-1.06-1.06a.5.5 0 1 1 .708-.708l1.353 1.354a.5.5 0 0 1 0 .707l-1.353 1.353a.5.5 0 1 1-.708-.707l1.06-1.06-1.06-1.06a.5.5 0 0 1 .708-.707l1.353 1.353a.5.5 0 0 1 0-.707v.001zm-9.072 0a.5.5 0 0 1 0 .707L2.404 5.232l1.06 1.06a.5.5 0 1 1-.708.707L1.404 5.646a.5.5 0 0 1 0-.707l1.353-1.353a.5.5 0 1 1 .708.707l-1.06 1.06 1.06 1.06a.5.5 0 0 1 0 .707zM8 4.5a.5.5 0 0 1-.5-.5V2.707l-.646.647a.5.5 0 1 1-.708-.708l2.5-2.5a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 1 1-.708.708L8.5 2.707V4a.5.5 0 0 1-.5.5z"/></svg>
                                Air Conditioning
                            </div>
                        @endif
                    </div>

                    <hr class="mt-0 mb-3" style="border-color: #eee;">

                    <!-- Price & Action -->
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <div class="text-muted" style="font-size: 10px; font-weight: 700; letter-spacing: 0.5px;">PER BULAN</div>
                            <h5 class="fw-bold mb-0" style="color: #00897B; font-size: 18px;">
                                Rp {{ number_format($room->roomType->price ?? 1500000, 0, ',', '.') }}
                            </h5>
                        </div>
                        <a href="{{ route('user.room.show', $room) }}" class="btn btn-light px-3 py-2" style="font-size: 12px; font-weight: 600; color: #00897B; background-color: #e0f2f1;">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="text-muted mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/></svg>
            </div>
            <h5 class="fw-bold text-dark">Belum ada kamar yang tersedia</h5>
            <p class="text-muted">Maaf, saat ini belum ada kamar yang kosong. Silakan kembali lagi nanti.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($rooms->hasPages())
    <div class="d-flex justify-content-center mt-5 mb-3">
        {{ $rooms->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

@endsection
