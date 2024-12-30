<?php

namespace App\Http\Controllers;

use App\Models\KelolaPelamar;
use App\Http\Requests\StoreKelola_PelamarRequest;
use App\Http\Requests\UpdateKelola_PelamarRequest;

class KelolaPelamarController extends Controller
{
    public function index()
    {
        $data['kelolapelamar'] = \App\Models\KelolaPelamar::latest()->paginate(10);
        return view('admin.KelolaPelamar', $data);
    }

    public function create()
    {
        return view('admin.KelolaPelamar_create');
    }
    public function store(StoreKelola_PelamarRequest $request)
    {
         // Validasi form
         $validatedData = $request->validate([
            'NamaPelamar' => 'required|string|max:255',
            'TanggalLahir' => 'required|date',
            'JenisKelamin' => 'required|string',
            'Alamat' => 'required|string',
            'Kompetensi' => 'nullable|string',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,png',
            'cv' => 'required|file|mimes:pdf,doc,docx',
            'TanggalVerifikasi' => 'nullable|date',
        ]);

        // Menyimpan data pelamar ke database
        $pelamar = new KelolaPelamar();
        $pelamar->NamaPelamar = $validatedData['NamaPelamar'];
        $pelamar->TanggalLahir = $validatedData['TanggalLahir'];
        $pelamar->JenisKelamin = $validatedData['JenisKelamin'];
        $pelamar->Alamat = $validatedData['Alamat'];
        $pelamar->Kompetensi = $validatedData['Kompetensi'];

        // Menyimpan file sertifikat dan CV jika ada
        if ($request->hasFile('sertifikat')) {
            $pelamar->sertifikat = $request->file('sertifikat')->store('sertifikat');
        }

        if ($request->hasFile('cv')) {
            $pelamar->cv = $request->file('cv')->store('cv');
        }

        $pelamar->TanggalVerifikasi = $validatedData['TanggalVerifikasi'] ?? null;

        $pelamar->save();

        return redirect()->route('kelolapelamar.index')->with('success', 'Data Pelamar berhasil ditambahkan!');

    }
    public function show(KelolaPelamar $KelolaPelamar)
    {
        return view('admin.DashboardAdmin');
    }
    public function edit(KelolaPelamar $KelolaPelamar)
    {
        // return view('admin.KelolaPelamar_edit', compact('kelolaPelamar'));
    }
    public function update(UpdateKelola_PelamarRequest $request, KelolaPelamar $KelolaPelamar)
    {
    }
    public function destroy($kelola_Pelamar)
    {
    }
}
