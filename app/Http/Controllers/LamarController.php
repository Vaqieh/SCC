<?php

namespace App\Http\Controllers;

use App\Models\Lamar;
use App\Models\Lowongan;
use App\Models\KelolaPelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $lowongans = Lowongan::all();

        // // Kirim data lowongan ke view
        // return view('pelamar.LamarRiwayat', compact('lowongans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = Auth::user();
        // Ambil lowongan berdasarkan ID
        $lowongan = Lowongan::find($id);

        // Jika lowongan tidak ditemukan, arahkan ke halaman lowongan dengan pesan error
        if (!$lowongan) {
            return redirect()->route('lowongan.index')->with('error', 'Lowongan tidak ditemukan');
        }

        // Ambil profil pelamar berdasarkan email
        $profile = KelolaPelamar::where('email', $user->email)->first();

        // Jika profil pelamar tidak ditemukan, arahkan ke halaman profil dengan pesan error
        if (!$profile) {
            return redirect()->route('pelamar.profile')->with('error', 'Profil pelamar tidak ditemukan');
        }

        // Kirim data lowongan dan profil pelamar ke form create
        return view('pelamar.LamarCreate', compact('lowongan', 'profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = Auth::user(); // Ambil data pengguna yang sedang login

    // Validasi data input dari form lamaran
    $validatedData = $request->validate([
        'lowongan_id' => 'required|exists:lowongans,id', // Validasi lowongan yang dipilih
        'TanggalLahir' => 'required|date',
        'Alamat' => 'nullable|string|max:255',
        'JenisKelamin' => 'nullable|in:laki-laki,perempuan',
        'status' => 'nullable|string|max:50',
        'instansi' => 'nullable|string|max:50',
        'Kompetensi' => 'nullable|string|max:255',
        'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'sertifikat.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Ambil profil pelamar berdasarkan email yang sedang login
    $profile = KelolaPelamar::where('email', $user->email)->first();

    if ($profile) {
        // Cek apakah pelamar sudah melamar lowongan ini sebelumnya
        $existingLamaran = Lamar::where('pelamar_id', $profile->id)
            ->where('lowongan_id', $validatedData['lowongan_id'])
            ->first();

        if ($existingLamaran) {
            return back()->with('error', 'Anda sudah melamar lowongan ini sebelumnya.');
        }

        // Membuat lamaran baru
        $lamaran = new Lamar();
        $lamaran->lowongan_id = $validatedData['lowongan_id'];
        $lamaran->pelamar_id = $profile->id;  // Menyimpan ID dari pelamar yang sesuai
        $lamaran->email = $profile->email;
        $lamaran->status = $validatedData['status'] ?? 'menunggu';
        $lamaran->TanggalLahir = $validatedData['TanggalLahir'];
        $lamaran->Alamat = $validatedData['Alamat'] ?? $profile->Alamat;
        $lamaran->JenisKelamin = $validatedData['JenisKelamin'] ?? $profile->JenisKelamin;
        $lamaran->Kompetensi = $validatedData['Kompetensi'] ?? $profile->Kompetensi;
        $lamaran->instansi = $validatedData['instansi'] ?? $profile->instansi;

        // Menyimpan CV jika di-upload
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
            $lamaran->cv = $cvPath;
        } else {
            $lamaran->cv = $profile->cv ?? null; // Jika tidak ada file, ambil dari profil
        }

        // Menyimpan Sertifikat jika di-upload
        if ($request->hasFile('sertifikat')) {
            $sertifikatPaths = [];
            foreach ($request->file('sertifikat') as $sertifikat) {
                $sertifikatPaths[] = $sertifikat->store('sertifikat', 'public');
            }
            $lamaran->sertifikat = json_encode($sertifikatPaths); // Menyimpan array sebagai JSON
        } else {
            $lamaran->sertifikat = $profile->sertifikat ?? null; // Ambil dari profil jika tidak di-upload
        }

        // Menyimpan Foto Profil jika di-upload
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto', 'public');
            $lamaran->foto = $fotoPath;
        } else {
            $lamaran->foto = $profile->foto ?? null; // Ambil foto profil dari profil jika tidak ada file baru
        }

        // Simpan data lamaran ke database
        $lamaran->save();

        return redirect()->route('lamar.show')->with('success', 'Lamaran berhasil dikirim!');
    } else {
        return redirect()->route('pelamar.profile')->with('error', 'Profil pelamar tidak ditemukan.');
    }
}





    /**
     * Display the specified resource.
     */
    // Controller LamarController.php

    public function show()
    {
        // Ambil data pelamar berdasarkan email pengguna yang sedang login
        $pelamar = KelolaPelamar::where('email', Auth::user()->email)->first();

        if ($pelamar) {
            // Ambil semua lamaran yang terkait dengan pelamar yang sedang login
            $lamaran = Lamar::where('pelamar_id', $pelamar->id)
                ->with('lowongan') // Mengambil relasi lowongan
                ->get();

            // Debugging: Cek hasil query lamaran
            if ($lamaran->isEmpty()) {
                return view('pelamar.LamarRiwayat', ['message' => 'Belum ada riwayat lamaran.']);
            }

            // Kirim data $lamaran ke view
            return view('pelamar.LamarRiwayat', compact('lamaran'));
        }

        return redirect()->route('pelamar.profile')->with('error', 'Pelamar tidak ditemukan.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lamar $lamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lamar $lamar)
    {
        //
    }
}
