@extends('layouts.admin', ['title' => 'Dashboard Admin'])
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <style>
        /* Ukuran canvas lebih besar dan responsif */
        canvas {
            width: 100% !important;
            /* Lebar canvas menyesuaikan ukuran elemen induk */
            height: auto !important;
            /* Tinggi menyesuaikan proporsi */
            max-width: 600px;
            /* Membatasi lebar maksimal agar tidak terlalu besar */
            margin: auto;
        }

        /* Pastikan chart tetap terlihat bagus pada perangkat kecil */
        @media (max-width: 768px) {
            canvas {
                max-width: 100%;
                /* Agar canvas dapat mengisi layar kecil */
                height: 300px;
                /* Sesuaikan tinggi untuk perangkat kecil */
            }
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
        }

        .card-header {
            background-color: #1E3A8A;
            color: rgb(0, 0, 0);
            border-radius: 15px 15px 0 0;
            font-weight: bold;
            font-size: 20px;
            padding: 15px;
        }

        .chart-tooltip {
            background-color: rgba(0, 0, 0, 0.7) !important;
            color: white !important;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>

    <div class="row">
        <!-- Card untuk grafik donut chart (Jenis Kelamin Pelamar) -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card widget h-100">
                <div class="card-header d-flex">
                    <h6 class="card-title">Jumlah Pelamar Berdasarkan Jenis Kelamin</h6>
                </div>
                <div class="card-body">
                    <!-- Canvas tempat grafik donut ditampilkan -->
                    <canvas id="pelamarChart"></canvas>
                    <!-- Baris menampilkan persentase di bawah grafik -->
                    <div class="row text-center mb-3 mt-3">
                        <div class="col-6">
                            <div class="display-7" id="laki-laki-percentage">
                                {{ round(($totalLaki / ($totalLaki + $totalPerempuan)) * 100) }}%
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-orange me-2 small"></i>
                                <span class="text-muted">Laki-laki</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="display-7" id="perempuan-percentage">
                                {{ round(($totalPerempuan / ($totalLaki + $totalPerempuan)) * 100) }}%
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

        <!-- Card untuk grafik donut chart (Jumlah Akun Pelamar dan Perusahaan) -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card widget h-100">
                <div class="card-header d-flex">
                    <h6 class="card-title">Jumlah Data Akun Pelamar dan Perusahaan</h6>
                </div>
                <div class="card-body">
                    <!-- Canvas tempat grafik donut ditampilkan -->
                    <canvas id="accountChart"></canvas>
                    <!-- Baris menampilkan persentase di bawah grafik -->
                    <div class="row text-center mb-3 mt-3">
                        <div class="col-4">
                            <div class="display-7" id="pelamar-percentage">
                                {{ number_format(($totalPelamar / ($totalPelamar + $totalPerusahaan)) * 100, 2) }}%</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-orange me-2 small"></i>
                                <span class="text-muted">Pelamar</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="display-7" id="perusahaan-percentage">
                                {{ number_format(($totalPerusahaan / ($totalPelamar + $totalPerusahaan)) * 100, 2) }}%</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-cyan me-2 small"></i>
                                <span class="text-muted">Perusahaan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card untuk grafik Line Chart (Jumlah Lowongan Terverifikasi Per Bulan) -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card widget h-100">
                <div class="card-header d-flex">
                    <h6 class="card-title">Jumlah Lowongan yang Terverifikasi per Bulan</h6>
                </div>
                <div class="card-body">
                    <!-- Canvas tempat grafik Line Chart ditampilkan -->
                    <canvas id="lowonganChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Card untuk grafik donut chart Status Lowongan -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card widget h-100">
                <div class="card-header d-flex">
                    <h6 class="card-title">Jumlah Lowongan Berdasarkan Status</h6>
                </div>
                <div class="card-body">
                    <!-- Canvas tempat grafik donut ditampilkan -->
                    <canvas id="statusLowonganChart"></canvas>
                    <!-- Baris menampilkan persentase di bawah grafik -->
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
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    cutout: '40%', // Membuat grafik berbentuk donut
                }
            });
        </script>
        <script>
            // Konfigurasi Chart.js untuk Grafik Jumlah Akun Pelamar dan Perusahaan
            var ctxAccount = document.getElementById('accountChart').getContext('2d');
            var accountChart = new Chart(ctxAccount, {
                type: 'doughnut',
                data: {
                    labels: ['Pelamar', 'Perusahaan'],
                    datasets: [{
                        data: [{{ $totalPelamar }}, {{ $totalPerusahaan }}],
                        backgroundColor: ['#FF5733', '#33FF57'],
                        borderColor: ['#FF5733', '#33FF57'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    cutout: '40%',
                }
            });
        </script>
        <script>
            // Konfigurasi Chart.js untuk Grafik Jumlah Lowongan Terverifikasi dan Belum Terverifikasi per Bulan
            var ctxLowongan = document.getElementById('lowonganChart').getContext('2d');
            var lowonganChart = new Chart(ctxLowongan, {
                type: 'line',
                data: {
                    labels: @json($bulanLabels), // Label Bulan (Jan, Feb, Mar, dst.)
                    datasets: [{
                            label: 'Lowongan Terverifikasi',
                            data: @json($jumlahLowonganTerverifikasi), // Data lowongan terverifikasi per bulan
                            borderColor: '#4CAF50', // Warna garis untuk lowongan terverifikasi
                            backgroundColor: 'rgba(76, 175, 80, 0.2)', // Warna latar belakang area grafik
                            fill: true, // Isi area di bawah garis
                            tension: 0.4, // Kurva garis
                            borderWidth: 4, // Lebar garis
                            pointBackgroundColor: '#4CAF50', // Warna titik pada grafik
                            pointBorderColor: '#fff', // Warna border titik
                            pointBorderWidth: 2, // Lebar border titik
                            pointRadius: 6, // Ukuran titik
                            pointHoverRadius: 8, // Ukuran titik saat hover
                            pointHoverBackgroundColor: '#fff', // Warna titik saat hover
                            pointHoverBorderColor: '#4CAF50', // Border titik saat hover
                            pointHoverBorderWidth: 2,
                            lineTension: 0.4, // Kelembutan garis
                        },
                        {
                            label: 'Lowongan Belum Terverifikasi',
                            data: @json($jumlahLowonganBelumTerverifikasi), // Data lowongan belum terverifikasi per bulan
                            borderColor: '#FF9800', // Warna garis untuk lowongan belum terverifikasi
                            backgroundColor: 'rgba(255, 152, 0, 0.2)', // Warna latar belakang area grafik
                            fill: true, // Isi area di bawah garis
                            tension: 0.4, // Kurva garis
                            borderWidth: 4, // Lebar garis
                            pointBackgroundColor: '#FF9800', // Warna titik pada grafik
                            pointBorderColor: '#fff', // Warna border titik
                            pointBorderWidth: 2, // Lebar border titik
                            pointRadius: 6, // Ukuran titik
                            pointHoverRadius: 8, // Ukuran titik saat hover
                            pointHoverBackgroundColor: '#fff', // Warna titik saat hover
                            pointHoverBorderColor: '#FF9800', // Border titik saat hover
                            pointHoverBorderWidth: 2,
                            lineTension: 0.4, // Kelembutan garis
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Menghentikan menjaga aspek rasio default
                    plugins: {
                        tooltip: {
                            callbacks: {
                                title: function(tooltipItems) {
                                    // Menambahkan label yang lebih dinamis pada tooltip
                                    return tooltipItems[0].label + ' - Bulan ' + tooltipItems[0].label;
                                },
                                label: function(tooltipItem) {
                                    return 'Jumlah Lowongan: ' + tooltipItem.raw;
                                }
                            },
                            backgroundColor: 'rgba(0, 0, 0, 0.7)', // Background tooltip
                            titleColor: '#fff', // Warna judul tooltip
                            bodyColor: '#fff', // Warna teks tooltip
                            padding: 10,
                            borderRadius: 5,
                        },
                        legend: {
                            display: true, // Menampilkan legenda
                            position: 'top',
                            labels: {
                                fontColor: '#333', // Warna teks legenda
                                boxWidth: 20, // Ukuran kotak di legenda
                                padding: 20 // Padding antara item legenda
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 14,
                                    family: 'Arial, sans-serif'
                                }
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 14,
                                    family: 'Arial, sans-serif'
                                }
                            }
                        }
                    }
                }
            });
        </script>
        <script>
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
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    cutout: '40%', // Membuat grafik berbentuk donut
                }
            });
        </script>
    </div>
@endsection
