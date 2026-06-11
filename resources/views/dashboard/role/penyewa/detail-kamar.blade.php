@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Back Button -->
    <a href="{{ route('user.cari-kamar') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-4" style="color: #00897B; font-size: 14px; font-weight: 600;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg>
        Kembali
    </a>

    <!-- Image Gallery -->
    <div class="row g-3 mb-4">
        <!-- Main Image -->
        <div class="col-12 col-lg-8">
            <div class="rounded-4 overflow-hidden position-relative" style="height: 380px;">
                @if($room->image_1)
                    <img src="{{ asset('storage/' . $room->image_1) }}" alt="Foto Utama" class="w-100 h-100" style="object-fit: cover;">
                @else
                    <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=1200&auto=format&fit=crop" alt="Foto Kamar Default" class="w-100 h-100" style="object-fit: cover;">
                @endif

                <!-- Badge -->
                <div class="position-absolute" style="top: 16px; left: 16px;">
                    @if($room->status === 'available')
                        <span class="badge rounded-pill px-3 py-2" style="background-color: #00897B; color: white; font-weight: 600; font-size: 12px;">Tersedia</span>
                    @elseif($room->status === 'occupied')
                        <span class="badge rounded-pill px-3 py-2" style="background-color: #7B1FA2; color: white; font-weight: 600; font-size: 12px;">Terisi</span>
                    @else
                        <span class="badge rounded-pill px-3 py-2" style="background-color: #757575; color: white; font-weight: 600; font-size: 12px;">Maintenance</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Side Thumbnails -->
        <div class="col-12 col-lg-4 d-flex flex-lg-column gap-3">
            <div class="rounded-4 overflow-hidden" style="height: 180px; flex: 1;">
                @if($room->image_2)
                    <img src="{{ asset('storage/' . $room->image_2) }}" alt="Foto 2" class="w-100 h-100" style="object-fit: cover;">
                @else
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=600&auto=format&fit=crop" alt="Foto 2 Default" class="w-100 h-100" style="object-fit: cover;">
                @endif
            </div>
            <div class="rounded-4 overflow-hidden" style="height: 180px; flex: 1;">
                @if($room->image_3)
                    <img src="{{ asset('storage/' . $room->image_3) }}" alt="Foto 3" class="w-100 h-100" style="object-fit: cover;">
                @else
                    <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=600&auto=format&fit=crop" alt="Foto 3 Default" class="w-100 h-100" style="object-fit: cover;">
                @endif
            </div>
        </div>
    </div>

    <!-- Room Info Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #2c3e50;">Kamar {{ $room->room_number }}</h3>
            <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 14px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#00897B" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
                <span>HummaKos, Malang.</span>
            </div>
        </div>
        <div class="text-end mt-3 mt-md-0">
            <div class="text-muted mb-1" style="font-size: 11px; font-weight: 700; letter-spacing: 0.5px;">HARGA PER BULAN</div>
            <h3 class="fw-bold mb-0" style="color: #00897B; font-size: 26px;">
                Rp {{ number_format($room->roomType->price ?? 0, 0, ',', '.') }}
            </h3>
        </div>
    </div>

    <!-- Details & Facilities -->
    <div class="row g-4 mb-4">
        <!-- Room Details & Specs -->
        <div class="col-12 col-lg-8">
            <div class="dashboard-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="fw-bold mb-0 text-uppercase text-muted" style="font-size: 12px; letter-spacing: 1px;">Room Details & Specs</h6>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#999" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                </div>

                <div class="row g-3">
                    <!-- Room Size -->
                    <div class="col-6">
                        <div class="p-3 rounded-3" style="background-color: #f8f9fa; border: 1px solid #eef0f2;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#555" viewBox="0 0 16 16"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h11A1.5 1.5 0 0 1 15 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zm1.5-.5a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-11z"/></svg>
                                <span class="text-muted" style="font-size: 12px;">Room Size</span>
                            </div>
                            <div class="fw-bold" style="font-size: 15px; color: #333;">24 m² (4×6m)</div>
                        </div>
                    </div>

                    <!-- Room Type -->
                    <div class="col-6">
                        <div class="p-3 rounded-3" style="background-color: #f8f9fa; border: 1px solid #eef0f2;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#555" viewBox="0 0 16 16"><path d="M2.5 1A1.5 1.5 0 0 0 1 2.5V3h14v-.5A1.5 1.5 0 0 0 13.5 1h-11zM15 4H1v8.5A1.5 1.5 0 0 0 2.5 14h11a1.5 1.5 0 0 0 1.5-1.5V4zM0 2.5A2.5 2.5 0 0 1 2.5 0h11A2.5 2.5 0 0 1 16 2.5v10a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 0 12.5v-10z"/></svg>
                                <span class="text-muted" style="font-size: 12px;">Room Type</span>
                            </div>
                            <div class="fw-bold" style="font-size: 15px; color: #333;">{{ $room->roomType->name ?? '-' }}</div>
                        </div>
                    </div>

                    <!-- Electricity -->
                    <div class="col-6">
                        <div class="p-3 rounded-3" style="background-color: #f8f9fa; border: 1px solid #eef0f2;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#555" viewBox="0 0 16 16"><path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z"/></svg>
                                <span class="text-muted" style="font-size: 12px;">Electricity</span>
                            </div>
                            <div class="fw-bold" style="font-size: 15px; color: #333;">2200 VA (Token)</div>
                        </div>
                    </div>

                    <!-- Connectivity -->
                    <div class="col-6">
                        <div class="p-3 rounded-3" style="background-color: #f8f9fa; border: 1px solid #eef0f2;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#555" viewBox="0 0 16 16"><path d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z"/><path d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091l.016-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .708 0l.707-.707z"/></svg>
                                <span class="text-muted" style="font-size: 12px;">Connectivity</span>
                            </div>
                            <div class="fw-bold" style="font-size: 15px; color: #333;">Up to 100 Mbps</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Room Facilities -->
        <div class="col-12 col-lg-4">
            <div class="dashboard-card h-100 p-4">
                <h6 class="fw-bold mb-4 text-uppercase text-muted" style="font-size: 12px; letter-spacing: 1px;">Room Facilities</h6>

                @php
                    $facilities = $room->roomType->facilities ?? [];
                    $defaultFacilities = ['Air Conditioning (AC)', 'Private Bathroom', 'Water Heater', 'King Size Bed', 'Smart TV 43"'];
                    $displayFacilities = !empty($facilities) ? $facilities : $defaultFacilities;
                @endphp

                <div class="d-flex flex-column gap-3">
                    @foreach($displayFacilities as $facility)
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center" style="width: 24px; height: 24px; border-radius: 50%; background-color: #e0f2f1; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#00897B" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                        </div>
                        <span style="font-size: 14px; color: #333;">{{ $facility }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-center gap-3 mb-4">
        <a href="{{ route('user.room.book', $room) }}" class="btn px-5 py-2 rounded-pill" style="background-color: #00897B; color: white; font-weight: 600; font-size: 14px; text-decoration: none;">
            Pesan Kamar
        </a>
        <button class="btn btn-outline-secondary px-4 py-2 rounded-pill d-flex align-items-center gap-2" style="font-weight: 600; font-size: 14px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/></svg>
            Bantuan
        </button>
    </div>
</div>
@endsection
