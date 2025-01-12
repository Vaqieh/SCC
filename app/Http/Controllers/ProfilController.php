<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\KelolaPerusahaan;
use App\Models\KelolaPelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;


class ProfilController extends Controller
{
    // Menampilkan Profil Berdasarkan Role
    // Fungsi untuk menampilkan profil admin
    public function showProfileAdmin()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        if ($user->role != 'admin') {
            return redirect()->route('login.admin')->with('error', 'Akses hanya untuk admin');
        }

        $profile = Admin::where('email', $user->email)->first();
        return view('profil.profiladmin', compact('user', 'profile'));
    }

    // Fungsi untuk menampilkan profil perusahaan
    public function showProfilePerusahaan()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        if ($user->role != 'perusahaan') {
            return redirect()->route('login.perusahaan')->with('error', 'Akses hanya untuk perusahaan');
        }

        $profile = KelolaPerusahaan::where('email_perusahaan', $user->email)->first();
        return view('profil.profilperusahaan', compact('user', 'profile'));
    }

    // Fungsi untuk menampilkan profil pelamar
    public function showProfilePelamar()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        if ($user->role != 'pelamar') {
            return redirect()->route('login.pelamar')->with('error', 'Akses hanya untuk pelamar');
        }

        $profile = KelolaPelamar::where('email', $user->email)->first();
        return view('profil.profilpelamar', compact('user', 'profile'));
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
            'sertifikat.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
    
                // Cek jika ada file sertifikat yang diupload
                if ($request->hasFile('sertifikat')) {
                    // Hapus sertifikat lama jika ada
                    if ($profile->sertifikat) {
                        $oldSertifikatPaths = json_decode($profile->sertifikat);
                        foreach ($oldSertifikatPaths as $oldSertifikat) {
                            if (Storage::exists('public/' . $oldSertifikat)) {
                                Storage::delete('public/' . $oldSertifikat);
                            }
                        }
                    }
    
                    // Proses setiap file sertifikat
                    $sertifikatPaths = [];
                    foreach ($request->file('sertifikat') as $file) {
                        $sertifikatPath = $file->storeAs(
                            'sertifikat', 
                            uniqid('sertifikat_', true) . '.' . $file->getClientOriginalExtension(), // Menyimpan dengan ekstensi asli
                            'public'
                        );
                        $sertifikatPaths[] = $sertifikatPath;
                    }
    
                    // Simpan array sertifikat dalam bentuk JSON
                    $profile->sertifikat = json_encode($sertifikatPaths);
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
                $profile->NamaPelamar = $user->name;
                $profile->email = $user->email;
                $profile->TanggalLahir = $validatedData['TanggalLahir'] ?? null;
                $profile->Alamat = $validatedData['Alamat'];
                $profile->JenisKelamin = $validatedData['JenisKelamin']; // Pastikan nilai default kosong
                $profile->Kompetensi = $validatedData['Kompetensi'] ?? null;
                $profile->instansi = $validatedData['instansi'] ?? null;
        
                // Cek jika ada file CV yang diupload
                if ($request->hasFile('cv')) {
                    $cvPath = $request->file('cv')->store('cv', 'public');
                    $profile->cv = $cvPath;
                }
        
                // Cek jika ada file sertifikat yang diupload
                if ($request->hasFile('sertifikat')) {
                    $sertifikatPaths = [];
                    foreach ($request->file('sertifikat') as $file) {
                        $sertifikatPath = $file->storeAs(
                            'sertifikat', 
                            uniqid('sertifikat_', true) . '.' . $file->getClientOriginalExtension(),
                            'public'
                        );
                        $sertifikatPaths[] = $sertifikatPath;
                    }
    
                    $profile->sertifikat = json_encode($sertifikatPaths);
                }
        
                // Cek jika ada foto profil yang diupload
                if ($request->hasFile('foto')) {
                    $fotoProfilPath = $request->file('foto')->store('foto_pelamar', 'public');
                    $profile->foto = $fotoProfilPath;
                }
        
                $profile->save(); // Simpan data baru ke tabel kelola_pelamar
            }
    
            return redirect()->route('pelamar.profile')->with('success', 'Profil pelamar berhasil diperbarui.');
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

            return redirect()->route('perusahaan.profile')->with('success', 'Profil perusahaan berhasil diperbarui.');
        }

        if ($user->role == 'admin') {
            try {
                // Cari profil admin berdasarkan email
                $profile = Admin::where('email', $user->email)->first();

                if ($profile) {
                    // Update data admin
                    $profile->admin_nohp = $validatedData['phone_number'] ?? $profile->admin_nohp;
                    $profile->login_history = now();
                    $profile->save();
                } else {
                    // Jika profil belum ada, buat profil baru
                    $profile = new Admin();
                    $profile->email = $user->email;
                    $profile->admin_nama = $user->name;
                    $profile->admin_nohp = $validatedData['phone_number'];
                    $profile->login_history = now();
                    $profile->logout_history = null;
                    $profile->save();
                }

                // Jika berhasil, beri pesan flash sukses
                return redirect()->route('admin.profile')->with('success', 'Profil admin berhasil diperbarui.');
            } catch (QueryException $e) {
                // Tangani error jika terjadi masalah saat menyimpan data
                return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui profil. Pastikan semua kolom wajib diisi dengan benar.');
            }
        }

        return redirect()->route('login')->with('error', 'Role tidak valid');
    }
}
