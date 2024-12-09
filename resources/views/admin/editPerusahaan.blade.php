@extends('layouts.admin', ['title' => 'Edit Data Perusahaan'])

@section('content')
<div class="card">
    <h5 class="card-header">Edit Data Perusahaan : <b>{{ strtoupper($kelolaperusahaan->p_nama) }}</b></h5>
    <div class="card-body">

        <!-- Form Edit Data -->
        <form action="{{ route('kelolaperusahaan.update', $kelolaperusahaan->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <!-- Nama Perusahaan -->
            <div class="form-group mt-1 mb-3">
                <label for="p_nama">Nama Perusahaan</label>
                <input type="text" class="form-control @error('p_nama') is-invalid @enderror" id="p_nama" name="p_nama"
                    value="{{ old('p_nama', $kelolaperusahaan->p_nama) }}">
                @error('p_nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Perusahaan -->
            <div class="form-group mt-1 mb-3">
                <label for="email_perusahaan">Email Perusahaan</label>
                <input type="email" class="form-control @error('email_perusahaan') is-invalid @enderror" id="email_perusahaan"
                    name="email_perusahaan" value="{{ old('email_perusahaan', $kelolaperusahaan->email_perusahaan) }}">
                @error('email_perusahaan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Jenis Industri -->
            <div class="form-group mt-1 mb-3">
                <label for="jenis_industri">Jenis Industri</label>
                <input type="text" class="form-control @error('jenis_industri') is-invalid @enderror" id="jenis_industri"
                    name="jenis_industri" value="{{ old('jenis_industri', $kelolaperusahaan->jenis_industri) }}">
                @error('jenis_industri')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tahun Berdiri -->
            <div class="form-group mt-1 mb-3">
                <label for="p_tahunBerdiri">Tahun Berdiri</label>
                <input type="text" class="form-control @error('p_tahunBerdiri') is-invalid @enderror" id="p_tahunBerdiri"
                    name="p_tahunBerdiri" value="{{ old('p_tahunBerdiri', $kelolaperusahaan->p_tahunBerdiri) }}">
                @error('p_tahunBerdiri')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Negara -->
            <div class="form-group mt-1 mb-3">
                <label for="negara">Negara</label>
                <input type="text" class="form-control @error('negara') is-invalid @enderror" id="negara" name="negara"
                    value="{{ old('negara', $kelolaperusahaan->negara) }}">
                @error('negara')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Provinsi -->
            <div class="form-group mt-1 mb-3">
                <label for="provinsi">Provinsi</label>
                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi"
                    value="{{ old('provinsi', $kelolaperusahaan->provinsi) }}">
                @error('provinsi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kabupaten -->
            <div class="form-group mt-1 mb-3">
                <label for="kabupaten">Kabupaten</label>
                <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten"
                    value="{{ old('kabupaten', $kelolaperusahaan->kabupaten) }}">
                @error('kabupaten')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kota -->
            <div class="form-group mt-1 mb-3">
                <label for="kota">Kota</label>
                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota"
                    value="{{ old('kota', $kelolaperusahaan->kota) }}">
                @error('kota')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Button Update -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
