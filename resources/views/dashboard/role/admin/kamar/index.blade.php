@extends('dashboard.layouts.app')

@section('content')
<div class="container-fluid py-2">
    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box bg-teal-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                        </svg>
                    </div>
                    <span class="text-muted d-none d-sm-inline" style="font-size: 11px; font-weight: 500;">Total Rooms</span>
                </div>
                <div class="text-muted d-sm-none mb-1" style="font-size: 11px;">Total Rooms</div>
                <h3 class="fw-bold mb-1">{{ $totalRooms }}</h3>
                <div class="d-flex align-items-center gap-1 text-teal" style="font-size: 11px; color: #00897B; font-weight: 600;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/></svg>
                    +4 this month
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box bg-gray-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#757575" viewBox="0 0 16 16">
                            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                        </svg>
                    </div>
                    <span class="status-badge bg-teal-light d-none d-sm-inline">{{ $occupancyRate }}% Occupied</span>
                </div>
                <div class="text-muted mb-1" style="font-size: 13px;">Kamar Terisi</div>
                <h3 class="fw-bold mb-0">{{ $occupiedRooms }}</h3>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box bg-gray-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#757575" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                        </svg>
                    </div>
                    <span class="status-badge bg-gray-light d-none d-sm-inline">Available</span>
                </div>
                <div class="text-muted mb-1" style="font-size: 13px;">Kamar Kosong</div>
                <h3 class="fw-bold mb-0">{{ $availableRooms }}</h3>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="dashboard-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-box bg-gray-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#757575" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/>
                        </svg>
                    </div>
                    <span class="text-muted d-none d-sm-inline" style="font-size: 11px; font-weight: 500;">Maintenance</span>
                </div>
                <div class="text-muted d-sm-none mb-1" style="font-size: 11px;">Maintenance</div>
                <h3 class="fw-bold mb-1">{{ $maintenanceRooms }}</h3>
                <div class="text-danger" style="font-size: 11px; font-weight: 600;">
                    Action required
                </div>
            </div>
        </div>
    </div>

    <!-- Header Section -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h4 class="fw-bold mb-1" style="color: #333;">Manajemen Ruangan</h4>
            <p class="text-muted mb-0" style="font-size: 14px;">Memantau dan mengelola semua unit yang tersedia di seluruh properti.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">

            <a href="{{ route('admin.room-types.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-2" style="font-size: 12px; font-weight: 600;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                Tambah Tipe Kamar
            </a>
        </div>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="border-radius: 10px; font-size: 14px;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Room Types Tables -->
    @forelse($roomTypes as $type)
    <div class="dashboard-card mb-4 p-0 overflow-hidden">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center p-3 p-md-4 border-bottom gap-3">
            <div class="d-flex align-items-center gap-3">
                <h5 class="fw-bold mb-0" style="font-size: 16px; color: #333;">Kamar {{ $type->name }}</h5>
                <span class="status-badge bg-gray-light text-muted" style="font-size: 10px; font-weight: 600;">Updated 5m ago</span>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <form action="{{ route('admin.room-types.destroy', $type) }}" method="POST" class="m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini beserta semua kamar di dalamnya?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center gap-1" style="font-size: 12px; font-weight: 600;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H5.5l1-1h3l1 1H14a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                        Hapus Tipe
                    </button>
                </form>
                <a href="{{ route('admin.rooms.create', ['type' => $type->id]) }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1" style="font-size: 12px; font-weight: 600;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                    Tambah Kamar
                </a>
            </div>
        </div>

        @if($type->rooms->count() > 0)
        <div class="table-responsive">
            <table class="table dashboard-table mb-0">
                <thead>
                    <tr>
                        <th>NOMOR KAMAR</th>
                        <th>LANTAI</th>
                        <th>STATUS</th>
                        <th>PENYEWA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($type->rooms as $room)
                    <tr>
                        <td>
                            <span class="fw-bold" style="color: #00897B;">{{ $room->room_number }}</span>
                        </td>
                        <td>{{ $room->floor }}</td>
                        <td>
                            @if($room->status === 'available')
                                <span class="badge rounded-pill bg-teal-light d-inline-flex align-items-center gap-1 px-2 py-1" style="font-weight: 600;">
                                    <span class="legend-dot kosong" style="width: 6px; height: 6px; background-color: #00897B;"></span>
                                    <span style="color: #00897B; font-size: 10px;">Tersedia</span>
                                </span>
                            @elseif($room->status === 'occupied')
                                <span class="badge rounded-pill bg-purple-light d-inline-flex align-items-center gap-1 px-2 py-1" style="font-weight: 600;">
                                    <span class="legend-dot terisi" style="width: 6px; height: 6px; background-color: #8E24AA;"></span>
                                    <span style="color: #8E24AA; font-size: 10px;">Terisi</span>
                                </span>
                            @else
                                <span class="badge rounded-pill bg-gray-light d-inline-flex align-items-center gap-1 px-2 py-1" style="font-weight: 600;">
                                    <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #757575; display: inline-block;"></span>
                                    <span style="color: #757575; font-size: 10px;">Maintenance</span>
                                </span>
                            @endif
                        </td>
                        <td>
                            @if($room->activeTenant && $room->activeTenant->user)
                                {{ $room->activeTenant->user->name }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <a href="{{ route('admin.rooms.edit', $room) }}" class="text-muted" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                                </a>
                                <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" onsubmit="return confirm('Hapus kamar {{ $room->room_number }}?')" class="m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-muted p-0 m-0" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H5.5l1-1h3l1 1H14a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center p-3 border-top" style="background-color: #fafafa;">
            <span class="text-muted mb-2 mb-md-0" style="font-size: 11px;">Showing 1 to {{ $type->rooms->count() }} of {{ $type->rooms->count() }} entries</span>
            <div class="d-flex align-items-center gap-2" style="font-size: 11px; font-weight: 600;">
                <button class="btn btn-link text-muted p-0 text-decoration-none">&lt;</button>
                <button class="btn btn-primary btn-sm px-2 py-0" style="font-size: 11px; min-width: 20px;">1</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">2</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">3</button>
                <span class="text-muted">...</span>
                <button class="btn btn-link text-muted p-0 text-decoration-none">25</button>
                <button class="btn btn-link text-muted p-0 text-decoration-none">&gt;</button>
            </div>
        </div
        @else
        <div class="text-center text-muted py-4" style="font-size: 14px;">
            <p class="mb-2">Belum ada kamar untuk tipe ini.</p>
            <a href="{{ route('admin.rooms.create', ['type' => $type->id]) }}" class="btn btn-sm btn-primary">Tambah Kamar Pertama</a>
        </div>
        @endif
    </div>
    @empty
    <div class="dashboard-card text-center py-5">
        <div class="icon-box bg-teal-light mx-auto mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
            </svg>
        </div>
        <h5 class="fw-bold mb-2">Belum Ada Tipe Kamar</h5>
        <p class="text-muted mb-3" style="font-size: 14px;">Mulai dengan membuat tipe kamar pertama untuk mengelola properti Anda.</p>
        <a href="{{ route('admin.room-types.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
            Tambah Tipe Kamar
        </a>
    </div>
    @endforelse
</div>
@endsection
