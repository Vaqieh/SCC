<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\KelolaPerusahaan;
use App\Models\KelolaPelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            $profile = KelolaPerusahaan::where('email_perusahaan', $user->email)->first();
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

        // if (!$user->email_perusahaan) {
        //     return redirect()->back()->with('error', 'Email perusahaan tidak ditemukan. Silakan periksa profil Anda.');
        // }

        // Validasi data input
        $validatedData = $request->validate([
            'phone_number' => 'nullable|string|max:15',
            'jenis_industri' => 'nullable|string|max:255',
            'p_tahunBerdiri' => 'nullable|integer',
            'negara' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kota' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi untuk foto profil
        ]);

        // Memeriksa role pengguna dan memperbarui profil yang sesuai
        if ($user->role == 'perusahaan') {
            // Cari profil perusahaan berdasarkan email_perusahaan
            $profile = KelolaPerusahaan::where('email_perusahaan', $user->email)->first();

            if ($profile) {
                // Update data profil perusahaan
                $profile->jenis_industri = $validatedData['jenis_industri'] ?? $profile->jenis_industri;
                $profile->p_tahunBerdiri = $validatedData['p_tahunBerdiri'] ?? $profile->p_tahunBerdiri;
                $profile->negara = $validatedData['negara'] ?? $profile->negara;
                $profile->provinsi = $validatedData['provinsi'] ?? $profile->provinsi;
                $profile->kabupaten = $validatedData['kabupaten'] ?? $profile->kabupaten;
                $profile->kota = $validatedData['kota'] ?? $profile->kota;

                // Cek jika ada foto profil yang diupload
                if ($request->hasFile('foto')) {
                    // Hapus foto profil lama jika ada
                    if ($profile->foto && Storage::exists('public/' . $profile->foto)) {
                        Storage::delete('public/' . $profile->foto);
                    }

                    // Simpan foto profil yang baru
                    $fotoProfilPath = $request->file('foto')->store('foto', 'public');
                    $profile->foto = $fotoProfilPath;
                }

                $profile->save(); // Simpan perubahan ke tabel kelola_perusahaan
            } else {
                // Jika profil perusahaan tidak ditemukan, buat profil baru
                $profile = new KelolaPerusahaan();
                $profile->p_nama = $user->name;
                $profile->email_perusahaan = $user->email;
                $profile->jenis_industri = $validatedData['jenis_industri'];
                $profile->p_tahunBerdiri = $validatedData['p_tahunBerdiri'];
                $profile->negara = $validatedData['negara'];
                $profile->provinsi = $validatedData['provinsi'];
                $profile->kabupaten = $validatedData['kabupaten'];
                $profile->kota = $validatedData['kota'];

                // Cek jika ada foto profil yang diupload
                if ($request->hasFile('foto')) {
                    // Simpan foto profil
                    $fotoProfilPath = $request->file('foto')->store('foto_profil', 'public');
                    $profile->foto = $fotoProfilPath;
                }

                $profile->save(); // Simpan data baru ke tabel kelola_perusahaan
            }

            // Kembalikan ke tampilan profil perusahaan dengan data terbaru
            return view('profil.profilperusahaan', compact('user', 'profile'));
        }

        // Jika role bukan 'perusahaan', kita juga bisa menangani profil admin atau pelamar.
        if ($user->role == 'admin') {
            // Cari profil admin berdasarkan email
            $profile = Admin::where('email', $user->email)->first();
            if ($profile) {
                // Update data admin
                $profile->admin_nohp = $validatedData['phone_number'] ?? $profile->admin_nohp;
                $profile->login_history = now(); // Update login_history sesuai kebutuhan
                $profile->save();
            } else {
                // Jika profil admin tidak ditemukan, buat profil baru
                $profile = new Admin();
                $profile->email = $user->email;
                $profile->admin_nama = $user->name;
                $profile->admin_nohp = $validatedData['phone_number'];

                // Isi login_history dengan nilai default
                $profile->login_history = now();
                $profile->logout_history = null;
                $profile->save(); // Simpan data baru ke tabel admins
            }

            // Kembalikan ke tampilan profil admin dengan data terbaru
            return view('profil.profiladmin', compact('user', 'profile'));
        }

        // Jika role adalah pelamar
        if ($user->role == 'pelamar') {
            // Tangani profil pelamar jika diperlukan
            // ...
        }

        // Jika tidak ada role yang sesuai, kembalikan ke halaman home
        return redirect()->route('home')->with('error', 'Role tidak valid');
    }
}
