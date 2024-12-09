@extends('layouts.admin', ['title' => 'Tambah Data Perusahaan'])
@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Perusahaan</h5>
        <div class="card-body">
            <form action="/kelolaperusahaan" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="p_nama">Nama Perusahaan</label>
                    <input type="text" class="form-control @error('p_nama') is-invalid @enderror" id="p_nama"
                        name="p_nama" value="{{ old('p_nama') }}">
                    <span class="text-danger">{{ $errors->first('p_nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="email_perusahaan">Email Perusahaan</label>
                    <input type="email" class="form-control @error('email_perusahaan') is-invalid @enderror" id="email_perusahaan"
                        name="email_perusahaan" value="{{ old('email_perusahaan') }}">
                    <span class="text-danger">{{ $errors->first('email_perusahaan') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="jenis_industri">Jenis Industri</label>
                    <input type="text" class="form-control @error('jenis_industri') is-invalid @enderror" id="jenis_industri"
                        name="jenis_industri" value="{{ old('jenis_industri') }}">
                    <span class="text-danger">{{ $errors->first('jenis_industri') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="p_tahunBerdiri">Tahun Berdiri</label>
                    <input type="text" class="form-control @error('p_tahunBerdiri') is-invalid @enderror" id="p_tahunBerdiri"
                        name="p_tahunBerdiri" value="{{ old('p_tahunBerdiri') }}">
                    <span class="text-danger">{{ $errors->first('p_tahunBerdiri') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="negara">Negara</label>
                    <input type="text" class="form-control @error('negara') is-invalid @enderror" id="negara"
                        name="negara" value="{{ old('negara') }}">
                    <span class="text-danger">{{ $errors->first('negara') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi"
                        name="provinsi" value="{{ old('provinsi') }}">
                    <span class="text-danger">{{ $errors->first('provinsi') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten"
                        name="kabupaten" value="{{ old('kabupaten') }}">
                    <span class="text-danger">{{ $errors->first('kabupaten') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota"
                        name="kota" value="{{ old('kota') }}">
                    <span class="text-danger">{{ $errors->first('kota') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
