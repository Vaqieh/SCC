@extends('layouts.perusahaan', ['title' => 'Kelola Lamaran'])

@section('content')
    <div class="content">

        <!-- Breadcrumb -->
        <div class="mb-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <i class="bi bi-globe2 small me-2"></i> Kelola
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Lamaran</li>
                </ol>
            </nav>
        </div>

        <!-- Table with Pagination -->
        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lowongan</th>
                        <th>Jumlah Pelamar</th>
                        <th>Tanggal Buka</th>
                        <th>Tanggal Tutup</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowongans as $key => $lowongan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $lowongan->nama_lowongan }}</td>
                            <td>{{ $lowongan->lamars_count }}</td>  <!-- Menampilkan jumlah pelamar -->
                            <td>{{ $lowongan->tanggal_buat }}</td>
                            <td>{{ $lowongan->tanggal_berakhir }}</td>
                            <td>
                                <a href="{{ route('kelolalamarperusahaan.show', $lowongan->id) }}" class="btn btn-info">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav class="mt-4" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- Previous Page Link -->
                    @if ($lowongans->onFirstPage())
                    <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $lowongans->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif

                    <!-- Pagination Links -->
                    @foreach ($lowongans->getUrlRange(1, $lowongans->lastPage()) as $page => $url)
                        <li class="page-item {{ $lowongans->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($lowongans->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $lowongans->nextPageUrl() }}" aria-label="Next">
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

    </div>
@endsection
