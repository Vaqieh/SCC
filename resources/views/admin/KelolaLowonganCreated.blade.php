@extends('layouts.admin', ['title' => 'Tambah Lowongan'])

@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Lowongan</h5>
        <div class="card-body">
            <form action="{{ route('kelolalowongan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Admin -->
                <div class="form-group mt-1 mb-3">
                    <label for="admin_nama">Nama Admin</label>
                    <input type="text" class="form-control" id="admin_nama" name="admin_nama" value="{{ auth()->user()->name }}" readonly>
                </div>

                <!-- Nama Perusahaan -->
                <div class="form-group mt-3">
                    <label for="perusahaan_id">Nama Perusahaan</label>
                    <select name="perusahaan_id" id="perusahaan_id" class="form-select">
                        @foreach ($listPerusahaan as $perusahaan)
                            <option value="{{ $perusahaan->id }}">{{ $perusahaan->p_nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Nama Lowongan -->
                <div class="form-group mt-3">
                    <label for="nama_lowongan">Nama Lowongan</label>
                    <input type="text" class="form-control" id="nama_lowongan" name="nama_lowongan" required>
                </div>

                <!-- Status Lowongan -->
                <div class="form-group mt-3">
                    <label for="status_lowongan">Status Lowongan</label>
                    <select name="status_lowongan" class="form-control" id="status_lowongan" required>
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>

                <!-- Tanggal Buka dan Tanggal Berakhir -->
                <div class="form-group mt-3">
                    <label for="tanggal_buat">Tanggal Buka</label>
                    <input type="date" name="tanggal_buat" id="tanggal_buat" class="form-control" required>
                </div>
                <!-- Tanggal Verifikasi dan Tanggal Berakhir -->
                <div class="form-group mt-3">
                    <label for="tanggal_verifikasi">Tanggal Verifikasi</label>
                    <input type="date" name="tanggal_verifikasi" id="tanggal_verifikasi" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label for="tanggal_berakhir">Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" required>
                </div>
                <!-- Pengalaman KerjA -->
                <div class="form-group mt-3">
                    <label for="pengalaman_kerja">Pengalaman Kerja</label>
                    <input type="text" class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" required>
                </div>
                <!--Pendidikan-->
                <div class="form-group mt-3">
                    <label for="pendidikan">Pendidikan Minimal</label>
                    <select class="form-control" id="pendidikan" name="pendidikan" required>
                        <option value="">Pilih Pendidikan Minimal</option>
                        <option value="D3">Diploma 3 (D3)</option>
                        <option value="D4">Diploma 4 (D4)</option>
                        <option value="S1">Strata 1 (S1)</option>
                        <option value="S2">Strata 2 (S2)</option>
                        <option value="S3">Strata 3 (S3)</option>
                    </select>
                </div>
                
                <!-- Gambar Lowongan -->
                <div class="form-group mt-3">
                    <label for="gambar_lowongan">Upload Gambar Lowongan</label>
                    <input type="file" name="gambar_lowongan" class="form-control" id="gambar_lowongan" accept="image/*">
                </div>

                <div class="form-group mt-3">
                    <label for="detail">Detail</label>
                    <input type="text" name="detail" id="detail" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah Lowongan</button>
            </form>
        </div>
    </div>
@endsection
