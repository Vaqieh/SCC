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

        // Memeriksa role pengguna dan menampilkan profil sesuai role
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

        // Validasi data input
        $validatedData = $request->validate([
            'NamaPelamar' => 'required_if:role,pelamar|string|max:255',
            'email' => 'required_if:role,pelamar|email|max:255',
            'TanggalLahir' => 'required_if:role,pelamar|date',
            'Alamat' => 'nullable|string|max:255',
            'JenisKelamin' => 'nullable|in:laki-laki,perempuan',
            'Kompetensi' => 'nullable|string|max:255',
            'sertifikat' => 'nullable|string|max:255',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'instansi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone_number' => 'nullable|string|max:15',
            'jenis_industri' => 'nullable|string|max:255',
            'p_tahunBerdiri' => 'nullable|integer',
            'negara' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kota' => 'nullable|string|max:255',
        ]);

        // Memeriksa role pengguna dan memperbarui profil yang sesuai
        if ($user->role == 'pelamar') {
            // Cari profil pelamar berdasarkan email
            $profile = KelolaPelamar::where('email', $user->email)->first();

            if ($profile) {
                // Update data profil pelamar
                $profile->NamaPelamar = $validatedData['NamaPelamar'] ?? $profile->NamaPelamar;
                $profile->email = $validatedData['email'] ?? $profile->email;
                $profile->TanggalLahir = $validatedData['TanggalLahir'] ?? $profile->TanggalLahir;
                $profile->Alamat = $validatedData['Alamat'] ?? $profile->Alamat;
                $profile->JenisKelamin = $validatedData['JenisKelamin'] ?? $profile->JenisKelamin;
                $profile->Kompetensi = $validatedData['Kompetensi'] ?? $profile->Kompetensi;
                $profile->sertifikat = $validatedData['sertifikat'] ?? $profile->sertifikat;
                $profile->instansi = $validatedData['instansi'] ?? $profile->instansi;

                // Cek jika ada file CV yang diupload
                if ($request->hasFile('cv')) {
                    // Hapus CV lama jika ada
                    if ($profile->cv && Storage::exists('public/' . $profile->cv)) {
                        Storage::delete('public/' . $profile->cv);
                    }

                    // Simpan file CV yang baru
                    $cvPath = $request->file('cv')->store('cv', 'public');
                    $profile->cv = $cvPath;
                }

                // Cek jika ada foto profil yang diupload
                if ($request->hasFile('foto')) {
                    // Hapus foto profil lama jika ada
                    if ($profile->foto && Storage::exists('public/' . $profile->foto)) {
                        Storage::delete('public/' . $profile->foto);
                    }

                    // Simpan foto profil yang baru
                    $fotoProfilPath = $request->file('foto')->store('foto_pelamar', 'public');
                    $profile->foto = $fotoProfilPath;
                }

                $profile->save(); // Simpan perubahan ke tabel kelola_pelamar
            } else {
                // Jika profil pelamar tidak ditemukan, buat profil baru
                $profile = new KelolaPelamar();
                $profile->NamaPelamar = $validatedData['NamaPelamar'];
                $profile->email = $user->email;
                $profile->TanggalLahir = $validatedData['TanggalLahir'];
                $profile->Alamat = $validatedData['Alamat'];
                $profile->JenisKelamin = $validatedData['JenisKelamin'];
                $profile->Kompetensi = $validatedData['Kompetensi'];
                $profile->sertifikat = $validatedData['sertifikat'];
                $profile->instansi = $validatedData['instansi'];

                // Cek jika ada file CV yang diupload
                if ($request->hasFile('cv')) {
                    $cvPath = $request->file('cv')->store('cv', 'public');
                    $profile->cv = $cvPath;
                }

                // Cek jika ada foto profil yang diupload
                if ($request->hasFile('foto')) {
                    $fotoProfilPath = $request->file('foto')->store('foto_pelamar', 'public');
                    $profile->foto = $fotoProfilPath;
                }

                $profile->save(); // Simpan data baru ke tabel kelola_pelamar
            }

            return view('profil.profilpelamar', compact('user', 'profile'));
        }

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
                    $fotoProfilPath = $request->file('foto')->store('foto_perusahaan', 'public');
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
                    $fotoProfilPath = $request->file('foto')->store('foto_perusahaan', 'public');
                    $profile->foto = $fotoProfilPath;
                }

                $profile->save(); // Simpan data baru ke tabel kelola_perusahaan
            }

            return view('profil.profilperusahaan', compact('user', 'profile'));
        }

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

            return view('profil.profiladmin', compact('user', 'profile'));
        }

        // Jika tidak ada role yang sesuai, kembalikan ke halaman login
        return redirect()->route('login')->with('error', 'Role tidak valid');
    }
}
