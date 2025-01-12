@extends('layouts.app')

@section('content')
<section id="all-lowongan" class="section py-5">
    <div class="container">
        <br>
        <br>

        <!-- Title Section -->
        <h2 class="text-center mb-5" style="font-size: 36px; font-weight: bold; color: #333;">
            Sistem Bursa Kerja - SCC Politeknik Caltex Riau
        </h2>
        
        <!-- Lowongan Listings -->
        <div class="row gy-4">
            @foreach ($lowongans as $item)
                @if ($item->status_lowongan == 'diterima') <!-- Filter hanya yang diterima -->
                    @php
                        // Menghitung status berdasarkan tanggal buat dan tanggal berakhir
                        $current_date = \Carbon\Carbon::now(); // Ambil waktu sekarang
                        $status = 'Tutup'; // Default status adalah 'Tutup' jika tanggal sekarang setelah tanggal berakhir

                        // Jika tanggal sekarang sebelum atau sama dengan tanggal berakhir, statusnya 'Buka'
                        if ($current_date->isBefore($item->tanggal_berakhir) || $current_date->isSameDay($item->tanggal_berakhir)) {
                            $status = 'Buka'; // Sedang dibuka
                        }
                    @endphp

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="card shadow-sm border-0 rounded-lg">
                            @if ($item->gambar_lowongan)
                                <img src="{{ \Storage::url($item->gambar_lowongan) }}" alt="Gambar Lowongan"
                                    class="card-img-top" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="path/to/default-image.jpg" alt="Default Image"
                                    class="card-img-top" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h4 class="text-center mb-3">
                                    <a href="{{ route('pelamar.lowongan.detail', $item->id) }}"
                                        class="lowongan-link text-dark text-decoration-none">
                                        {{ $item->nama_lowongan }}
                                    </a>
                                </h4>
                                <p class="text-muted" style="font-size: 14px;">
                                    <i class="bi bi-building" style="margin-right: 5px;"></i>
                                    {{ $item->perusahaan->p_nama ?? 'Perusahaan Tidak Diketahui' }}
                                </p>
                                
                                <!-- Tanggal Buka dan Tanggal Tutup -->
                                <p class="text-muted" style="font-size: 13px;">
                                    <i class="bi bi-calendar" style="margin-right: 5px;"></i>
                                    <strong>Tanggal Buka:</strong> {{ \Carbon\Carbon::parse($item->tanggal_buat)->format('d M Y') }}
                                </p>
                                <p class="text-muted" style="font-size: 13px;">
                                    <i class="bi bi-calendar" style="margin-right: 5px;"></i>
                                    <strong>Tanggal Tutup:</strong> {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->format('d M Y') }}
                                </p>

                                <!-- Status Lowongan -->
                                <p class="text-muted" style="font-size: 13px;">
                                    <i class="bi bi-person" style="margin-right: 5px;"></i>
                                    Status: {{ $status }} <!-- Menampilkan status Buka atau Tutup -->
                                </p>

                                <!-- Status Button (Hijau untuk Buka, Merah untuk Tutup) -->
                                <div class="text-center mt-3">
                                    <span class="badge {{ $status == 'Buka' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Custom CSS for Hover Effect -->
<style>
    .lowongan-link:hover {
        color: blue !important;
    }
</style>
@endsection
