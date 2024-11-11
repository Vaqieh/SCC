<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelamarController;

Route::get('/pelamar', [PelamarController::class, 'index']);

