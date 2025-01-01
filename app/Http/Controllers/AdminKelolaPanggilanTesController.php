<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\KelolaPerusahaan;
use App\Models\Lowongan;
use App\Models\PanggilanTes;
use Illuminate\Http\Request;

class AdminKelolaPanggilanTesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data Panggilan Tes dengan pagination
        if (request()->filled('q')) {
            $data['kelolapanggilantes'] = PanggilanTes::search(request('q'))->paginate(10);
        } else {
            $data['kelolapanggilantes'] = PanggilanTes::latest()->paginate(10);
        }
        return view('admin.KelolaPanggilanTes', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil list admin dan perusahaan
        $data['listAdmin'] = Admin::orderBy('admin_nama', 'asc')->get();
        $data['listPerusahaan'] = KelolaPerusahaan::orderBy('p_nama', 'asc')->get();
        $data['listLowongan'] = Lowongan::orderBy('nama_lowongan', 'asc')->get();

        // Debugging data listPerusahaan untuk memastikan data sudah ada
        // dd($data['listPerusahaan']);

        return view('admin.KelolaPanggilanCreated', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'lowongan_id' => 'required|exists:lowongans,id',
            'perusahaan_id' => 'required|exists:kelola_perusahaans,id',
            'admin_id' => 'required|exists:admins,id',
            'nama' => 'required|string|max:255',
            'tanggal_pt' => 'required|date',
            'status' => 'required|in:dibuka,ditutup', // Pastikan status valid
        ]);
        // Proses dan simpan data ke database
        $panggilantes = new PanggilanTes();
        $panggilantes->fill($requestData);
        $panggilantes->save();
        session()->flash('success', 'Data Panggilan Tes berhasil ditambahkan');
        return redirect('/kelolapanggilantes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // app/Http/Controllers/AdminKelolaPanggilanTesController.php

    public function edit(string $id)
    {
        // Ambil data berdasarkan ID
        $data['panggilanTes'] = PanggilanTes::findOrFail($id);
        $data['listAdmin'] = Admin::orderBy('admin_nama', 'asc')->get();
        $data['listPerusahaan'] = KelolaPerusahaan::orderBy('p_nama', 'asc')->get();
        $data['listLowongan'] = Lowongan::orderBy('nama_lowongan', 'asc')->get();

        return view('admin.KelolaPanggilanTesEdit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    // app/Http/Controllers/AdminKelolaPanggilanTesController.php

    public function update(Request $request, string $id)
    {
        // Validasi data input
        $requestData = $request->validate([
            'lowongan_id' => 'required|exists:lowongans,id',
            'perusahaan_id' => 'required|exists:kelola_perusahaans,id',
            'admin_id' => 'required|exists:admins,id',
            'nama' => 'required|string|max:255',
            'tanggal_pt' => 'required|date',
            'status' => 'required|in:dibuka,ditutup',
        ]);

        // Cari data berdasarkan ID
        $panggilanTes = PanggilanTes::findOrFail($id);
        $panggilanTes->fill($requestData); // Mengisi data yang diupdate
        $panggilanTes->save(); // Simpan perubahan

        // Simpan pesan flash
        session()->flash('success', 'Data Panggilan Tes berhasil diperbarui');

        // Redirect kembali ke halaman kelola panggilan tes
        return redirect('/kelolapanggilantes');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
