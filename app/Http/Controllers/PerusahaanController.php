<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lowongan;
class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lowongans = Lowongan::all();
        // Cek apakah pengguna sudah login
        if (Auth::guest()) {
            return redirect()->route('login.perusahaan');  // Redirect ke login admin jika belum login
        }
        if (Auth::user()->role !== 'perusahaan') {
            return redirect('/login/perusahaan')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('perusahaan.dashboardperusahaan',compact('lowongans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lowongans = Lowongan::all();
        return view('perusahaan.perusahaanLowonganIndex',compact('lowongans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
