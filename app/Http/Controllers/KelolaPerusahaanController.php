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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
