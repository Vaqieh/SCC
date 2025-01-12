@extends('layouts.perusahaan', ['title' => 'Kelola Data Panggilan Tes'])

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
                <li class="breadcrumb-item active" aria-current="page">Panggilan Tes</li>
            </ol>
        </nav>
    </div>

    <div class="table-responsive">
        <br>
        <a href="{{ route('kelolapanggilantesperusahaan.create') }}" class="btn btn-primary mb-3">Tambah Panggilan Tes</a>
        <table class="table table-custom table-lg mb-0" id="orders">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lowongan</th>
                    <th>Nama Perusahaan</th>
                    <th>Admin</th>
                    <th>Jenis Tes</th>
                    <th>Tanggal Tes</th>
                    <th>Status</th>
                    {{-- <th class="text-end">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($perusahaankelolapanggilantes as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->lowongan->nama_lowongan }}</td>
                    <td>{{ $item->perusahaan->p_nama }}</td>
                    <td>{{ $item->admin ? $item->admin->admin_nama : 'N/A' }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pt)->format('d M Y') }}</td>
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
                    {{-- <td class="text-end">
                        <a href="{{ route('kelolapanggilantesperusahaan.show', $item->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('kelolapanggilantesperusahaan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <!-- Pagination Links -->
        <div>
            {{ $perusahaankelolapanggilantes->links() }}
        </div> --}}
    </div>

</div>
@endsection
