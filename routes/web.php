<?php

use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', function () {
    return view('auth.login');
});

// Wali Kelas
Route::get('wali/dashboard', function () {
    return view('wali.dashboard');
});

Route::get('/pages/siswa', function () {
    return view('wali.pages.siswa');
});

Route::get('/pages/nilai', function () {
    return view('wali.pages.nilai');
});

Route::get('/pages/rapor', function () {
    return view('wali.pages.rapor');
});

// Guru
Route::get('/guru/dashboard', function () {
    return view('guru.dashboard');
});

Route::get('/guru/jadwal', function () {
    return view('guru.pages.jadwal');
});

Route::get('/guru/nilai', function () {
    return view('guru.pages.nilai');
});

Route::get('/guru/absensi', function () {
    return view('guru.pages.absensi');
});

// Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/siswa', function () {
    return view('admin.pages.siswa');
});

Route::get('/admin/guru', function () {
    return view('admin.pages.guru');
});

Route::get('/admin/kelas', function () {
    return view('admin.pages.kelas');
});

Route::get('/admin/matapelajaran', function () {
    return view('admin.pages.matapelajaran');
});

// Public
Route::get('/images/{filename}', function ($filename) {
    $path = public_path('images/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
});
