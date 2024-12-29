<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\KelolaPerusahaan;
use Illuminate\Http\Request;

class AdminLowonganController extends Controller
{
    // Menampilkan daftar lowongan
    public function index()
    {
        // Ambil data lowongan dengan pagination
        $data['kelolalowongan'] = Lowongan::with('perusahaan')->latest()->paginate(10);  // Tambahkan eager loading untuk perusahaan
        return view('admin.KelolaLowongan', $data);
    }

    // Menampilkan halaman untuk menambah lowongan
    public function create()
    {
        // Ambil list perusahaan
        $data['listPerusahaan'] = KelolaPerusahaan::orderBy('p_nama', 'asc')->get();
        return view('admin.KelolaLowonganCreated', $data);
    }

    // Menyimpan data lowongan ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'pegawai_id' => 'required|exists:users,id',
            'perusahaan_id' => 'required|exists:kelola_perusahaans,id',  // Pastikan referensi ke tabel kelola_perusahaans
            'nama_lowongan' => 'required|string|max:255',
            'status_lowongan' => 'required|string|max:50',
            'tanggal_buat' => 'required|date',
            'tanggal_berakhir' => 'required|date|after:tanggal_buat',
            'tanggal_verifikasi' => 'nullable|date|after_or_equal:tanggal_buat',
            'pendidikan' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|string|max:255',
            'umur' => 'required|integer|min:18',
            'gambar_lowongan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail' => 'required|string|max:255',
        ]);

        // Menyimpan data lowongan ke database
        $lowongan = Lowongan::create([
            'pegawai_id' => $request->admin_id,
            'perusahaan_id' => $request->perusahaan_id,  // Pastikan perusahaan_id sesuai dengan tabel kelola_perusahaans
            'nama_lowongan' => $request->nama_lowongan,
            'status_lowongan' => $request->status_lowongan,
            'tanggal_buat' => $request->tanggal_buat,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'tanggal_verifikasi' => $request->tanggal_verifikasi ?? null,
            'pendidikan' => $request->pendidikan,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'umur' => $request->umur,
            'gambar_lowongan' => $this->handleImageUpload($request),
            'detail' => $request->detail,
        ]);

        // Redirect setelah berhasil menambah lowongan
        return redirect()->route('/kelolalowongan')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    // Menangani upload gambar
    protected function handleImageUpload(Request $request)
    {
        if ($request->hasFile('gambar_lowongan')) {
            return $request->file('gambar_lowongan')->store('gambar_lowongan', 'public');
        }
        return null; // Jika tidak ada gambar, kembalikan null
    }
}
