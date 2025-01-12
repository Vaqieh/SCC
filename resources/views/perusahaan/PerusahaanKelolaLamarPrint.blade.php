@extends('layouts.admin', ['title' => 'Print Lamaran'])

@section('content')
    <style>
        @media print {
            .d-print-none {
                display: none !important;
            }

            body {
                font-size: 14px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table th, table td {
                padding: 8px;
                text-align: left;
                border: 1px solid #ddd;
            }

            .invoice {
                border: 1px solid #ddd;
                padding: 15px;
                margin-top: 20px;
            }

            .invoice-header {
                margin-bottom: 20px;
            }

            .invoice-header h4 {
                margin-bottom: 10px;
                font-size: 24px;
            }

            .invoice-header .logo {
                width: 100px;
            }

            .table-responsive {
                margin-top: 20px;
            }

            .footer {
                margin-top: 30px;
                text-align: center;
                font-size: 14px;
            }

            .summary {
                font-weight: bold;
            }
        }
    </style>

    <div class="d-flex gap-3 mb-4 d-print-none">
        <button onclick="javascript:window.print()" class="btn btn-outline-secondary d-none d-md-block btn-icon">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="invoice">
                <div class="invoice-header d-md-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4>Detail Lamaran - {{ $lowongan->nama_lowongan }}</h4>
                    </div>
                    <div>
                        <img src="{{ asset('image/logo_scc (1).png') }}" alt="Logo" class="logo">
                    </div>
                </div>

                @foreach ($lamarans as $lamaran)
                    <div class="row">
                        <div class="col-md-6">
                            @if ($lamaran->pelamar)  <!-- Mengecek apakah pelamar ada -->
                                <p><strong>Nama Pelamar:</strong> {{ $lamaran->pelamar->NamaPelamar }}</p>
                                <p>Email: {{ $lamaran->pelamar->email }}</p>
                                <p>Alamat: {{ $lamaran->pelamar->Alamat }}</p>
                                <p>Tanggal Lahir: {{ \Carbon\Carbon::parse($lamaran->pelamar->TanggalLahir)->format('d/m/Y') }}</p>
                                <p>Jenis Kelamin: {{ $lamaran->pelamar->JenisKelamin }}</p>
                                <p>Kompetensi: {{ $lamaran->pelamar->Kompetensi }}</p>
                            @else
                                <p><strong>Nama Pelamar:</strong> Data tidak tersedia</p>
                                <p>Email: Data tidak tersedia</p>
                                <p>Alamat: Data tidak tersedia</p>
                                <p>Tanggal Lahir: Data tidak tersedia</p>
                                <p>Jenis Kelamin: Data tidak tersedia</p>
                                <p>Kompetensi: Data tidak tersedia</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <p><strong>Informasi Lamaran</strong></p>
                            <p><strong>Status Lamaran:</strong> {{ $lamaran->status }}</p>
                            <p><strong>Instansi:</strong> {{ $lamaran->instansi }}</p>
                            <p><strong>Tanggal Pengajuan:</strong> {{ \Carbon\Carbon::parse($lamaran->created_at)->format('d/m/Y') }}</p>
                            <p><strong>Sertifikat:</strong>
                                @if ($lamaran->sertifikat)
                                    <a href="{{ Storage::url($lamaran->sertifikat) }}" target="_blank">Download Sertifikat</a>
                                @else
                                    -
                                @endif
                            </p>
                            <p><strong>CV:</strong>
                                @if ($lamaran->cv)
                                    <a href="{{ Storage::url($lamaran->cv) }}" target="_blank">Download CV</a>
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach

                <div class="footer">
                    <p>&copy; {{ date('Y') }} Perusahaan XYZ - All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
@endsection
