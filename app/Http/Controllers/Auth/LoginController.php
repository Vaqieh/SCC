<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Formulir login untuk Admin
    public function showAdminLoginForm()
    {
        return view('auth.loginadmin');
    }

    // Formulir login untuk Pelamar
    public function showPelamarLoginForm()
    {
        return view('auth.login');
    }

    // Formulir login untuk Perusahaan
    public function showPerusahaanLoginForm()
    {
        return view('auth.loginperusahaan');
    }

    public function showLoginForm()
    {
        return view('auth.perloginan');
    }

    // Proses login untuk Admin
    public function loginAdmin(Request $request)
    {
        return $this->login($request, 'admin');
    }

    // Proses login untuk Pelamar
    public function loginPelamar(Request $request)
    {
        return $this->login($request, 'pelamar');
    }

    // Proses login untuk Perusahaan
    public function loginPerusahaan(Request $request)
    {
        return $this->login($request, 'perusahaan');
    }

    // Proses login umum
    protected function login(Request $request, $role)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Auth::user()->update([
        //     'login_history' => now(),
        // ]);
        // Proses login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Menyimpan role pada session atau melakukan apa pun yang diperlukan berdasarkan role
            session(['role' => $role]);

            // Redirect ke halaman sesuai role
            if ($role == 'admin') {
                return redirect()->route('admin.dashboard');  // Sesuaikan dengan route admin
            } elseif ($role == 'pelamar') {
                return redirect()->route('pelamar.index');  // Pastikan route ini ada
            } elseif ($role == 'perusahaan') {
                return redirect()->route('perusahaan.dashboard');  // Pastikan route ini ada
            }
        }
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        // Ambil role pengguna yang sedang login
        $role = Auth::user()->role;

        // Jika pengguna adalah admin, update logout_history
        if ($role == 'admin') {
            $user = Auth::user(); // Ambil data pengguna yang sedang login
            $profile = Admin::where('email', $user->email)->first(); // Cari profil admin berdasarkan email

            if ($profile) {
                // Update logout_history dengan waktu sekarang
                $profile->logout_history = now();
                $profile->save(); // Simpan perubahan ke tabel admins
            }
        }

        // Logout user
        Auth::logout();
        $request->session()->invalidate();  // Hapus session
        $request->session()->regenerateToken();  // Regenerasi token CSRF

        // Redirect berdasarkan role yang sudah login
        if ($role == 'admin') {
            return redirect()->route('login.admin');  // Redirect ke halaman login admin
        } elseif ($role == 'pelamar') {
            return redirect()->route('login.pelamar');  // Redirect ke halaman login pelamar
        } elseif ($role == 'perusahaan') {
            return redirect()->route('login.perusahaan');  // Redirect ke halaman login perusahaan
        }

        // Default, jika role tidak ditemukan
        return redirect()->route('pengunjung');  // Redirect ke pengunjung jika role tidak ditemukan
    }
}
