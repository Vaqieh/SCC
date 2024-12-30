<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan hanya lowongan milik perusahaan yang sedang login
        $lowongans = Lowongan::where('perusahaan_id', Auth::user()->id)->get();

        return view('perusahaan.PerusahaanLowonganIndex', compact('lowongans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perusahaan.PerusahaanLowonganCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lowongan' => 'required|string|max:255',
            'pendidikan' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'umur' => 'required|integer',
            'tanggal_berakhir' => 'required|date',
            'gambar_lowongan' => 'required|image',
        ]);

        $path = $request->file('gambar_lowongan')->store('lowongan', 'public');

        Lowongan::create([
            'nama_lowongan' => $request->nama_lowongan,
            'pendidikan' => $request->pendidikan,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'umur' => $request->umur,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'status_lowongan' => 'pending',
            'gambar_lowongan' => $path,
            'tanggal_buat' => now(),
            'perusahaan_id' => Auth::user()->id,
        ]);

        return redirect()->route('perusahaan.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan dan menunggu verifikasi admin.');
    }
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
