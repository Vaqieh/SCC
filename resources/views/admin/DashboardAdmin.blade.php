@extends('layouts.admin', ['title' => 'Dashboard Admin'])
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @php

        // Mengambil jumlah pelamar berdasarkan jenis kelamin
        $totalLaki = App\Models\KelolaPelamar::where('JenisKelamin', 'laki-laki')->count();
        $totalPerempuan = App\Models\KelolaPelamar::where('JenisKelamin', 'perempuan')->count();

        // Mengambil jumlah akun pelamar dan perusahaan
        $totalPelamar = App\Models\User::where('role', 'pelamar')->count();
        $totalPerusahaan = App\Models\User::where('role', 'perusahaan')->count();
        $totalEmail = App\Models\User::where('role', 'email')->count();

        // Mengambil jumlah lowongan yang sudah diverifikasi per bulan
        $lowonganTerverifikasiPerBulan = DB::table('lowongans')
            ->selectRaw('MONTH(tanggal_verifikasi) as bulan, YEAR(tanggal_verifikasi) as tahun, COUNT(*) as jumlah')
            ->whereNotNull('tanggal_verifikasi') // Pastikan hanya yang sudah diverifikasi
            ->groupBy(DB::raw('MONTH(tanggal_verifikasi)'), DB::raw('YEAR(tanggal_verifikasi)'))
            ->orderBy(DB::raw('YEAR(tanggal_verifikasi)'), 'asc')
            ->orderBy(DB::raw('MONTH(tanggal_verifikasi)'), 'asc')
            ->get();

        // Mengambil jumlah lowongan yang belum diverifikasi per bulan
        $lowonganBelumTerverifikasiPerBulan = DB::table('lowongans')
            ->selectRaw('MONTH(tanggal_buat) as bulan, YEAR(tanggal_buat) as tahun, COUNT(*) as jumlah')
            ->whereNull('tanggal_verifikasi') // Menampilkan hanya lowongan yang belum diverifikasi
            ->groupBy(DB::raw('MONTH(tanggal_buat)'), DB::raw('YEAR(tanggal_buat)'))
            ->orderBy(DB::raw('YEAR(tanggal_buat)'), 'asc')
            ->orderBy(DB::raw('MONTH(tanggal_buat)'), 'asc')
            ->get();

        // Menyiapkan data untuk grafik
        $bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $jumlahLowonganTerverifikasi = array_fill(0, 12, 0); // Menginisialisasi data jumlah lowongan terverifikasi dengan 0
        $jumlahLowonganBelumTerverifikasi = array_fill(0, 12, 0); // Menginisialisasi data jumlah lowongan belum terverifikasi dengan 0

        foreach ($lowonganTerverifikasiPerBulan as $item) {
            $bulanIndex = $item->bulan - 1;
            $jumlahLowonganTerverifikasi[$bulanIndex] = $item->jumlah;
        }

        foreach ($lowonganBelumTerverifikasiPerBulan as $item) {
            $bulanIndex = $item->bulan - 1;
            $jumlahLowonganBelumTerverifikasi[$bulanIndex] = $item->jumlah;
        }

    @endphp

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
                            <div class="display-7" id="laki-laki-percentage">48%</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-orange me-2 small"></i>
                                <span class="text-muted">Laki-laki</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="display-7" id="perempuan-percentage">30%</div>
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
                            <div class="display-7" id="pelamar-percentage">48%</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-orange me-2 small"></i>
                                <span class="text-muted">Pelamar</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="display-7" id="perusahaan-percentage">30%</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-cyan me-2 small"></i>
                                <span class="text-muted">Perusahaan</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="display-7" id="email-percentage">22%</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-primary me-2 small"></i>
                                <span class="text-muted">Email</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card untuk grafik Line Chart (Jumlah Lowongan Terverifikasi Per Bulan) -->
        <div class="col-lg-12 col-md-12 col-sm-12">
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
    </div>

    <script>
        // Konfigurasi Chart.js untuk Grafik Pelamar Berdasarkan Jenis Kelamin
        var ctxPelamar = document.getElementById('pelamarChart').getContext('2d');
        var pelamarChart = new Chart(ctxPelamar, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $totalLaki }}, {{ $totalPerempuan }}],
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
                cutout: '40%',
            }
        });

        // Konfigurasi Chart.js untuk Grafik Jumlah Akun
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
    <div class="col-lg-4 col-md-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="display-7">
                        <i class="bi bi-basket"></i>
                    </div>
                    <div class="dropdown ms-auto">
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">View Detail</a>
                            <a href="#" class="dropdown-item">Download</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-3">Orders</h4>
                <div class="d-flex mb-3">
                    <div class="display-7">310</div>
                    <div class="ms-auto" id="total-orders"></div>
                </div>
                <div class="text-success">
                    Over last month 1.4% <i class="small bi bi-arrow-up"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="display-7">
                        <i class="bi bi-credit-card-2-front"></i>
                    </div>
                    <div class="dropdown ms-auto">
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">View Detail</a>
                            <a href="#" class="dropdown-item">Download</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-3">Sales</h4>
                <div class="d-flex mb-3">
                    <div class="display-7">$3.759,00</div>
                    <div class="ms-auto" id="total-sales"></div>
                </div>
                <div class="text-danger">
                    Over last month 2.4% <i class="small bi bi-arrow-down"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <h6 class="card-title">Recent Reviews</h6>
                    <div class="dropdown ms-auto">
                        <a href="#">View All</a>
                    </div>
                </div>
                <div class="summary-cards">
                    <div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar me-3">
                                <img src=" cakeadmin/images/user/women_avatar5.jpg" class="rounded-circle"
                                    alt="image">
                            </div>
                            <div>
                                <h5 class="mb-1">Amara Keel</h5>
                                <ul class="list-inline ms-auto mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-muted"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">(4)</li>
                                </ul>
                            </div>
                        </div>
                        <div>I love your products. It is very easy and fun to use this panel.</div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar me-3">
                                <span class="avatar-text bg-indigo rounded-circle">J</span>
                            </div>
                            <div>
                                <h5 class="mb-1">Johnath Siddeley</h5>
                                <ul class="list-inline ms-auto mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">(5)</li>
                                </ul>
                            </div>
                        </div>
                        <div>Very nice glasses. I ordered for my friend.</div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar me-3">
                                <span class="avatar-text bg-yellow rounded-circle">D</span>
                            </div>
                            <div>
                                <h5 class="mb-1">David Berks</h5>
                                <ul class="list-inline ms-auto mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </li>
                                    <li class="list-inline-item mb-0">(5)</li>
                                </ul>
                            </div>
                        </div>
                        <div>I am very satisfied with this product.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex mb-4">
                    <h6 class="card-title mb-0">Customer Rating</h6>
                    <div class="dropdown ms-auto">
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">View Detail</a>
                            <a href="#" class="dropdown-item">Download</a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="display-6">3.0</div>
                    <div class="d-flex justify-content-center gap-3 my-3">
                        <i class="bi bi-star-fill icon-lg text-warning"></i>
                        <i class="bi bi-star-fill icon-lg text-warning"></i>
                        <i class="bi bi-star-fill icon-lg text-warning"></i>
                        <i class="bi bi-star-fill icon-lg text-muted"></i>
                        <i class="bi bi-star-fill icon-lg text-muted"></i>
                        <span>(318)</span>
                    </div>
                </div>
                <div class="text-muted d-flex align-items-center justify-content-center">
                    <span class="text-success me-3 d-block">
                        <i class="bi bi-arrow-up me-1 small"></i>+35
                    </span> Point from last month
                </div>
                <div class="row my-4">
                    <div class="col-md-6 m-auto">
                        <div id="customer-rating"></div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-primary btn-icon">
                        <i class="bi bi-download"></i> Download Report
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card h-100 bg-purple">
            <div class="card-body text-center">
                <div class="text-white-50">
                    <div class="bi bi-box-seam display-6 mb-3"></div>
                    <div class="display-8 mb-2">Products Sold</div>
                    <h5>89 Sold</h5>
                </div>
                <div id="products-sold"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card widget h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">
                    Your Top Countries
                    <a href="#" class="bi bi-question-circle ms-1 small" data-bs-toggle="tooltip"
                        title="Sales performance revenue based by country"></a>
                </h5>
                <a href="#">View All</a>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <img width="45" class="me-3" src="cakeadmin/images/flags/united-states-of-america.svg"
                                alt="...">
                            <span>United States</span>
                        </div>
                        <span>$1.671,10</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <img width="45" class="me-3" src="cakeadmin/images/flags/venezuela.svg"
                                alt="...">
                            <span>Venezuela</span>
                        </div>
                        <span>$1.064,75</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <img width="45" class="me-3" src="cakeadmin/images/flags/salvador.svg" alt="...">
                            <span>Salvador</span>
                        </div>
                        <span>$1.055,98</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <img width="45" class="me-3" src="cakeadmin/images/flags/russia.svg" alt="...">
                            <span>Russia</span>
                        </div>
                        <span>$1.042,00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-12">
        <div class="card widget">
            <div class="card-header">
                <h5 class="card-title">Activity Overview</h5>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <div class="display-5">
                                <i class="bi bi-truck text-secondary"></i>
                            </div>
                            <h5 class="my-3">Delivered</h5>
                            <div class="text-muted">15 New Packages</div>
                            <div class="progress mt-3" style="height: 5px">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <div class="display-5">
                                <i class="bi bi-receipt text-warning"></i>
                            </div>
                            <h5 class="my-3">Ordered</h5>
                            <div class="text-muted">72 New Items</div>
                            <div class="progress mt-3" style="height: 5px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 67%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <div class="display-5">
                                <i class="bi bi-bar-chart text-info"></i>
                            </div>
                            <h5 class="my-3">Reported</h5>
                            <div class="text-muted">50 Support New Cases</div>
                            <div class="progress mt-3" style="height: 5px">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <div class="display-5">
                                <i class="bi bi-cursor text-success"></i>
                            </div>
                            <h5 class="my-3">Arrived</h5>
                            <div class="text-muted">34 Upgraded Boxed</div>
                            <div class="progress mt-3" style="height: 5px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 55%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-12">
        <div class="card widget">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">Recent Products</h5>
                <div class="dropdown ms-auto">
                    <a href="#" data-bs-toggle="dropdown" class="btn btn-sm btn-floating" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted">Products added today. Click <a href="#">here</a> for more details</p>
                <div class="table-responsive">
                    <table class="table table-custom mb-0" id="recent-products">
                        <thead>
                            <tr>
                                <th>
                                    <input class="form-check-input select-all" type="checkbox"
                                        data-select-all-target="#recent-products" id="defaultCheck1">
                                </th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="cakeadmin/images/products/10.jpg" class="rounded" width="40"
                                            alt="...">
                                    </a>
                                </td>
                                <td>Cookie</td>
                                <td>
                                    <span class="text-danger">Out of Stock</span>
                                </td>
                                <td>$10,50</td>
                                <td class="text-end">
                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item">Action</a>
                                                <a href="#" class="dropdown-item">Another action</a>
                                                <a href="#" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="cakeadmin/images/products/7.jpg" class="rounded" width="40"
                                            alt="...">
                                    </a>
                                </td>
                                <td>Glass</td>
                                <td>
                                    <span class="text-success">In Stock</span>
                                </td>
                                <td>$70,20</td>
                                <td class="text-end">
                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item">Action</a>
                                                <a href="#" class="dropdown-item">Another action</a>
                                                <a href="#" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="cakeadmin/images/products/8.jpg" class="rounded" width="40"
                                            alt="...">
                                    </a>
                                </td>
                                <td>Headphone</td>
                                <td>
                                    <span class="text-success">In Stock</span>
                                </td>
                                <td>$870,50</td>
                                <td class="text-end">
                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item">Action</a>
                                                <a href="#" class="dropdown-item">Another action</a>
                                                <a href="#" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="cakeadmin/images/products/9.jpg" class="rounded" width="40"
                                            alt="...">
                                    </a>
                                </td>
                                <td>Perfume</td>
                                <td>
                                    <span class="text-success">In Stock</span>
                                </td>
                                <td>$170,50</td>
                                <td class="text-end">
                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item">Action</a>
                                                <a href="#" class="dropdown-item">Another action</a>
                                                <a href="#" class="dropdown-item">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
