<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelolaPelamarController;
use App\Http\Controllers\KelolaPerusahaanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LamarController;
use Illuminate\Support\Facades\Auth;

// use App\Models\Lamar;

// Route::get('/pelamar', [PelamarController::class, 'index']);
// Route::get('/pengunjung', [PengunjungController::class, 'index']);
// Route::view('/tentang-kami', 'tentang-kami');


// Route::get('home', function(){
//     return view('layouts.admin');
// });


Route::middleware(['auth'])->group(function () {
    Route::resource('kelolapelamar',KelolaPelamarController::class);
    Route::resource('kelolaperusahaan',KelolaPerusahaanController::class);
    Route::resource('DashboardAdmin',HomeController::class);
});

Route::resource('pelamar',PelamarController::class);
Route::resource('pengunjung',PengunjungController::class);
Route::resource('perusahaan',PerusahaanController::class);
Route::resource('lamar',LamarController::class);


Route::get('logout', function() {
    Auth::logout();
    return redirect('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
