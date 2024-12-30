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
    public function show(KelolaPerusahaan $kelolaPerusahaan)
    {
    }
    public function edit(string $id)
    {
        $data['kelolaperusahaan'] = \App\Models\KelolaPerusahaan::findOrFail($id);
        return view('admin.editPerusahaan',$data);
    }
    public function update(Request $request, string $id)
{
    // Validasi data yang dikirimkan oleh form
    $requestData = $request->validate([
        'p_nama' => 'required|string|min:3',
        'email_perusahaan' => 'required|email',
        'jenis_industri' => 'required|string',
        'p_tahunBerdiri' => 'required|numeric',
        'negara' => 'required|string',
        'provinsi' => 'required|string',
        'kabupaten' => 'required|string',
        'kota' => 'required|string',  // Pastikan tipe data string
    ]);

    // Cari data perusahaan berdasarkan ID
    $kelolaPerusahaan = \App\Models\KelolaPerusahaan::findOrFail($id);

    // Mengisi data perusahaan dengan data yang telah divalidasi
    $kelolaPerusahaan->fill($requestData);

    // Menyimpan perubahan ke database
    $kelolaPerusahaan->save();

    // Menampilkan pesan sukses
    

    // Kembali ke halaman kelola perusahaan
    return redirect()->route('kelolaperusahaan.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelolaPerusahaan $kelolaPerusahaan)
    {
        //
    }
}
