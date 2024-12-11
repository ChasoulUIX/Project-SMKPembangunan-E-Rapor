<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\MuridController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\MatapelajaranController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\WaliController;
use App\Http\Controllers\Wali\WaliMuridController;
use App\Http\Controllers\Wali\DaftarSiswaController;
use App\Http\Controllers\Wali\DaftarNilaiController;
use App\Http\Controllers\Wali\WaliRaporController;
use App\Http\Controllers\Wali\WaliMatapelajaranController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Wali\WaliNilaiSiswaController;
use App\Http\Controllers\Wali\TambahSiswaController;


// Auth
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, '__invoke'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); 

// Wali Kelas
Route::get('wali/dashboard', function () {
    return view('wali.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/wali', [WaliController::class, 'index'])->name('admin.pages.wali.index');
    Route::get('/wali/create', [WaliController::class, 'create'])->name('admin.pages.wali.create');
    Route::post('/wali', [WaliController::class, 'store'])->name('admin.pages.wali.store');
    Route::get('/wali/{wali}', [WaliController::class, 'show'])->name('admin.pages.wali.show');
    Route::get('/wali/{wali}/edit', [WaliController::class, 'edit'])->name('admin.pages.wali.edit');
    Route::put('/wali/{wali}', [WaliController::class, 'update'])->name('admin.pages.wali.update');
    Route::delete('/wali/{wali}', [WaliController::class, 'destroy'])->name('admin.pages.wali.destroy');
    Route::post('/wali/murid', [WaliController::class, 'storeMurid'])->name('wali.murid.store');
});

Route::get('/pages/tambahsiswa', function () {
    return view('wali.pages.tambahsiswa');
});

Route::prefix('wali')->group(function () {
    Route::get('/tambahsiswa', [TambahSiswaController::class, 'index'])->name('wali.tambahsiswa.index');
    Route::post('/tambahsiswa', [TambahSiswaController::class, 'store'])->name('wali.tambahsiswa.store');
    Route::get('/tambahsiswa/create', [TambahSiswaController::class, 'create'])->name('wali.tambahsiswa.create');
    Route::get('/tambahsiswa/edit/{nis}', [TambahSiswaController::class, 'edit'])->name('wali.tambahsiswa.edit');
    Route::put('/tambahsiswa/update/{nis}', [TambahSiswaController::class, 'update'])->name('wali.tambahsiswa.update');
    Route::delete('/tambahsiswa/delete/{nis}', [TambahSiswaController::class, 'destroy'])->name('wali.tambahsiswa.destroy');
});

Route::get('/pages/siswa', function () {
    return view('wali.pages.siswa');
});

Route::prefix('wali')->group(function () {
    Route::get('/siswa', [WaliMuridController::class, 'index'])->name('wali.siswa.index');
    Route::get('/siswa/create', [WaliMuridController::class, 'create'])->name('wali.siswa.create');
    Route::post('/siswa', [WaliMuridController::class, 'store'])->name('wali.siswa.store');
    Route::get('/siswa/{siswa}', [WaliMuridController::class, 'show'])->name('wali.siswa.show');
    Route::get('/siswa/{murid}/edit', [WaliMuridController::class, 'edit'])->name('wali.siswa.edit');
    Route::put('/siswa/{murid}', [WaliMuridController::class, 'update'])->name('wali.siswa.update');
    Route::delete('/siswa/{murid}', [WaliMuridController::class, 'destroy'])->name('wali.siswa.destroy');
    Route::post('/siswa', [DaftarSiswaController::class, 'store'])->name('wali.siswa.store');
    Route::get('/siswa', [DaftarSiswaController::class, 'index'])->name('wali.siswa.index');
});

Route::get('/pages/nilai', function () {
    return view('wali.pages.nilai');
});

Route::prefix('wali')->group(function () {
    Route::get('/nilai', [WaliNilaiSiswaController::class, 'index'])->name('wali.nilai.index');
    Route::get('/nilai/{id}', [WaliNilaiSiswaController::class, 'show'])->name('wali.nilai.show');
});

Route::get('/pages/rapor', function () {
    return view('wali.pages.rapor');
});
Route::prefix('wali')->group(function () {
    Route::get('/rapor', [WaliRaporController::class, 'index'])->name('wali.rapor.index');
    Route::get('/rapor/detail/{nis}', [WaliRaporController::class, 'detail'])->name('wali.rapor.detail');
    Route::post('/rapor/download-pdf', [WaliRaporController::class, 'downloadPDF'])->name('wali.rapor.downloadPDF');
    Route::post('/rapor/download-image', [WaliRaporController::class, 'downloadImage'])->name('wali.rapor.downloadImage');
});


Route::get('/pages/matapelajaran', function () {
    return view('wali.pages.matapelajaran');
});

