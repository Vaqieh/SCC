@extends('layouts.admin')

@section('content')
    <div class="container">
        
        <h2 class="mb-4">Edit Panggilan Tes</h2>

        <div class="row">
            <!-- Kolom diatur lebih kecil dan di kiri (col-md-8 atau col-md-6) -->
            <div class="col-md-8">
                <form action="{{ route('kelolapanggilantes.update', $panggilanTes->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Lowongan -->
                    <div class="form-group mt-3">
                        <label for="lowongan_id">Lowongan</label>
                        <select class="form-control @error('lowongan_id') is-invalid @enderror" id="lowongan_id" name="lowongan_id">
                            <option value="">Pilih Lowongan</option>
                            @foreach($listLowongan as $lowongan)
                                <option value="{{ $lowongan->id }}" {{ old('lowongan_id', $panggilanTes->lowongan_id) == $lowongan->id ? 'selected' : '' }}>
                                    {{ $lowongan->nama_lowongan }}
                                </option>
                            @endforeach
                        </select>
                        @error('lowongan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Perusahaan -->
                    <div class="form-group mt-3">
                        <label for="perusahaan_id">Perusahaan</label>
                        <select class="form-control @error('perusahaan_id') is-invalid @enderror" id="perusahaan_id" name="perusahaan_id">
                            <option value="">Pilih Perusahaan</option>
                            @foreach($listPerusahaan as $perusahaan)
                                <option value="{{ $perusahaan->id }}" {{ old('perusahaan_id', $panggilanTes->perusahaan_id) == $perusahaan->id ? 'selected' : '' }}>
                                    {{ $perusahaan->p_nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('perusahaan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Admin -->
                    <div class="form-group mt-3">
                        <label for="admin_id">Admin</label>
                        <select class="form-control @error('admin_id') is-invalid @enderror" id="admin_id" name="admin_id">
                            <option value="">Pilih Admin</option>
                            @foreach($listAdmin as $admin)
                                <option value="{{ $admin->id }}" {{ old('admin_id', $panggilanTes->admin_id) == $admin->id ? 'selected' : '' }}>
                                    {{ $admin->admin_nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('admin_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Panggilan Tes -->
                    <div class="form-group mt-3">
                        <label for="nama">Nama Panggilan Tes</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $panggilanTes->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Panggilan Tes -->
                    <div class="form-group mt-3">
                        <label for="tanggal_pt">Tanggal Panggilan Tes</label>
                        <input type="date" class="form-control @error('tanggal_pt') is-invalid @enderror" id="tanggal_pt" name="tanggal_pt" value="{{ old('tanggal_pt', $panggilanTes->tanggal_pt) }}">
                        @error('tanggal_pt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group mt-3">
                        <label for="status">Status Panggilan Tes</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="dibuka" {{ old('status', $panggilanTes->status) == 'dibuka' ? 'selected' : '' }}>Buka</option>
                            <option value="ditutup" {{ old('status', $panggilanTes->status) == 'ditutup' ? 'selected' : '' }}>Tutup</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Button Submit -->
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kelolapanggilantes.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
