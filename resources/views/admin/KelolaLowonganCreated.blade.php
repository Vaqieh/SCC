@extends('layouts.admin', ['title' => 'Tambah Lowongan'])

@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Lowongan</h5>
        <div class="card-body">
            <form action="{{ route('kelolalowongan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Admin -->
                <div class="form-group mt-3">
                    <label for="admin_nama">Nama Admin</label>
                    <div class="form-control-plaintext" id="admin_nama" style="color: #3399FF;">
                        {{ Auth::user()->name }}
                    </div>
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>



                <!-- Nama Perusahaan -->
                <div class="form-group mt-3">
                    <label for="perusahaan_id">Nama Perusahaan</label>
                    <select name="perusahaan_id" class="form-control select2" data-placeholder="Cari Perusahaan"
                        style="width: 100%;">
                        <option value="">-- Perusahaan --</option>
                        @foreach ($listPerusahaan as $perusahaan)
                            <option value="{{ $perusahaan->id }}" @selected(old('perusahaan_id') == $perusahaan->id)>
                                {{ $perusahaan->p_nama }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('perusahaan_id') }}</span>
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

                <!-- Tanggal Verifikasi -->
                <div class="form-group mt-3">
                    <label for="tanggal_verifikasi">Tanggal Verifikasi</label>
                    <input type="date" name="tanggal_verifikasi" id="tanggal_verifikasi" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label for="tanggal_berakhir">Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" required>
                </div>

                <!-- Pengalaman Kerja -->
                <div class="form-group mt-3">
                    <label for="pengalaman_kerja">Pengalaman Kerja</label>
                    <input type="text" class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" required>
                </div>

                <!-- Pendidikan -->
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

                <!-- Syarat Umur -->
                <div class="form-group mt-3">
                    <label for="umur">Syarat Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" required>
                </div>

                <!-- Detail -->
                <div class="form-group mt-3">
                    <label for="detail">Detail</label>
                    <input type="text" name="detail" id="detail" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Tambah Lowongan</button>
            </form>
        </div>
    </div>
@endsection
