<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Menampilkan formulir registrasi untuk admin
    public function showAdminRegistrationForm()
    {
        return view('auth.registeradmin');
    }

    // Menampilkan formulir registrasi untuk pelamar
    public function showPelamarRegistrationForm()
    {
        return view('auth.register');
    }

    // Menampilkan formulir registrasi untuk perusahaan
    public function showPerusahaanRegistrationForm()
    {
        return view('auth.registerperusahaan');
    }

    public function showRegistrationForm()
    {
        return view('auth.perregistrasian');
    }

    // Menangani proses registrasi untuk admin
    public function registerAdmin(Request $request)
    {
        return $this->register($request, 'admin');
    }

    // Menangani proses registrasi untuk pelamar
    public function registerPelamar(Request $request)
    {
        return $this->register($request, 'pelamar');
    }

    // Menangani proses registrasi untuk perusahaan
    public function registerPerusahaan(Request $request)
    {
        return $this->register($request, 'perusahaan');
    }

    protected function register(Request $request, $role)
    {
        // Validasi input dari formulir
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menyimpan pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => $request->role,  // Menyimpan role
        ]);

        // Mengarahkan pengguna ke halaman yang sesuai setelah registrasi
        event(new Registered($user)); // Memicu event yang mungkin diperlukan untuk proses lainnya (misalnya verifikasi email)

        // Login otomatis setelah registrasi
        auth::login($user);  // Pastikan ini menggunakan auth() untuk login otomatis

        if ($role == 'admin') {
            return redirect()->route('admin.dashboard');  // Sesuaikan dengan route admin
        } elseif ($role == 'pelamar') {
            return redirect()->route('pelamar.index');  // Pastikan route ini ada
        } elseif ($role == 'perusahaan') {
            return redirect()->route('perusahaan.dashboard');  // Pastikan route ini ada
        }
    }
}

