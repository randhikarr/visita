<?php

use Illuminate\Support\Facades\Route;

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
