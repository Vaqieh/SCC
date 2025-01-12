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
            <br>
            {{-- <a href="{{ route('kelolalamarperusahaan.create') }}" class="btn btn-primary mb-3">Buat Lamaran Baru</a> --}}

            <table class="table table-custom table-lg mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lowongan</th>
                        <th>Pelamar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lamar as $key => $lamaran)
                        <tr>
                            <!-- Nomor urut dengan pagination -->
                            <td>{{ $lamar->firstItem() + $key }}</td> <!-- Menyesuaikan nomor urut dengan pagination -->
                            <td>{{ $lamaran->lowongan->nama_lowongan }}</td>
                            <td>{{ $lamaran->pelamar->name }}</td>
                            <td>
                                @if ($lamaran->status == 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif ($lamaran->status == 'diterima')
                                    <span class="badge bg-success">Diterima</span>
                                @elseif ($lamaran->status == 'ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('kelolalamarperusahaan.show', $lamaran->id) }}" class="btn btn-info">Lihat</a>
                                <a href="{{ route('kelolalamarperusahaan.edit', $lamaran->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('kelolalamarperusahaan.destroy', $lamaran->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-3">
                {{-- {{ $lamar->links() }} <!-- Menampilkan pagination --> --}}
            </div>
        </div>

    </div>
@endsection
