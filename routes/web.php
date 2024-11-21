<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PengunjungController;

Route::get('/pelamar', [PelamarController::class, 'index']);
Route::get('/pengunjung', [PengunjungController::class, 'index']);
Route::view('/tentang-kami', 'tentang-kami');
