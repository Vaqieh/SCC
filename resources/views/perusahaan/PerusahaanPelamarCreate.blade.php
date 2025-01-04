@extends('layouts.perusahaan', ['title' => 'Tambah Data Pelamar'])

@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Pelamar</h5>
        <div class="card-body">
            <form action="/kelolapelamar" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="NamaPelamar">Nama Pelamar</label>
                    <input type="text" class="form-control @error('NamaPelamar') is-invalid @enderror" id="NamaPelamar"
                        name="NamaPelamar" value="{{ old('NamaPelamar') }}">
                    <span class="text-danger">{{ $errors->first('NamaPelamar') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="TanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('TanggalLahir') is-invalid @enderror" id="TanggalLahir"
                        name="TanggalLahir" value="{{ old('TanggalLahir') }}">
                    <span class="text-danger">{{ $errors->first('TanggalLahir') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="instansi">Instansi</label>
                    <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi"
                        name="instansi" value="{{ old('instansi') }}">
                    <span class="text-danger">{{ $errors->first('instansi') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="JenisKelamin">Jenis Kelamin</label>
                    <select class="form-control @error('JenisKelamin') is-invalid @enderror" id="JenisKelamin"
                        name="JenisKelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki" {{ old('JenisKelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ old('JenisKelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('JenisKelamin') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="Alamat">Alamat</label>
                    <input type="text" class="form-control @error('Alamat') is-invalid @enderror" id="Alamat"
                        name="Alamat" value="{{ old('Alamat') }}">
                    <span class="text-danger">{{ $errors->first('Alamat') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="Kompetensi">Kompetensi</label>
                    <input type="text" class="form-control @error('Kompetensi') is-invalid @enderror" id="Kompetensi"
                        name="Kompetensi" value="{{ old('Kompetensi') }}">
                    <span class="text-danger">{{ $errors->first('Kompetensi') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="sertifikat">Sertifikat (Opsional)</label>
                    <input type="file" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat"
                        name="sertifikat">
                    <span class="text-danger">{{ $errors->first('sertifikat') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="cv">CV</label>
                    <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv"
                        name="cv">
                    <span class="text-danger">{{ $errors->first('cv') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="TanggalVerifikasi">Tanggal Verifikasi</label>
                    <input type="date" class="form-control @error('TanggalVerifikasi') is-invalid @enderror" id="TanggalVerifikasi"
                        name="TanggalVerifikasi" value="{{ old('TanggalVerifikasi') }}">
                    <span class="text-danger">{{ $errors->first('TanggalVerifikasi') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
