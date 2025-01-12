@extends('layouts.perusahaan', ['title' => 'Kelola Data Lowongan'])

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



        <div class="table-responsive">
            <br>
            <a href="{{ route('kelolalowonganperusahaan.create') }}" class="btn btn-primary mb-3">Tambah Lowongan</a>
            <table class="table table-custom table-lg mb-0" id="orders">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Perusahaan</th>
                        <th>Gambar Lowongan</th>
                        <th>Nama Lowongan</th>
                        <th>Tanggal Verifikasi</th>
                        <th>Status</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelolalowonganperusahaan as $item)
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
                            {{-- <td>
                                <a href="{{ route('kelolalowonganperusahaan.show', $item->id) }}" class="btn btn-info">Show</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav class="mt-4" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- Previous Page Link -->
                    @if ($kelolalowonganperusahaan->onFirstPage())
                    <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $kelolalowonganperusahaan->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif

                    <!-- Pagination Links -->
                    @foreach ($kelolalowonganperusahaan->getUrlRange(1, $kelolalowonganperusahaan->lastPage()) as $page => $url)
                        <li class="page-item {{ $kelolalowonganperusahaan->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($kelolalowonganperusahaan->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $kelolalowonganperusahaan->nextPageUrl() }}" aria-label="Next">
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
