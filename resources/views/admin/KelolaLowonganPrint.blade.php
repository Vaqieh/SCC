@extends('layouts.admin', ['title' => 'Lowongan Print'])

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
                    <h4>Daftar Lowongan</h4>
                </div>
                <div>
                    <img src="{{ asset('image/logo_scc (1).png') }}" alt="Logo" class="logo">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Perusahaan</strong></p>
                    <p>{{ $lowongan->perusahaan->p_nama }}</p>
                    <p>{{ $lowongan->perusahaan->kota }}, {{ $lowongan->perusahaan->provinsi }}</p>
                    <p>Email: {{ $lowongan->perusahaan->email_perusahaan }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Informasi Lowongan</strong></p>
                    <p><strong>Nama Lowongan:</strong> {{ $lowongan->nama_lowongan }}</p>
                    <p><strong>Status:</strong> {{ $lowongan->status_lowongan }}</p>
                    <p><strong>Tanggal Dibuat:</strong> {{ \Carbon\Carbon::parse($lowongan->tanggal_buat)->format('d/m/Y') }}</p>
                    <p><strong>Tanggal Berakhir:</strong> {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d/m/Y') }}</p>
                </div>
            </div>

            <hr class="my-4">

            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Pelamar</th>
                            <th>Email</th>
                            <th>Tanggal Lahir</th>
                            <th>Kompetensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelamars as $pelamar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelamar->NamaPelamar }}</td>
                            <td>{{ $pelamar->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($pelamar->TanggalLahir)->format('d/m/Y') }}</td>
                            <td>{{ $pelamar->Kompetensi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="summary">
                <p>Jumlah Pelamar: {{ $pelamars->count() }}</p>
                <p><strong>Total Kuota: </strong>{{ $lowongan->kuota }}</p>
                <p><strong>Deskripsi Lowongan:</strong> {{ $lowongan->detail }}</p>
            </div>

            <div class="footer">
                <p>&copy; {{ date('Y') }} Perusahaan XYZ - All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>

@endsection
