@extends('layouts.admin', ['title' => 'Kelola Data Pelamar'])
@section('content')
<div class="content ">

    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="bi bi-globe2 small me-2"></i> Kelola 
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Lowongan</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-md-flex gap-4 align-items-center">
                <div class="d-none d-md-flex">All Orders</div>
                <div class="d-md-flex gap-4 align-items-center">
                    <form class="mb-3 mb-md-0">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option>Sort by</option>
                                    <option value="desc">Desc</option>
                                    <option value="asc">Asc</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="btn btn-outline-light" type="button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="dropdown ms-auto">
                    <a href="#" data-bs-toggle="dropdown"
                       class="btn btn-primary dropdown-toggle"
                       aria-haspopup="true" aria-expanded="false">Actions</a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-custom table-lg mb-0" id="orders">
            <thead>
                <tr>
                    <th>Nama Lowongan</th>
                    <th>Status</th>
                    <th>Pendidikan</th>
                    <th>Pengalaman Kerja</th>
                    <th>Umur</th>
                    <th>Tanggal Buat</th>
                    <th>Tanggal Berakhir</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowongans as $lowongan)
                <tr>
                    <td>{{ $lowongan->nama_lowongan }}</td>
                    <td>{{ $lowongan->status_lowongan }}</td>
                    <td>{{ $lowongan->pendidikan }}</td>
                    <td>{{ $lowongan->pengalaman_kerja }}</td>
                    <td>{{ $lowongan->umur }}</td>
                    <td>{{ $lowongan->tanggal_buat }}</td>
                    <td>{{ $lowongan->tanggal_berakhir }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $lowongan->gambar_lowongan) }}" alt="Gambar Lowongan" width="100">
                    </td>
                    <td>
                        <a href="{{ route('perusahaan.lowongan.show', $lowongan->id) }}" class="btn btn-info">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection