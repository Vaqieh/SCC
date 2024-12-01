<?php

use App\Http\Controllers\KelolaPelamarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LamarController;
// use App\Models\Lamar;

// Route::get('/pelamar', [PelamarController::class, 'index']);
// Route::get('/pengunjung', [PengunjungController::class, 'index']);
// Route::view('/tentang-kami', 'tentang-kami');


// Route::get('home', function(){
//     return view('layouts.admin');
// });



Route::resource('kelolapelamar',KelolaPelamarController::class);
Route::resource('pelamar',PelamarController::class);
Route::resource('pengunjung',PengunjungController::class);
Route::resource('perusahaan',PerusahaanController::class);
Route::resource('lamar',LamarController::class);