Route::prefix('wali')->group(function () {
    Route::get('/matapelajaran', [WaliMatapelajaranController::class, 'index'])->name('wali.matapelajaran.index');
    Route::get('/matapelajaran/create', [WaliMatapelajaranController::class, 'create'])->name('wali.matapelajaran.create');
    Route::post('/matapelajaran', [WaliMatapelajaranController::class, 'store'])->name('wali.matapelajaran.store');
    Route::get('/matapelajaran/{matapelajaran}', [WaliMatapelajaranController::class, 'show'])->name('wali.matapelajaran.show');
    Route::get('/matapelajaran/{matapelajaran}/edit', [WaliMatapelajaranController::class, 'edit'])->name('wali.matapelajaran.edit');
    Route::put('/matapelajaran/{matapelajaran}', [WaliMatapelajaranController::class, 'update'])->name('wali.matapelajaran.update');
    Route::delete('/matapelajaran/{matapelajaran}', [WaliMatapelajaranController::class, 'destroy'])->name('wali.matapelajaran.destroy');
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

Route::prefix('guru')->group(function () {
    Route::get('/nilai', [NilaiController::class, 'index'])->name('guru.nilai.index');
    Route::get('/nilai/create', [NilaiController::class, 'create'])->name('guru.nilai.create');
    Route::post('/nilai', [NilaiController::class, 'store'])->name('guru.nilai.store');
    Route::get('/nilai/{id}', [NilaiController::class, 'show'])->name('guru.nilai.show');
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('guru.nilai.edit');
    Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('guru.nilai.update');
    Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('guru.nilai.destroy');
});


Route::get('/guru/absensi', function () {
    return view('guru.pages.absensi');
});

Route::get('/guru/detailkelas/{id}', [NilaiController::class, 'detailkelas'])->name('guru.detailkelas');



// Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::prefix('admin')->group(function () {
    
    Route::get('/siswa', [MuridController::class, 'index'])->name('admin.pages.siswa');
    Route::get('/pages/siswa', [MuridController::class, 'index'])->name('admin.pages.siswa');
    Route::get('/pages/siswa/create', [MuridController::class, 'create'])->name('admin.pages.siswa.create');
    Route::post('/pages/siswa', [MuridController::class, 'store'])->name('admin.pages.siswa.store');
    Route::get('/pages/siswa/{nis}', [MuridController::class, 'show'])->name('admin.pages.siswa.show');
    Route::get('/pages/siswa/{nis}/edit', [MuridController::class, 'edit'])->name('admin.pages.siswa.edit');
    Route::put('/pages/siswa/{nis}', [MuridController::class, 'update'])->name('admin.pages.siswa.update');
    Route::delete('/pages/siswa/{nis}', [MuridController::class, 'destroy'])->name('admin.pages.siswa.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('admin.pages.guru');
    Route::get('/pages/guru', [GuruController::class, 'index'])->name('admin.pages.guru');
    Route::get('/pages/guru/create', [GuruController::class, 'create'])->name('admin.pages.guru.create');
    Route::post('/pages/guru', [GuruController::class, 'store'])->name('admin.pages.guru.store');
    Route::get('/pages/guru/{nip}', [GuruController::class, 'show'])->name('admin.pages.guru.show');
    Route::get('/pages/guru/{nip}/edit', [GuruController::class, 'edit'])->name('admin.pages.guru.edit');
    Route::put('/pages/guru/{nip}', [GuruController::class, 'update'])->name('admin.pages.guru.update');
    Route::delete('/pages/guru/{nip}', [GuruController::class, 'destroy'])->name('admin.pages.guru.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('admin.pages.kelas.index');
    Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('admin.pages.kelas.show');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('admin.pages.kelas.create');
    Route::post('/kelas', [KelasController::class, 'store'])->name('admin.pages.kelas.store');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('admin.pages.kelas.edit');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('admin.pages.kelas.update');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('admin.pages.kelas.destroy');
});


Route::get('/admin/matapelajaran', function () {
    return view('admin.pages.matapelajaran');
});


Route::prefix('admin')->group(function () {
    Route::get('/matapelajaran', [MatapelajaranController::class, 'index'])->name('admin.pages.matapelajaran');
    Route::post('/matapelajaran', [MatapelajaranController::class, 'store'])->name('admin.pages.matapelajaran.store');
    Route::get('/matapelajaran/{matapelajaran}', [MatapelajaranController::class, 'show'])->name('admin.pages.matapelajaran.show');
    Route::get('/matapelajaran/{matapelajaran}/edit', [MatapelajaranController::class, 'edit'])->name('admin.pages.matapelajaran.edit');
    Route::put('/matapelajaran/{matapelajaran}', [MatapelajaranController::class, 'update'])->name('admin.pages.matapelajaran.update');
    Route::delete('/matapelajaran/{matapelajaran}', [MatapelajaranController::class, 'destroy'])->name('admin.pages.matapelajaran.destroy');
    Route::get('/pages/matapelajaran', [MatapelajaranController::class, 'index'])->name('admin.pages.matapelajaran');
});


// Public
Route::get('/images/{filename}', function ($filename) {
    $path = public_path('images/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
});
