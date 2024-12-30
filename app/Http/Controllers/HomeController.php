<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
{
    // Cek apakah pengguna sudah login
    if (Auth::guest()) {;
        return redirect()->route('login.admin');  // Sesuaikan dengan role
    }

    // Jika sudah login, cek apakah role sesuai
    if (Auth::user()->role !== 'admin') {
        return redirect()->route('login.admin');  // Redirect ke login jika bukan admin
    }

    // Hitung total akun berdasarkan role
    $totalPelamar = User::where('role', 'pelamar')->count(); // Sesuaikan dengan role yang ada di tabel users
    $totalPerusahaan = User::where('role', 'perusahaan')->count(); // Sesuaikan dengan role yang ada
    $totalEmail = User::where('role', 'email')->count();
    return view('admin.dashboardadmin', compact('totalPelamar', 'totalPerusahaan', 'totalEmail'));
    // Jika role adalah admin, arahkan ke dashboard admin

}

}
