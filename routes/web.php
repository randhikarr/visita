<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

// ============================================
// PUBLIC ROUTES (Tidak perlu login)
// ============================================

// Halaman Utama
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

// Halaman Museum (dengan API Integration)
Route::get('/museum', function () {
    return view('museum');
})->name('museum');

// Halaman Lokasi (dengan Google Maps)
Route::get('/lokasi', function () {
    return view('lokasi');
})->name('lokasi');

// Halaman Tiket Saya
Route::get('/tiket-saya', function () {
    return view('tiket_saya');
})->name('tiket.saya');

// Halaman Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Halaman Detail Museum
Route::get('/museum/greyart', function () {
    return view('greyart');
})->name('greyart');

// Halaman Reservasi
Route::get('/reservasi', function () {
    return view('reservasi');
})->name('reservasi');

// Halaman QR Code
Route::get('/qrcode', function () {
    return view('qrcode1');
})->name('qrcode1');

// Halaman Blog
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Halaman Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ============================================
// ADMIN ROUTES
// ============================================

Route::prefix('admin')->name('admin.')->group(function () {
    
    // Admin Login (untuk yang belum login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    // Admin Protected Routes (harus login sebagai admin)
    Route::middleware('admin.auth')->group(function () {
        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Museum Management (CRUD)
        Route::get('/museums', [DashboardController::class, 'museums'])->name('museums');
        Route::get('/museums/create', [DashboardController::class, 'createMuseum'])->name('museums.create');
        Route::post('/museums', [DashboardController::class, 'storeMuseum'])->name('museums.store');
        Route::get('/museums/{id}/edit', [DashboardController::class, 'editMuseum'])->name('museums.edit');
        Route::put('/museums/{id}', [DashboardController::class, 'updateMuseum'])->name('museums.update');
        Route::delete('/museums/{id}', [DashboardController::class, 'deleteMuseum'])->name('museums.delete');
        
    });
});