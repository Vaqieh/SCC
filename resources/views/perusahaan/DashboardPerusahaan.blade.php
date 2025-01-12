@extends('layouts.perusahaan', ['title' => 'Dashboard Admin'])

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <style>
        /* Ukuran canvas lebih besar dan responsif */
        canvas {
            width: 50% !important;
            height: auto !important;
            max-width: 100%; /* Maksimum lebar 100% dari container */
            margin: auto;
        }

        /* Responsif pada layar kecil (max-width: 768px) */
        @media (max-width: 768px) {
            canvas {
                height: 100px !important; /* Sesuaikan tinggi untuk perangkat kecil */
            }
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
            height: 100%; /* Menyamakan tinggi card */
            display: flex;
            flex-direction: column; /* Membuat card menjadi flex container */
        }

        .card-header {
            background-color: #1E3A8A;
            color: rgb(0, 0, 0);
            border-radius: 15px 15px 0 0;
            font-weight: bold;
            font-size: 20px;
            padding: 15px;
        }

        .card-body {
            flex-grow: 1; /* Membuat card-body mengambil sisa ruang */
        }

        .chart-tooltip {
            background-color: rgba(0, 0, 0, 0.7) !important;
            color: white !important;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        /* Memastikan grafik pada bagian bawah berada di bawah grafik lainnya */
        .col-lg-6 {
            margin-bottom: 20px; /* Jarak antar card */
        }

        /* Membuat card dan grafik 'Jumlah Pelamar Per Tahun' setinggi dengan yang lainnya */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .col-lg-6 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Card untuk grafik per tahun berada di bawah */
        .col-lg-12 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 20px; /* Jarak antar baris card */
        }
    </style>

    <div class="card-container">
        <!-- Baris pertama dengan 2 grafik -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card widget">
                <div class="card-header">
                    <h6 class="card-title">Jumlah Pelamar Berdasarkan Jenis Kelamin</h6>
                </div>
                <div class="card-body">
                    <!-- Canvas tempat grafik donut ditampilkan -->
                    <canvas id="pelamarChart"></canvas>
                    <!-- Persentase di bawah grafik -->
                    <div class="row text-center mb-3 mt-3">
                        <div class="col-6">
                            <div class="display-7" id="laki-laki-percentage">
                                @if (($totalLaki + $totalPerempuan) > 0)
                                    {{ round(($totalLaki / ($totalLaki + $totalPerempuan)) * 100) }}%
                                @else
                                    0%
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-orange me-2 small"></i>
                                <span class="text-muted">Laki-laki</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="display-7" id="perempuan-percentage">
                                @if (($totalLaki + $totalPerempuan) > 0)
                                    {{ round(($totalPerempuan / ($totalLaki + $totalPerempuan)) * 100) }}%
                                @else
                                    0%
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-cyan me-2 small"></i>
                                <span class="text-muted">Perempuan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card untuk grafik donut chart Status Lowongan -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card widget">
                <div class="card-header">
                    <h6 class="card-title">Jumlah Lowongan Berdasarkan Status</h6>
                </div>
                <div class="card-body">
                    <!-- Canvas tempat grafik donut ditampilkan -->
                    <canvas id="statusLowonganChart"></canvas>
                    <!-- Persentase di bawah grafik -->
                    <div class="row text-center mb-3 mt-3">
                        <div class="col-4">
                            <div class="display-7" id="menunggu-percentage">
                                @php
                                    $totalStatus = $statusMenunggu + $statusDiterima + $statusDitolak;
                                    $menungguPercentage =
                                        $totalStatus > 0 ? round(($statusMenunggu / $totalStatus) * 100) : 0;
                                @endphp
                                {{ $menungguPercentage }}%
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-warning me-2 small"></i>
                                <span class="text-muted">Menunggu</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="display-7" id="diterima-percentage">
                                @php
                                    $diterimaPercentage =
                                        $totalStatus > 0 ? round(($statusDiterima / $totalStatus) * 100) : 0;
                                @endphp
                                {{ $diterimaPercentage }}%
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-success me-2 small"></i>
                                <span class="text-muted">Diterima</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="display-7" id="ditolak-percentage">
                                @php
                                    $ditolakPercentage =
                                        $totalStatus > 0 ? round(($statusDitolak / $totalStatus) * 100) : 0;
                                @endphp
                                {{ $ditolakPercentage }}%
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-danger me-2 small"></i>
                                <span class="text-muted">Ditolak</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Baris kedua dengan grafik jumlah pelamar per tahun -->
    <div class="col-lg-12">
        <div class="card widget">
            <div class="card-header">
                <h6 class="card-title">Jumlah Pelamar Per Tahun</h6>
            </div>
            <div class="card-body">
                <!-- Canvas tempat grafik batang ditampilkan -->
                <canvas id="pelamarPerTahunChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Menghitung jumlah pelamar laki-laki dan perempuan di view
        var lakiLakiCount = 0;
        var perempuanCount = 0;

        // Mengiterasi pelamar yang dikirim dari controller
        @foreach ($pelamars as $pelamar)
            @if ($pelamar->JenisKelamin === 'laki-laki')
                lakiLakiCount++;
            @elseif ($pelamar->JenisKelamin === 'perempuan')
                perempuanCount++;
            @endif
        @endforeach

        // Konfigurasi Chart.js untuk Grafik Pelamar Berdasarkan Jenis Kelamin
        var ctxPelamar = document.getElementById('pelamarChart').getContext('2d');
        var pelamarChart = new Chart(ctxPelamar, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [lakiLakiCount, perempuanCount],
                    backgroundColor: ['#347DC1', '#E6A6C7'],
                    borderColor: ['#347DC1', '#E6A6C7'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true, // Menjaga proporsi grafik
                aspectRatio: 1, // Menjaga agar lingkaran tetap bulat
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                cutout: '40%', // Membuat grafik berbentuk donut
            }
        });

        // Data untuk grafik status lowongan
        var menungguCount = {{ $statusMenunggu }};
        var diterimaCount = {{ $statusDiterima }};
        var ditolakCount = {{ $statusDitolak }};

        // Konfigurasi Chart.js untuk grafik status lowongan
        var ctxStatusLowongan = document.getElementById('statusLowonganChart').getContext('2d');
        var statusLowonganChart = new Chart(ctxStatusLowongan, {
            type: 'doughnut',
            data: {
                labels: ['Menunggu', 'Diterima', 'Ditolak'],
                datasets: [{
                    data: [menungguCount, diterimaCount, ditolakCount],
                    backgroundColor: ['#FFC107', '#28A745', '#DC3545'],
                    borderColor: ['#FFC107', '#28A745', '#DC3545'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1, // Menjaga agar lingkaran tetap bulat
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                cutout: '40%', // Membuat grafik berbentuk donut
            }
        });

        // Ambil data pelamar per tahun yang dikirim dari controller
        var tahunLabels = @json($tahunLabels); // Tahun
        var totalPelamarPerTahun = @json($totalPelamarPerTahun); // Total pelamar per tahun

        // Konfigurasi Chart.js untuk grafik batang
        var ctxPelamarPerTahun = document.getElementById('pelamarPerTahunChart').getContext('2d');
        var pelamarPerTahunChart = new Chart(ctxPelamarPerTahun, {
            type: 'bar',
            data: {
                labels: tahunLabels, // Tahun pada sumbu x
                datasets: [{
                    label: 'Jumlah Pelamar',
                    data: totalPelamarPerTahun, // Total pelamar pada sumbu y
                    backgroundColor: '#1E3A8A',
                    borderColor: '#1E3A8A',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true, // Menjaga agar grafik tetap responsif
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Pelamar'
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false // Menyembunyikan legenda
                    }
                }
            }
        });
    </script>
@endsection
