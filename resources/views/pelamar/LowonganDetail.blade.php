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

                        <!-- Detail Lowongan -->
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

                        <!-- Tanggal Verifikasi -->
                        <p style="line-height: 1.8; color: #555;">
                            <strong>Tanggal Verifikasi:</strong> {{ $lowongan->tanggal_verifikasi ?? 'Belum diverifikasi' }}
                        </p>

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
