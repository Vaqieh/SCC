<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Lowongan; // Ensure you import the correct model
use App\Http\Requests\StorePelamarRequest;
use App\Http\Requests\UpdatePelamarRequest;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kelolalowongan'] = Lowongan::latest()->paginate(4);
        $data['kelolalowongan'] = \App\Models\Lowongan::latest()->paginate(4);
        // Cek apakah pengguna sudah login
        if (Auth::guest()) {
            return redirect()->route('login.pelamar');  // Redirect ke login admin jika belum login
        }

        if (Auth::user()->role !== 'pelamar') {
            return redirect('/login/pelamar')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('pelamar.pelamarindex', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelamarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelamar $pelamar)
    {
        // Mengambil semua data lowongan dari model Lowongan
        $lowongans = Lowongan::all();

        // Mengirim data ke view pelamarLowongan.blade.php
        return view('pelamar.pelamarlowongan', compact('lowongans'));
    }

    public function showDetail($id)
    {
        // Ambil data lowongan berdasarkan ID
        $lowongan = \App\Models\Lowongan::findOrFail($id);

        // Kirim data ke view detail
        return view('pelamar.lowongandetail', compact('lowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelamar $pelamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelamarRequest $request, Pelamar $pelamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelamar $pelamar)
    {
        //
    }
}
