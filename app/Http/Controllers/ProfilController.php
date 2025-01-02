<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\KelolaPerusahaan;
use App\Models\KelolaPelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    // Menampilkan Profil Berdasarkan Role
    public function showProfile()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login

        // Memeriksa role pengguna
        if ($user->role == 'admin') {
            // Jika role adalah admin, ambil data profil admin
            $profile = Admin::where('email', $user->email)->first();
            return view('profil.profiladmin', compact('user', 'profile'));
        } elseif ($user->role == 'perusahaan') {
            // Jika role adalah perusahaan, ambil data profil perusahaan
            $profile = KelolaPerusahaan::where('email_perusahaan', $user->email_perusahaan)->first();
            return view('profil.profilperusahaan', compact('user', 'profile'));
        } elseif ($user->role == 'pelamar') {
            // Jika role adalah pelamar, ambil data profil pelamar
            $profile = KelolaPelamar::where('email', $user->email)->first();
            return view('profil.profilpelamar', compact('user', 'profile'));
        } else {
            // Jika role tidak valid, redirect ke halaman home
            return redirect()->route('home')->with('error', 'Role tidak valid');
        }
    }


    // Mengupdate Profil Berdasarkan Role
    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login

        // Validasi data input
        $validatedData = $request->validate([
            'phone_number' => 'nullable|string|max:15', // Validasi untuk nomor telepon admin
        ]);

        // Cari profil admin berdasarkan email
        $profile = Admin::where('email', $user->email)->first(); // Ambil profil admin berdasarkan email

        if ($profile) {
            // Update data admin (hanya mengupdate admin_nohp)
            $profile->admin_nohp = $validatedData['phone_number'];

            // Isi login_history dengan nilai default
            $profile->login_history = now(); // Anda bisa mengganti ini sesuai kebutuhan
            $profile->save(); // Simpan perubahan ke tabel admins
        } else {
            // Jika profil admin tidak ditemukan, buat profil baru
            $profile = new Admin();
            $profile->email = $user->email; // Menggunakan email dari tabel users
            $profile->admin_nama = $user->name; // Menggunakan nama dari tabel users
            $profile->admin_nohp = $validatedData['phone_number'];

            // Isi login_history dengan nilai default
            $profile->login_history = now();
            $profile->logout_history = null; // Atau NULL
            $profile->save();  // Simpan data baru ke tabel admins
        }

        // Kembalikan ke tampilan profil admin dengan data terbaru
        return view('profil.profiladmin', compact('user', 'profile'));
    }
}
