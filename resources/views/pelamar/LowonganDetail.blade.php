@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header text-center bg-primary text-white" style="padding: 20px;">
                        <h2 style="font-weight: bold; font-family: 'Poppins', sans-serif;">{{ $lowongan->nama_lowongan }}</h2>
                    </div>
                    <div class="card-body" style="padding: 30px; font-family: 'Roboto', sans-serif;">
                        <!-- Gambar Lowongan -->
                        <div class="text-center mb-4">
                            @if ($lowongan->gambar_lowongan)
                                <img src="{{ \Storage::url($lowongan->gambar_lowongan) }}" alt="Gambar Lowongan"
                                    style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            @else
                                <img src="path/to/default-image.jpg" alt="Default Image"
                                    style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            @endif
                        </div>

                        <!-- Informasi Lowongan -->
                        <h4 style="font-weight: bold; color: #007BFF; margin-top: 20px;">Informasi Tambahan</h4>
                        
                        <!-- Status Lowongan -->
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Status Lowongan:</strong> {{ $lowongan->status_lowongan }}
                        </p>
                        
                        <!-- Perusahaan -->
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Perusahaan:</strong> {{ $lowongan->perusahaan->p_nama ?? 'Tidak diketahui' }}
                        </p>

                        <!-- Tanggal Buka dan Tanggal Tutup -->
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Tanggal Buka:</strong> {{ \Carbon\Carbon::parse($lowongan->tanggal_buat)->format('d M Y') }}
                        </p>
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Tanggal Tutup:</strong> {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d M Y') }}
                        </p>

                        <!-- Pendidikan yang dibutuhkan -->
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Pendidikan:</strong> {{ $lowongan->pendidikan ?? 'Tidak ada keterangan' }}
                        </p>

                        <!-- Pengalaman Kerja yang dibutuhkan -->
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Pengalaman Kerja:</strong> {{ $lowongan->pengalaman_kerja ?? 'Tidak ada keterangan' }}
                        </p>

                        <!-- Umur yang dibutuhkan -->
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Umur:</strong> {{ $lowongan->umur ?? 'Tidak ada keterangan' }} tahun
                        </p>

                        <!-- Kuota yang dibutuhkan -->
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Kuota:</strong> {{ $lowongan->kuota ?? 'Tidak ada keterangan' }}
                        </p>

                        <!-- Detail Lowongan -->
                        <div style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; background-color: #f8f9fa;">
                            <h5 style="font-weight: bold; color: #007BFF;">Detail Pekerjaan:</h5>
                            <p style="color: #555;">{{ $lowongan->detail ?? 'Tidak ada deskripsi lebih lanjut' }}</p>
                        </div>

                        <!-- Button Lamar -->
                        <div class="text-center mt-4">
                            @php
                                $current_date = \Carbon\Carbon::now();
                                $tanggal_tutup = \Carbon\Carbon::parse($lowongan->tanggal_berakhir);
                            @endphp

                            @if ($current_date->isAfter($tanggal_tutup))
                                <p style="color: red; font-weight: bold;">Lowongan ini sudah ditutup.</p>
                            @else
                                <a href="{{ route('lamar.create', ['id' => $lowongan->id]) }}" class="btn btn-success btn-lg"
                                    style="padding: 10px 30px; font-size: 18px; font-weight: bold;">
                                    Lamar Pekerjaan
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
