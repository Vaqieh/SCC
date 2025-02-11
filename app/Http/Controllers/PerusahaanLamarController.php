<?php

namespace App\Http\Controllers;

use App\Models\KelolaPerusahaan;  // Pastikan model KelolaPerusahaan sudah ada
use App\Models\Lowongan;  // Pastikan model KelolaPerusahaan sudah ada
use App\Models\Lamar;  // Pastikan model Lamaran sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan import ini
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan ID pengguna yang sedang login

class PerusahaanLamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login.perusahaan');  // Sesuaikan dengan role
        }

        // Jika sudah login, cek apakah role sesuai
        if (Auth::user()->role !== 'perusahaan') {
            return redirect()->route('login.perusahaan');  // Redirect ke login jika bukan perusahaan
        }

        // Ambil data perusahaan yang sedang login
        $currentUser = Auth::user();
        $perusahaan = KelolaPerusahaan::where('email_perusahaan', $currentUser->email)
            ->orWhere('p_nama', $currentUser->name)
            ->first(); // Ambil perusahaan berdasarkan email atau nama

        // Jika perusahaan tidak ditemukan, tampilkan pesan error
        if (!$perusahaan) {
            session()->flash('error', 'Profil perusahaan belum lengkap. Mohon lengkapi profil Anda untuk melanjutkan.');
            return back();
        }

        // Ambil data lowongan yang terkait dengan perusahaan ini, beserta jumlah pelamar
        $lowongans = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->withCount('lamars')  // Menghitung jumlah pelamar untuk setiap lowongan
            ->paginate(10);

        // Menampilkan data lowongan beserta jumlah pelamar
        return view('perusahaan.PerusahaanKelolaLamar', compact('lowongans'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // // Menampilkan form untuk membuat lamaran baru
        // return view('lamar.create'); // Sesuaikan dengan view form untuk membuat lamaran
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'lowongan_id' => 'required|exists:lowongans,id',  // Validasi untuk lowongan_id
            'instansi' => 'required|string|max:255',           // Instansi wajib diisi
            'TanggalLahir' => 'required|date',                 // Tanggal lahir wajib diisi
            'Alamat' => 'required|string|max:255',             // Alamat wajib diisi
            'JenisKelamin' => 'required|in:laki-laki,perempuan',  // Pilih jenis kelamin
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:10000',   // Validasi untuk CV (jika ada)
            'sertifikat.*' => 'nullable|file|mimes:pdf,doc,docx|max:10000', // Sertifikat (jika ada)
        ]);

        // Menyimpan data lamaran pekerjaan
        $lamaran = new Lamar();
        $lamaran->pelamar_id = Auth::id();  // Gunakan ID pelamar dari pengguna yang sedang login
        $lamaran->lowongan_id = $validatedData['lowongan_id'];
        $lamaran->TanggalLahir = $validatedData['TanggalLahir'];
        $lamaran->Alamat = $validatedData['Alamat'];
        $lamaran->JenisKelamin = $validatedData['JenisKelamin'];
        $lamaran->Kompetensi = $request->Kompetensi;  // Kompetensi opsional
        $lamaran->instansi = $validatedData['instansi'];
        $lamaran->status = 'Menunggu';  // Status awal

        // Cek dan simpan CV jika ada
        if ($request->hasFile('cv')) {
            // Simpan file CV di folder 'public/cv'
            $lamaran->cv = $request->file('cv')->store('cv', 'public');
        }

        // Cek dan simpan sertifikat jika ada
        if ($request->hasFile('sertifikat')) {
            $sertifikatFiles = [];
            foreach ($request->file('sertifikat') as $file) {
                // Simpan file ke dalam folder 'public/sertifikat'
                $sertifikatFiles[] = $file->store('sertifikat', 'public');
            }
            // Simpan path sertifikat dalam bentuk array di database
            $lamaran->sertifikat = json_encode($sertifikatFiles);  // Simpan sebagai JSON string
        }

        // Menyimpan data lamaran ke database
        $lamaran->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('kelolalamarperusahaan.index')->with('success', 'Lamaran berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($lowongan_id)
    {
        if (Auth::guest()) {
            return redirect()->route('login.perusahaan');  // Sesuaikan dengan role
        }

        // Jika sudah login, cek apakah role sesuai
        if (Auth::user()->role !== 'perusahaan') {
            return redirect()->route('login.perusahaan');  // Redirect ke login jika bukan perusahaan
        }
        //coba hapus atas ini kalau error
        $lowongan = Lowongan::findOrFail($lowongan_id);
        $lamarans = $lowongan->lamars; // Ambil semua lamaran yang terkait dengan lowongan ini

        return view('perusahaan.PerusahaanKelolaLamarPrint', compact('lowongan', 'lamarans'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Menampilkan form untuk mengedit lamaran
        $lamaran = Lamar::findOrFail($id);  // Menemukan lamaran berdasarkan ID
        return view('perusahaan.PerusahaanKelolaLamarEdit', compact('lamaran'));  // Pastikan Anda punya view lamaran.edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi status jika diperlukan
        $validated = $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak', // Contoh validasi status
        ]);

        // Mencari lamaran berdasarkan ID
        $lamaran = Lamar::findOrFail($id);

        // Memperbarui status lamaran
        $lamaran->status = $validated['status'];  // Gunakan hasil validasi untuk memperbarui status
        $lamaran->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('kelolalamarperusahaan.index')->with('success', 'Status lamaran berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari lamaran berdasarkan ID
        $lamaran = Lamar::findOrFail($id);

        // Hapus file CV dan Sertifikat jika ada
        if ($lamaran->cv && Storage::exists($lamaran->cv)) {
            Storage::delete($lamaran->cv);
        }
        if ($lamaran->sertifikat && Storage::exists($lamaran->sertifikat)) {
            Storage::delete($lamaran->sertifikat);
        }

        // Hapus data lamaran
        $lamaran->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('lamar.index')->with('success', 'Lamaran berhasil dihapus!');
    }

    public function pelamarLowongan($lowongan_id)
    {
        // Ambil lowongan berdasarkan ID
        $lowongan = Lowongan::findOrFail($lowongan_id);

        // Ambil semua pelamar yang melamar untuk lowongan ini beserta statusnya
        $pelamars = Lamar::where('lowongan_id', $lowongan->id)
            ->with('pelamar')  // Hubungkan dengan model pelamar
            ->get();

        // Tampilkan halaman dengan data pelamar
        return view('perusahaan.PerusahaanLamarPelamarLowongan', compact('lowongan', 'pelamars'));
    }
}
