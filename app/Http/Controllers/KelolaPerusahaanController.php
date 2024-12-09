<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaPerusahaan;
use App\Http\Requests\StoreKelolaPerusahaanRequest;
use App\Http\Requests\UpdateKelolaPerusahaanRequest;

class KelolaPerusahaanController extends Controller
{
    public function index()
    {
        $data['kelolaperusahaan'] = \App\Models\KelolaPerusahaan::latest()->paginate(10);
        return view('admin.KelolaPerusahaan', $data);
        
    }
    public function create()
    {
        return view('admin.tambahPerusahaan');
    }
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan melalui form
        $requestData = $request->validate([
            'p_nama' => 'required|string|max:255',
            'email_perusahaan' => 'required|email|max:255|unique:kelola_perusahaans,email_perusahaan',
            'jenis_industri' => 'required|string|max:255',
            'p_tahunBerdiri' => 'required|digits:4',  // Tahun harus 4 digit
            'negara' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
        ]);

        // Membuat instance baru dari model KelolaPerusahaan
        $kelolaPerusahaan = new KelolaPerusahaan();
        
        // Mengisi properti model dengan data yang sudah divalidasi
        $kelolaPerusahaan->fill($requestData);

        // Menyimpan data ke dalam database
        $kelolaPerusahaan->save();



        // Mengalihkan ke halaman daftar perusahaan (index)
        return redirect()->route('kelolaperusahaan.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(KelolaPerusahaan $kelolaPerusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelolaPerusahaan $kelolaPerusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelolaPerusahaanRequest $request, KelolaPerusahaan $kelolaPerusahaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelolaPerusahaan $kelolaPerusahaan)
    {
        //
    }
}
