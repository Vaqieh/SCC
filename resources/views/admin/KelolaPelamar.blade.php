@extends('layouts.admin', ['title' => 'Kelola Data Pelamar'])
@section('content')
<div class="content ">

    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
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

    <table class="table table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Pelamar</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Kompetensi</th>
                <th>Sertifikat</th>
                <th>CV</th>
                <th>Tanggal Verifikasi</th>
                <th>Status</th>
                <th class="text-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelolapelamar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->NamaPelamar }}</td>
                <td>{{ $item->JenisKelamin }}</td>
                <td>{{ \Carbon\Carbon::parse($item->TanggalLahir)->format('d M Y') }}</td>
                <td>{{ $item->Alamat }}</td>
                <td>{{ $item->Kompetensi ?? '-' }}</td>
                {{-- yang dibawah ini adalah contoh yang tidak bisa menampilkan filenya
                     DIKARENAKAN di Folder PRIVATE, kalau PUBLIC bisa --}}
                {{-- <td>
                    <!-- Sertifikat -->
                    @if ($item->sertifikat)
                        <a href="{{ url('/file/'.$item->sertifikat) }}" target="_blank">Download Sertifikat</a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    <!-- CV -->
                    @if ($item->cv)
                        <a href="{{ \Storage::url($item->cv) }}" target="_blank">Lihat CV</a>
                    @else
                        -
                    @endif
                </td> --}}
                <td>
                    @if ($item->sertifikat)
                        <a href="{{ url('/file/sertifikat/' . basename($item->sertifikat)) }}" target="_blank">Lihat Sertifikat</a>
                    @else
                        -
                    @endif
                </td>


                <td>
                    @if ($item->cv)
                        <a href="{{ url('/file/cv/' . basename($item->cv)) }}" target="_blank">Lihat CV</a>
                    @else
                        -
                    @endif
                </td>

                <td>{{ \Carbon\Carbon::parse($item->TanggalVerifikasi)->format('d M Y') }}</td>
                <td>
                    <span class="badge {{ $item->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                        {{ $item->status == 'aktif' ? 'Aktif' : 'Non-Aktif' }}
                    </span>
                </td>
                <td class="text-end">
                    {{-- <div class="d-flex">
                        <a href="{{ route('kelola_pelamar.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kelola_pelamar.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                        </form>
                    </div> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
