<?php

use App\Http\Controllers\AdminKelolaPanggilanTesController;
use App\Http\Controllers\PerusahaanKelolaPanggilanTesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelolaPelamarController;
use App\Http\Controllers\KelolaPerusahaanController;
use App\Http\Controllers\AdminLowonganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PerusahaanPelamarController;
use App\Http\Controllers\PerusahaanLowonganController;
use App\Http\Controllers\LamarController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

// Rute yang dikelompokkan dengan middleware 'auth' hanya bisa diakses admin jika sudah login
Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profil', [ProfilController::class, 'showProfile'])->name('admin.profile');
    Route::put('/admin/profil/update', [ProfilController::class, 'updateProfile'])->name('admin.profil.update');
    Route::resource('kelolapelamar', KelolaPelamarController::class);
    Route::resource('kelolaperusahaan', KelolaPerusahaanController::class);
    Route::resource('kelolalowongan', AdminLowonganController::class);
    Route::resource('kelolapanggilantes', AdminKelolaPanggilanTesController::class);
    
});

Route::get('/file/{folder}/{filename}', function ($folder, $filename) {
    // Path ke file
    $filePath = storage_path("app/private/{$folder}/{$filename}");

    // Pastikan file ada
    if (!file_exists($filePath)) {
        abort(404);
    }

    // Return file untuk download atau display
    return response()->download($filePath);
});


Route::middleware('auth')->group(function () {
    Route::get('pelamar/dashboard', [PelamarController::class, 'index'])->name('pelamar.index');
});

//rute untuk menampilkan lowongan
Route::get('/pelamar/lowongan', [PelamarController::class, 'show'])->name('pelamar.lowongan');

//rute untuk menampilkan lowongan detail
Route::get('/pelamar/lowongan/{id}/detail', [PelamarController::class, 'showDetail'])->name('pelamar.lowongan.detail');


Route::middleware('auth')->group(function () {
    Route::get('perusahaan/dashboard', [PerusahaanController::class, 'index'])->name('perusahaan.dashboard');
    Route::get('/perusahaan/profil', [ProfilController::class, 'showProfile'])->name('perusahaan.profile');
    Route::put('/perusahaan/profil/update', [ProfilController::class, 'updateProfile'])->name('perusahaan.profil.update');
    Route::resource('kelolalowonganperusahaan', PerusahaanController::class);

    Route::resource('kelolalowonganperusahaan', PerusahaanLowonganController::class);
    Route::resource('kelolapelamarperusahaan', PerusahaanPelamarController::class);
    Route::resource('kelolapanggilantesperusahaan', PerusahaanKelolaPanggilanTesController::class);
});

Route::prefix('register')->group(function () {
    // Register Admin
    Route::get('admin', [RegisterController::class, 'showAdminRegistrationForm'])->name('register.admin');
    Route::post('admin', [RegisterController::class, 'registerAdmin'])->name('register.admin.submit');

    // Register Pelamar
    Route::get('pelamar', [RegisterController::class, 'showPelamarRegistrationForm'])->name('register.pelamar');
    Route::post('pelamar', [RegisterController::class, 'registerPelamar'])->name('register.pelamar.submit');

    // Register Perusahaan
    Route::get('perusahaan', [RegisterController::class, 'showPerusahaanRegistrationForm'])->name('register.perusahaan');
    Route::post('perusahaan', [RegisterController::class, 'registerPerusahaan'])->name('register.perusahaan.submit');
});

// Rute dengan prefix 'login'
Route::prefix('login')->group(function() {
    // Formulir login untuk Admin
    Route::get('admin', [LoginController::class, 'showAdminLoginForm'])->name('login.admin');

    // Formulir login untuk Pelamar
    Route::get('pelamar', [LoginController::class, 'showPelamarLoginForm'])->name('login.pelamar');

    // Formulir login untuk Perusahaan
    Route::get('perusahaan', [LoginController::class, 'showPerusahaanLoginForm'])->name('login.perusahaan');

    // Proses login untuk Admin
    Route::post('admin', [LoginController::class, 'loginAdmin'])->name('login.admin.submit');

    // Proses login untuk Pelamar
    Route::post('pelamar', [LoginController::class, 'loginPelamar'])->name('login.pelamar.submit');

    // Proses login untuk Perusahaan
    Route::post('perusahaan', [LoginController::class, 'loginPerusahaan'])->name('login.perusahaan.submit');
});

// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::resource('pengunjung',PengunjungController::class);

Route::resource('lamar',LamarController::class);

Auth::routes();

// Rute untuk halaman home
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
