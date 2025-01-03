@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Lowongan</h2>

        <form action="{{ route('kelolalowongan.update', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Lowongan -->
            <div class="form-group mt-3">
                <label for="nama_lowongan">Nama Lowongan</label>
                <input type="text" class="form-control @error('nama_lowongan') is-invalid @enderror" id="nama_lowongan"
                    name="nama_lowongan" value="{{ old('nama_lowongan', $lowongan->nama_lowongan) }}">
                @error('nama_lowongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Perusahaan -->
            <div class="form-group mt-3">
                <label for="perusahaan_id">Perusahaan</label>
                <select class="form-control @error('perusahaan_id') is-invalid @enderror" id="perusahaan_id"
                    name="perusahaan_id">
                    <option value="">Pilih Perusahaan</option>
                    @foreach ($listPerusahaan as $perusahaan)
                        <option value="{{ $perusahaan->id }}"
                            {{ $lowongan->perusahaan_id == $perusahaan->id ? 'selected' : '' }}>
                            {{ $perusahaan->p_nama }}
                        </option>
                    @endforeach
                </select>
                @error('perusahaan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Admin -->
            <div class="mb-3">
                <label for="admin_id" class="form-label">Admin</label>

                <!-- Pastikan listAdmin tidak null -->
                @if ($listAdmin)
                    <input type="hidden" name="admin_id" value="{{ $listAdmin->id }}">
                    <input type="text" class="form-control" value="{{ $listAdmin->admin_nama }}" disabled>
                @else
                    <p class="text-danger">Admin profil belum lengkap. Mohon lengkapi profil Anda untuk menggunakan fitur
                        ini.</p>
                @endif

                @error('admin_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Verifikasi -->
            <div class="form-group mt-3">
                <label for="tanggal_verifikasi">Tanggal Verifikasi</label>
                <input type="date" class="form-control @error('tanggal_verifikasi') is-invalid @enderror"
                    id="tanggal_verifikasi" name="tanggal_verifikasi"
                    value="{{ old('tanggal_verifikasi', $lowongan->tanggal_verifikasi ? $lowongan->tanggal_verifikasi->toDateString() : $tanggalVerifikasi) }}"
                    disabled>
                @error('tanggal_verifikasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- Status Lowongan -->
            <div class="form-group mt-3">
                <label for="status_lowongan">Status Lowongan</label>
                <select class="form-control @error('status_lowongan') is-invalid @enderror" id="status_lowongan"
                    name="status_lowongan">
                    <option value="menunggu"
                        {{ old('status_lowongan', $lowongan->status_lowongan) == 'menunggu' ? 'selected' : '' }}>Menunggu
                    </option>
                    <option value="diterima"
                        {{ old('status_lowongan', $lowongan->status_lowongan) == 'diterima' ? 'selected' : '' }}>Diterima
                    </option>
                    <option value="ditolak"
                        {{ old('status_lowongan', $lowongan->status_lowongan) == 'ditolak' ? 'selected' : '' }}>Ditolak
                    </option>
                </select>
                @error('status_lowongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Buat -->
            <div class="form-group mt-3">
                <label for="tanggal_buat">Tanggal Buat</label>
                <input type="date" class="form-control @error('tanggal_buat') is-invalid @enderror" id="tanggal_buat"
                    name="tanggal_buat"
                    value="{{ old('tanggal_buat', $lowongan->tanggal_buat ? $lowongan->tanggal_buat->toDateString() : '') }}">
                @error('tanggal_buat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Berakhir -->
            <div class="form-group mt-3">
                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                <input type="date" class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                    id="tanggal_berakhir" name="tanggal_berakhir"
                    value="{{ old('tanggal_berakhir', $lowongan->tanggal_berakhir ? $lowongan->tanggal_berakhir->toDateString() : '') }}">
                @error('tanggal_berakhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- Pendidikan -->
            <div class="form-group mt-3">
                <label for="pendidikan">Pendidikan Minimal</label>
                <select class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan">
                    <option value="D3" {{ old('pendidikan', $lowongan->pendidikan) == 'D3' ? 'selected' : '' }}>Diploma
                        3 (D3)</option>
                    <option value="D4" {{ old('pendidikan', $lowongan->pendidikan) == 'D4' ? 'selected' : '' }}>Diploma
                        4 (D4)</option>
                    <option value="S1" {{ old('pendidikan', $lowongan->pendidikan) == 'S1' ? 'selected' : '' }}>Strata
                        1 (S1)</option>
                    <option value="S2" {{ old('pendidikan', $lowongan->pendidikan) == 'S2' ? 'selected' : '' }}>Strata
                        2 (S2)</option>
                    <option value="S3" {{ old('pendidikan', $lowongan->pendidikan) == 'S3' ? 'selected' : '' }}>Strata
                        3 (S3)</option>
                </select>
                @error('pendidikan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pengalaman Kerja -->
            <div class="form-group mt-3">
                <label for="pengalaman_kerja">Pengalaman Kerja</label>
                <input type="text" class="form-control @error('pengalaman_kerja') is-invalid @enderror"
                    id="pengalaman_kerja" name="pengalaman_kerja"
                    value="{{ old('pengalaman_kerja', $lowongan->pengalaman_kerja) }}">
                @error('pengalaman_kerja')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Umur -->
            <div class="form-group mt-3">
                <label for="umur">Umur</label>
                <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur"
                    value="{{ old('umur', $lowongan->umur) }}">
                @error('umur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gambar Lowongan -->
            <div class="form-group mt-3">
                <label for="gambar_lowongan">Gambar Lowongan</label>
                <input type="file" class="form-control @error('gambar_lowongan') is-invalid @enderror"
                    id="gambar_lowongan" name="gambar_lowongan">
                @if ($lowongan->gambar_lowongan)
                    <img src="{{ asset('storage/' . $lowongan->gambar_lowongan) }}" width="100" class="mt-3">
                @endif
                @error('gambar_lowongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- File -->
            <div class="form-group mt-3">
                <label for="file">Dokumen Legal</label>
                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                    name="file">
                @if ($lowongan->file)
                    <a href="{{ asset('storage/' . $lowongan->file) }}" target="_blank" class="mt-3">Lihat File</a>
                @endif
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Detail -->
            <div class="form-group mt-3">
                <label for="detail">Detail Lowongan</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" rows="4">{{ old('detail', $lowongan->detail) }}</textarea>
                @error('detail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Button Submit -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('kelolalowongan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
