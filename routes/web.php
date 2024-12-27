<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelolaPelamarController;
use App\Http\Controllers\KelolaPerusahaanController;
use App\Http\Controllers\KelolaLowonganController;
use App\Http\Controllers\ProfileController; // Tambahkan import controller
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LamarController;
use Illuminate\Support\Facades\Auth;

// Rute yang dikelompokkan dengan middleware 'auth' hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {
    // Mengelola data pelamar
    Route::resource('kelolapelamar',KelolaPelamarController::class);
    
    // Mengelola data perusahaan
    Route::resource('kelolaperusahaan',KelolaPerusahaanController::class);
    
    // Mengelola data lowongan pekerjaan
    Route::resource('kelolalowongan',KelolaLowonganController::class);
    
    // Rute untuk Dashboard Admin
    Route::resource('DashboardAdmin', HomeController::class);
    Route::resource('DashboardAdmin',HomeController::class);
});

// Rute untuk mengelola pelamar (semua pengguna bisa mengaksesnya)
Route::resource('pelamar', PelamarController::class);

// Rute untuk mengelola pengunjung
Route::resource('pengunjung', PengunjungController::class);

// Rute untuk mengelola data perusahaan
Route::resource('perusahaan', PerusahaanController::class);

// Rute untuk mengelola lamaran pekerjaan
Route::resource('lamar', LamarController::class);

// Rute untuk logout
Route::get('logout', function() {
    Auth::logout();
    return redirect('login');
});
//login pelamar
Route::get('/loginPelamar.blade.php', function () {
    return view('layouts.loginPelamar');
})->name('loginPelamar');

//login perusahaan
Route::get('/loginPerusahaan.blade.php', function () {
    return view('layouts.loginPerusahaan');
})->name('loginPerusahaan');
Auth::routes();

// Rute untuk halaman home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
