@extends('layouts.admin', ['title' => 'Kelola Data Lowongan'])

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
                <li class="breadcrumb-item active" aria-current="page">Panggilan Tes</li>
            </ol>
        </nav>
    </div>

    {{-- <div class="card">
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
    </div> --}}

    <div class="table-responsive">
        <br>
        <a href="/kelolapanggilantes/create" class="btn btn-primary mb-3">Tambah Lowongan</a>
        <table class="table table-custom table-lg mb-0" id="orders">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Lowongan</th>
                <th>Nama Perusahaan</th>
                <th>Admin</th>
                <th> Jenis Tes</th>
                <th>Tanggal Tes</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($kelolapanggilantes as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->lowongan->nama_lowongan }}</td>
                    <td>{{ $item->perusahaan->p_nama }}</td>
                    <td>{{ $item->admin->admin_nama }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tanggal_pt }}</td>
                    <td>
                        <span class="badge
                            @if ($item->status == 'dibuka')
                                bg-success
                            @elseif ($item->status == 'ditutup')
                                bg-danger
                            @endif">
                            {{ $item->status }}
                        </span>
                    </td>

                    <td class="text-end">
                        <div class="d-flex">
                            <div class="dropdown ms-auto">
                                <a href="#" data-bs-toggle="dropdown"
                                class="btn btn-floating"
                                aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">Show</a>
                                    <a href="{{ route('kelolapanggilantes.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                    <a href="#" class="dropdown-item">Delete</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        <!-- Pagination Links -->
        <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <!-- Previous Page Link -->
                @if ($kelolapanggilantes->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $kelolapanggilantes->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                <!-- Pagination Links -->
                @foreach ($kelolapanggilantes->getUrlRange(1, $kelolapanggilantes->lastPage()) as $page => $url)
                    <li class="page-item {{ $kelolapanggilantes->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Next Page Link -->
                @if ($kelolapanggilantes->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $kelolapanggilantes->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

    </div>
@endsection
