<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Admin;
use App\Models\KelolaPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdminLowonganRequest;

class AdminLowonganController extends Controller
{
    // Menampilkan daftar lowongan
    public function index()
    {
        // Ambil data lowongan dengan pagination
        if (request()->filled('q')) {
            $data['kelolalowongan'] = Lowongan::search(request('q'))->paginate(10);
        } else {
            $data['kelolalowongan'] = Lowongan::latest()->paginate(10);
        }
        return view('admin.KelolaLowongan', $data);
    }

    // Menampilkan halaman untuk menambah lowongan
    public function create()
    {
        $currentUser = Auth::user(); // Mendapatkan user yang sedang login

        // Ambil satu admin yang sesuai dengan email atau nama
        $listAdmin = Admin::where('email', $currentUser->email)
            ->orWhere('admin_nama', $currentUser->name)
            ->first(); // Mengambil objek admin tunggal

        // Cek jika admin tidak ditemukan
        if (!$listAdmin) {
            session()->flash('error', 'Profil admin belum lengkap. Mohon lengkapi profil Anda untuk melanjutkan.');
            return back();
        }

        // Ambil list perusahaan
        $data['listAdmin'] = $listAdmin;
        $data['listPerusahaan'] = KelolaPerusahaan::orderBy('p_nama', 'asc')->get();

        return view('admin.KelolaLowonganCreated', $data);
    }




    // Menyimpan data lowongan ke database
    public function store(StoreAdminLowonganRequest $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'perusahaan_id' => 'required|exists:kelola_perusahaans,id',
            'nama_lowongan' => 'required|string|max:255',
            'status_lowongan' => 'required|string|max:50',
            'tanggal_buat' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'tanggal_verifikasi' => 'nullable|date',
            'pendidikan' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|string|max:255',
            'umur' => 'required|integer|min:18',
            'gambar_lowongan' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'detail' => 'required|string|max:255',
        ]);


        // Proses dan simpan data ke database
        $lowongan = new Lowongan();
        $lowongan->admin_id = $validatedData['admin_id'];
        $lowongan->perusahaan_id = $validatedData['perusahaan_id'];
        $lowongan->nama_lowongan = $validatedData['nama_lowongan'];
        $lowongan->status_lowongan = $validatedData['status_lowongan'];
        $lowongan->tanggal_buat = $validatedData['tanggal_buat'];
        $lowongan->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        $lowongan->tanggal_verifikasi = $validatedData['tanggal_verifikasi'];
        $lowongan->pendidikan = $validatedData['pendidikan'];
        $lowongan->pengalaman_kerja = $validatedData['pengalaman_kerja'];
        $lowongan->umur = $validatedData['umur'];
        $lowongan->detail = $validatedData['detail'];

        // Cek dan simpan gambar lowongan
        if ($request->hasFile('gambar_lowongan')) {
            // Hapus gambar lama jika ada
            if ($lowongan->gambar_lowongan) {
                Storage::delete($lowongan->gambar_lowongan);
            }
            // Simpan gambar baru di folder 'public/lowongan'
            $lowongan->gambar_lowongan = $request->file('gambar_lowongan')->store('lowongan', 'public');
        }



        $lowongan->save();

        return back()->with('success', 'Data Lowongan berhasil ditambahkan!');
    }
}
