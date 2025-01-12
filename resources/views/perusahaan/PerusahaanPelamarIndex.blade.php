@extends('layouts.perusahaan', ['title' => 'Kelola Data Pelamar'])
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
                <li class="breadcrumb-item active" aria-current="page">Pelamar</li>
            </ol>
        </nav>
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
            @foreach ($kelolapelamarperusahaan as $item)
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
    <nav class="mt-4" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <!-- Previous Page Link -->
            @if ($kelolapelamarperusahaan->onFirstPage())
            <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $kelolapelamarperusahaan->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @endif

            <!-- Pagination Links -->
            @foreach ($kelolapelamarperusahaan->getUrlRange(1, $kelolapelamarperusahaan->lastPage()) as $page => $url)
                <li class="page-item {{ $kelolapelamarperusahaan->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Next Page Link -->
            @if ($kelolapelamarperusahaan->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $kelolapelamarperusahaan->nextPageUrl() }}" aria-label="Next">
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
@endsection
