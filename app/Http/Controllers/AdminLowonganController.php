<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Admin;
use App\Models\KelolaPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLowonganController extends Controller
{
    // Menampilkan daftar lowongan
    public function index()
    {
        // Ambil data lowongan dengan pagination
        if (request()->filled('q')){
            $data['kelolalowongan'] = Lowongan::search(request('q'))->paginate(10);
        } else {
            $data['kelolalowongan'] = Lowongan::latest()->paginate(10);
        }
        return view('admin.KelolaLowongan', $data);
    }

    // Menampilkan halaman untuk menambah lowongan
    public function create()
    {
        // Ambil list admin dan perusahaan
        $data['listAdmin'] = Admin::orderBy('admin_nama', 'asc')->get();
        $data['listPerusahaan'] = KelolaPerusahaan::orderBy('p_nama', 'asc')->get();
        
        // Debugging data listPerusahaan untuk memastikan data sudah ada
        // dd($data['listPerusahaan']);
        
        return view('admin.KelolaLowonganCreated', $data);
    }

    // Menyimpan data lowongan ke database
    public function store(Request $request)
    {
        $requestData = $request->validate([
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
        $lowongan->fill($requestData);
        
        // Cek dan simpan gambar lowongan
        if ($request->hasFile('gambar_lowongan')) {
            Storage::delete($lowongan->gambar_lowongan);  // Hapus gambar sebelumnya
            $lowongan->gambar_lowongan = $request->file('gambar_lowongan')->store('public');
            dd($lowongan->gambar_lowongan);  // Cek apakah path gambar sudah benar
        }
        
        try {
            $lowongan->save();
        } catch (\Exception $e) {
            dd($e->getMessage());  // Menampilkan pesan error jika ada masalah saat save
        }
        
        return redirect('/kelolalowongan');
    }
}
