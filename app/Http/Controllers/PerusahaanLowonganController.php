<?php

namespace App\Http\Controllers;

use App\Models\KelolaPerusahaan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePerusahaanLowonganRequest;

class PerusahaanLowonganController extends Controller
{
    public function index()
    {
        // Ambil data lowongan dengan pagination
        if (request()->filled('q')) {
            $data['kelolalowonganperusahaan'] = Lowongan::search(request('q'))->paginate(10);
        } else {
            $data['kelolalowonganperusahaan'] = Lowongan::latest()->paginate(10);
        }
        return view('perusahaan.PerusahaanLowonganIndex', $data);
    }

    // Menampilkan halaman untuk menambah lowongan
    public function create()
    {
        $currentUser = Auth::user(); // Mendapatkan user yang sedang login

        // Ambil data perusahaan yang terkait dengan user
        $listPerusahaan = KelolaPerusahaan::where('email_perusahaan', $currentUser->email)
            ->orWhere('p_nama', $currentUser->name)
            ->first(); // Mengambil objek perusahaan terkait

        // Jika perusahaan tidak ditemukan, tampilkan pesan error
        if (!$listPerusahaan) {
            session()->flash('error', 'Profil perusahaan belum lengkap. Mohon lengkapi profil Anda untuk melanjutkan.');
            return back();
        }

        // Mengirim data perusahaan yang ditemukan ke view
        $data['listPerusahaan'] = $listPerusahaan;

        return view('perusahaan.PerusahaanLowonganCreate', $data);
    }


    // Menyimpan data lowongan ke database
    public function store(StorePerusahaanLowonganRequest $request)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'admin_id' => 'nullable|exists:admins,id',
            'perusahaan_id' => 'required|exists:kelola_perusahaans,id',  // Validasi perusahaan_id
            'nama_lowongan' => 'required|string|max:255',
            'status_lowongan' => 'nullable|string|max:50',
            'tanggal_buat' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'tanggal_verifikasi' => 'nullable|date',
            'pendidikan' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|string|max:255',
            'umur' => 'required|integer|min:18',
            'gambar_lowongan' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'file' => 'required|file|mimes:pdf,doc,docx,rar,zip|max:10000',
            'detail' => 'required|string|max:255',
        ]);

        // Simpan lowongan baru
        $lowongan = new Lowongan();
        $lowongan->admin_id = $validatedData['admin_id'];
        $lowongan->perusahaan_id = $validatedData['perusahaan_id'];  // Menyimpan perusahaan_id
        $lowongan->nama_lowongan = $validatedData['nama_lowongan'];
        $lowongan->status_lowongan = $validatedData['status_lowongan'];
        $lowongan->tanggal_buat = $validatedData['tanggal_buat'];
        $lowongan->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        $lowongan->tanggal_verifikasi = $validatedData['tanggal_verifikasi'] ?: null;
        $lowongan->pendidikan = $validatedData['pendidikan'];
        $lowongan->pengalaman_kerja = $validatedData['pengalaman_kerja'];
        $lowongan->umur = $validatedData['umur'];
        $lowongan->file = $validatedData['file'];
        $lowongan->detail = $validatedData['detail'];

        // Cek dan simpan gambar lowongan
        if ($request->hasFile('gambar_lowongan')) {
            // Hapus gambar lama jika ada
            if ($lowongan->gambar_lowongan && Storage::exists($lowongan->gambar_lowongan)) {
                Storage::delete($lowongan->gambar_lowongan);
            }
            // Simpan gambar baru di folder 'public/lowongan'
            $lowongan->gambar_lowongan = $request->file('gambar_lowongan')->store('lowongan', 'public');
        }

        // Cek dan simpan file jika ada
        if ($request->hasFile('file')) {
            // Simpan file di folder 'public/files'
            $lowongan->file = $request->file('file')->store('files', 'public');
        }

        $lowongan->save();

        return back()->with('success', 'Data Lowongan berhasil ditambahkan!');
    }
}
