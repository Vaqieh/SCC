<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelolaPelamarController;
use App\Http\Controllers\KelolaPerusahaanController;
use App\Http\Controllers\KelolaLowonganController;
use App\Http\Controllers\AdminLowonganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LamarController;
use App\Http\Controllers\LowonganController;
use Illuminate\Support\Facades\Auth;

// Rute yang dikelompokkan dengan middleware 'auth' hanya bisa diakses admin jika sudah login
Route::middleware(['auth'])->group(function () {
    // Mengelola data pelamar
    Route::resource('kelolapelamar',KelolaPelamarController::class);

    // Mengelola data perusahaan
    Route::resource('kelolaperusahaan',KelolaPerusahaanController::class);

    // Mengelola data lowongan pekerjaan
    Route::resource('kelolalowongan',AdminLowonganController::class);

    // Rute untuk Dashboard Admin
    Route::resource('DashboardAdmin', HomeController::class);
});

Route::resource('pelamar',PelamarController::class);
Route::resource('pengunjung',PengunjungController::class);
// Route::resource('perusahaan',PerusahaanController::class);
Route::resource('lamar',LamarController::class);

// Rute untuk logout
Route::get('logout', function() {
    Auth::logout();
    return redirect('login');
});
//login pelamar
Route::get('/loginPelamar', function () {
    return view('layouts.loginPelamar');
})->name('loginPelamar');

//login perusahaan
Route::get('/loginPerusahaan', function () {
    return view('layouts.loginPerusahaan');
})->name('loginPerusahaan');

Auth::routes();

// Rute untuk halaman home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
