@extends('layouts.perusahaan', ['title' => 'Kelola Data Lowongan'])

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


    <div class="table-responsive">
        <br>
        <a href="/kelolapanggilantesperusahaan/create" class="btn btn-primary mb-3">Tambah Lowongan</a>
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
                @foreach ($perusahaankelolapanggilantes as $item)
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
                                    <a href="{{ route('kelolapanggilantesperusahaan.edit', $item->id) }}" class="dropdown-item">Edit</a>
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
        {{ $perusahaankelolapanggilantes->links() }}
    </div>

    <nav class="mt-4" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    </div>
@endsection
