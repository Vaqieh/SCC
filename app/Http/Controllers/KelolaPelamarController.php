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
    }
    public function store(StoreKelola_PelamarRequest $request)
    {
    }
    public function show(KelolaPelamar $KelolaPelamar)
    {
    }
    public function edit(KelolaPelamar $KelolaPelamar)
    {
    }
    public function update(UpdateKelola_PelamarRequest $request, KelolaPelamar $KelolaPelamar)
    {
    }
    public function destroy($kelola_Pelamar)
    {
    }
}
