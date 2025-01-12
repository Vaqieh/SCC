@extends('layouts.perusahaan')

@section('content')
<div class="container">
    <h1>Daftar Pelamar untuk Lowongan: {{ $lowongan->nama_lowongan }}</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelamar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelamars as $key => $lamaran)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if ($lamaran->pelamar)  <!-- Cek apakah pelamar ada -->
                            {{ $lamaran->pelamar->NamaPelamar }}
                        @else
                            Tidak Diketahui
                        @endif
                    </td>
                    <td>{{ $lamaran->status }}</td>
                    <td>
                        <a href="{{ route('kelolalamarperusahaan.edit', $lamaran->id) }}" class="btn btn-warning btn-sm">Edit Status</a>
                        {{-- <a href="{{ route('kelolalamarperusahaan.print', $lamaran->id) }}" class="btn btn-primary btn-sm" target="_blank">Print</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
