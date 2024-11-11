<?php

use Illuminate\Support\Facades\Route;

Route::get('/pelamar', function () {
    return view('PelamarIndex');
});
