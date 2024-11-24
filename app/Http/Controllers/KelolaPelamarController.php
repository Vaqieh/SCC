<?php

namespace App\Http\Controllers;

use App\Models\Kelola_Pelamar;
use App\Http\Requests\StoreKelola_PelamarRequest;
use App\Http\Requests\UpdateKelola_PelamarRequest;

class KelolaPelamarController extends Controller
{
    public function index()
    {
    $data['kpelamar'] = \App\Models\Kelola_Pelamar::latest()->paginate(10);
    return view('admin.Kelola_Pelamar', compact('kpelamar'));
    }

    public function create()
    {
    }
    public function store(StoreKelola_PelamarRequest $request)
    {
    }
    public function show(Kelola_Pelamar $kelola_Pelamar)
    {
    }
    public function edit(Kelola_Pelamar $kelola_Pelamar)
    {
    }
    public function update(UpdateKelola_PelamarRequest $request, Kelola_Pelamar $kelola_Pelamar)
    {
    }
    public function destroy(Kelola_Pelamar $kelola_Pelamar)
    {
    }
}
