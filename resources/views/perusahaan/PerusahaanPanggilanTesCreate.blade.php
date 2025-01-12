@extends('layouts.perusahaan')

@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Panggilan Tes</h5>
        <div class="card-body">
            <form action="{{ route('kelolapanggilantesperusahaan.store') }}" method="POST">
                @csrf

                <!-- Form Lowongan -->
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

                <!-- Form Perusahaan (Disabled dan diisi dengan nama perusahaan yang sedang login) -->
                <div class="form-group mt-3">
                    <label for="perusahaan_id">Perusahaan</label>
                    <input type="text" class="form-control" id="perusahaan_id" value="{{ $perusahaan->p_nama }}" disabled>
                    <input type="hidden" name="perusahaan_id" value="{{ $perusahaan->id }}">
                </div>

                <!-- Form Admin (Disabled dan bernilai "N/A") -->
                <div class="form-group mt-3">
                    <label for="admin_id">Admin</label>
                    <input type="text" class="form-control" value="N/A" disabled>
                    <input type="hidden" name="admin_id" value="">
                </div>

                <!-- Nama Panggilan Tes -->
                <div class="form-group mt-3">
                    <label for="nama">Nama Panggilan Tes</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Panggilan Tes -->
                <div class="form-group mt-3">
                    <label for="tanggal_pt">Tanggal Panggilan Tes</label>
                    <input type="date" class="form-control @error('tanggal_pt') is-invalid @enderror" id="tanggal_pt" name="tanggal_pt" value="{{ old('tanggal_pt') }}">
                    @error('tanggal_pt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status Panggilan Tes -->
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

                <!-- Tombol Submit dan Batal -->
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('kelolapanggilantesperusahaan.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
