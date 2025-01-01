@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tambah Panggilan Tes</h2>

        <form action="{{ route('kelolapanggilantes.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="lowongan_id">Lowongan</label>
                <select class="form-control @error('lowongan_id') is-invalid @enderror" id="lowongan_id" name="lowongan_id">
                    <option value="">Pilih Lowongan</option>
                    @forelse($listLowongan as $lowongan)
                        <option value="{{ $lowongan->id }}" {{ old('lowongan_id') == $lowongan->id ? 'selected' : '' }}>
                            {{ $lowongan->nama_lowongan }}
                        </option>
                    @empty
                        <option value="">Tidak ada lowongan</option>
                    @endforelse
                </select>
                @error('lowongan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="perusahaan_id">Perusahaan</label>
                <select class="form-control @error('perusahaan_id') is-invalid @enderror" id="perusahaan_id" name="perusahaan_id">
                    <option value="">Pilih Perusahaan</option>
                    @forelse($listPerusahaan as $perusahaan)
                        <option value="{{ $perusahaan->id }}" {{ old('perusahaan_id') == $perusahaan->id ? 'selected' : '' }}>
                            {{ $perusahaan->p_nama }}
                        </option>
                    @empty
                        <option value="">Tidak ada perusahaan</option>
                    @endforelse
                </select>
                @error('perusahaan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="admin_id">Admin</label>
                <select class="form-control @error('admin_id') is-invalid @enderror" id="admin_id" name="admin_id">
                    <option value="">Pilih Admin</option>
                    @forelse($listAdmin as $admin)
                        <option value="{{ $admin->id }}" {{ old('admin_id') == $admin->id ? 'selected' : '' }}>
                            {{ $admin->admin_nama }}
                        </option>
                    @empty
                        <option value="">Tidak ada admin</option>
                    @endforelse
                </select>
                @error('admin_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="nama">Nama Panggilan Tes</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="tanggal_pt">Tanggal Panggilan Tes</label>
                <input type="date" class="form-control @error('tanggal_pt') is-invalid @enderror" id="tanggal_pt" name="tanggal_pt" value="{{ old('tanggal_pt') }}">
                @error('tanggal_pt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="status">Status Panggilan Tes</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="">Pilih Status</option>
                    <option value="dibuka" {{ old('status') == 'dibuka' ? 'selected' : '' }}>Buka</option>
                    <option value="ditutup" {{ old('status') == 'ditutup' ? 'selected' : '' }}>Tutup</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kelolapanggilantes.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
