<?php

namespace App\Http\Controllers;

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
        // Mengambil data lamaran dengan paginasi
        $lamar = Lamar::paginate(10); // Ganti 10 dengan jumlah data per halaman sesuai kebutuhan
        return view('perusahaan.PerusahaanKelolaLamar', compact('lamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat lamaran baru
        return view('lamar.create'); // Sesuaikan dengan view form untuk membuat lamaran
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
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx|max:10000', // Sertifikat (jika ada)
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
            // Simpan file sertifikat di folder 'public/sertifikat'
            $lamaran->sertifikat = $request->file('sertifikat')->store('sertifikat', 'public');
        }

        // Menyimpan data lamaran ke database
        $lamaran->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('lamar.index')->with('success', 'Lamaran berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail lamaran
        $lamaran = Lamar::findOrFail($id);  // Pastikan ID lamaran ditemukan
        return view('lamar.show', compact('lamaran'));  // Pastikan Anda punya view lamaran.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit lamaran
        $lamaran = Lamar::findOrFail($id);  // Menemukan lamaran berdasarkan ID
        return view('perusahaanPerusahaanKelolaLamarEdit', compact('lamaran'));  // Pastikan Anda punya view lamaran.edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'lowongan_id' => 'required|exists:lowongans,id',  // Validasi untuk lowongan_id
            'instansi' => 'required|string|max:255',           // Instansi wajib diisi
            'TanggalLahir' => 'required|date',                 // Tanggal lahir wajib diisi
            'Alamat' => 'required|string|max:255',             // Alamat wajib diisi
            'JenisKelamin' => 'required|in:laki-laki,perempuan',  // Pilih jenis kelamin
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:10000',   // Validasi untuk CV (jika ada)
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx|max:10000', // Sertifikat (jika ada)
        ]);

        // Mencari lamaran yang akan diperbarui
        $lamaran = Lamar::findOrFail($id);  // Menemukan lamaran berdasarkan ID

        // Update data lamaran
        $lamaran->lowongan_id = $validatedData['lowongan_id'];
        $lamaran->TanggalLahir = $validatedData['TanggalLahir'];
        $lamaran->Alamat = $validatedData['Alamat'];
        $lamaran->JenisKelamin = $validatedData['JenisKelamin'];
        $lamaran->Kompetensi = $request->Kompetensi;
        $lamaran->instansi = $validatedData['instansi'];

        // Cek dan simpan CV jika ada
        if ($request->hasFile('cv')) {
            // Hapus file lama jika ada
            if ($lamaran->cv && Storage::exists($lamaran->cv)) {
                Storage::delete($lamaran->cv);
            }
            // Simpan file CV baru
            $lamaran->cv = $request->file('cv')->store('cv', 'public');
        }

        // Cek dan simpan sertifikat jika ada
        if ($request->hasFile('sertifikat')) {
            // Hapus file lama jika ada
            if ($lamaran->sertifikat && Storage::exists($lamaran->sertifikat)) {
                Storage::delete($lamaran->sertifikat);
            }
            // Simpan file sertifikat baru
            $lamaran->sertifikat = $request->file('sertifikat')->store('sertifikat', 'public');
        }

        // Menyimpan data lamaran ke database
        $lamaran->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('lamar.index')->with('success', 'Lamaran berhasil diperbarui!');
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
}
