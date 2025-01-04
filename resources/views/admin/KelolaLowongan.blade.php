@extends('layouts.admin', ['title' => 'Kelola Data Lowongan'])

@section('content')
    <div class="content">

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
                    <div class="d-none d-md-flex">All Lowongan</div>
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
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"
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
            <br>
            <a href="{{ route('kelolalowongan.create') }}" class="btn btn-primary mb-3">Tambah Lowongan</a>
            <table class="table table-custom table-lg mb-0" id="orders">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Perusahaan</th>
                        <th>Gambar Lowongan</th>
                        <th>Nama Lowongan</th>
                        <th>Dokumen Legal</th>
                        <th>Tanggal Verifikasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelolalowongan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->perusahaan->p_nama }}</td>
                            <td>
                                @if ($item->gambar_lowongan)
                                    <a href="{{ \Storage::url($item->gambar_lowongan) }}" target="blank">
                                        <img src="{{ \Storage::url($item->gambar_lowongan) }}" width="50">
                                    </a>
                                @endif
                            </td>
                            <td>{{ $item->nama_lowongan }}</td>
                            <td>
                                @if ($item->file)
                                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank">Lihat Dokumen</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->tanggal_verifikasi }}</td>
                            <td>
                                @if ($item->status_lowongan == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif ($item->status_lowongan == 'diterima')
                                    <span class="badge bg-success">Diterima</span>
                                @elseif ($item->status_lowongan == 'ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('kelolalowongan.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('kelolalowongan.show', $item->id) }}" class="btn btn-outline-secondary ">Print</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div>
                {{ $kelolalowongan->links() }}
            </div>
        </div>
    </div>
@endsection
