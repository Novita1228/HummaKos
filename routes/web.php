<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }
    if (auth()->user()->hasRole('user')) {
        return redirect()->route('user.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ============================================================
// Admin Routes — hanya bisa diakses oleh role 'admin'
// ============================================================
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/tenants', [\App\Http\Controllers\AdminTenantController::class, 'index'])->name('admin.tenants.index');
    Route::get('/tenants/{tenant}', [\App\Http\Controllers\AdminTenantController::class, 'show'])->name('admin.tenants.show');
    Route::post('/tenants/{tenant}/approve', [\App\Http\Controllers\AdminTenantController::class, 'approve'])->name('admin.tenants.approve');
    Route::post('/tenants/{tenant}/reject', [\App\Http\Controllers\AdminTenantController::class, 'reject'])->name('admin.tenants.reject');
    Route::get('/complaints', [\App\Http\Controllers\AdminComplaintController::class, 'index'])->name('admin.complaints.index');
    Route::get('/complaints/{complaint}', [\App\Http\Controllers\AdminComplaintController::class, 'show'])->name('admin.complaints.show');
    Route::post('/complaints/{complaint}/status', [\App\Http\Controllers\AdminComplaintController::class, 'update'])->name('admin.complaints.update');

    // Room Management
    Route::get('/rooms', [AdminRoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/rooms/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/rooms', [AdminRoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/rooms/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::put('/rooms/{room}', [AdminRoomController::class, 'update'])->name('admin.rooms.update');
    Route::delete('/rooms/{room}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');

    // Room Type Management
    Route::get('/room-types/create', [AdminRoomController::class, 'createType'])->name('admin.room-types.create');
    Route::post('/room-types', [AdminRoomController::class, 'storeType'])->name('admin.room-types.store');
    Route::get('/room-types/{roomType}/edit', [AdminRoomController::class, 'editType'])->name('admin.room-types.edit');
    Route::put('/room-types/{roomType}', [AdminRoomController::class, 'updateType'])->name('admin.room-types.update');
    Route::delete('/room-types/{roomType}', [AdminRoomController::class, 'destroyType'])->name('admin.room-types.destroy');
});

// ============================================================
// User (Penyewa) Routes — hanya bisa diakses oleh role 'user'
// ============================================================
Route::middleware(['auth', 'verified', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/kamar-saya', [\App\Http\Controllers\UserMyRoomController::class, 'index'])->name('user.my-room');

    // Keluhan
    Route::get('/keluhan', [\App\Http\Controllers\UserComplaintController::class, 'index'])->name('user.complaints.index');
    Route::get('/keluhan/create', [\App\Http\Controllers\UserComplaintController::class, 'create'])->name('user.complaints.create');
    Route::post('/keluhan', [\App\Http\Controllers\UserComplaintController::class, 'store'])->name('user.complaints.store');

    // Cari & Pesan Kamar
    Route::get('/cari-kamar', [\App\Http\Controllers\UserRoomController::class, 'index'])->name('user.cari-kamar');
    Route::get('/cari-kamar/{room}', [\App\Http\Controllers\UserRoomController::class, 'show'])->name('user.room.show');
    Route::get('/pesan-kamar/{room}', [\App\Http\Controllers\UserRoomController::class, 'book'])->name('user.room.book');
    Route::post('/pesan-kamar/{room}', [\App\Http\Controllers\UserRoomController::class, 'storeBooking'])->name('user.room.store-booking');
    Route::get('/pembayaran/{room}/{tenant}', [\App\Http\Controllers\UserRoomController::class, 'payment'])->name('user.room.payment');
    Route::post('/pembayaran/{room}/{tenant}', [\App\Http\Controllers\UserRoomController::class, 'storePayment'])->name('user.room.store-payment');
});

// ============================================================
// Shared Routes — bisa diakses oleh semua user yang sudah login
// ============================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
