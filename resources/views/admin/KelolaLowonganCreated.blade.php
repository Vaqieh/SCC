@extends('layouts.admin', ['title' => 'Tambah Lowongan'])

@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Lowongan</h5>
        <div class="card-body">
            <form action="{{ route('kelolalowongan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf



                <!-- Form Admin -->
                <div class="mb-3">
                    <label for="admin_id" class="form-label">Admin</label>

                    <!-- Pastikan listAdmin tidak null -->
                    @if ($listAdmin)
                        <!-- Input hidden untuk mengirimkan admin_id -->
                        <input type="hidden" name="admin_id" value="{{ $listAdmin->id }}">

                        <!-- Nama admin yang sedang login (hanya ditampilkan) -->
                        <input type="text" class="form-control" value="{{ $listAdmin->admin_nama }}" disabled>
                    @else
                        <p class="text-danger">Admin profil belum lengkap. Mohon lengkapi profil Anda untuk menggunakan
                            fitur ini.</p>
                    @endif

                    @error('admin_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Form Perusahaan -->
                <div class="mb-3">
                    <label for="perusahaan_id" class="form-label">Nama Perusahaan</label>
                    <select name="perusahaan_id" id="perusahaan_id" class="form-control" required>
                        <option value="">-- Pilih Perusahaan --</option>
                        @foreach ($listPerusahaan as $perusahaan)
                            <option value="{{ $perusahaan->id }}">{{ $perusahaan->p_nama }}</option>
                        @endforeach
                    </select>

                    @error('perusahaan_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Nama Lowongan -->
                <div class="form-group mt-3">
                    <label for="nama_lowongan">Nama Lowongan</label>
                    <input type="text" class="form-control" id="nama_lowongan" name="nama_lowongan" required>
                </div>

                <!-- Status Lowongan -->
                <div class="form-group mt-3">
                    <label for="status_lowongan">Status Panggilan Tes</label>
                    <select class="form-control @error('status_lowongan') is-invalid @enderror" id="status_lowongan" name="status_lowongan">
                        <option value="">Pilih Status Lowongan</option>
                        <option value="diterima" {{ old('status_lowongan') == 'diterima' ? 'selected' : '' }}>Terima</option>
                        <option value="ditolak" {{ old('status_lowongan') == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                    </select>
                    @error('status_lowongan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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

                <!-- Tanggal Verifikasi -->
                <div class="mb-3">
                    <label for="tanggal_verifikasi" class="form-label">Tanggal Verifikasi</label>
                    @if (!$listPerusahaan)
                        <div class="mb-3">
                            <label for="tanggal_verifikasi" class="form-label">Tanggal Verifikasi</label>
                            <input type="date" name="tanggal_verifikasi" class="form-control">
                            @error('tanggal_verifikasi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                        <!-- Jika yang login adalah perusahaan, tanggal_verifikasi disabled dan diberi class untuk efek abu-abu -->
                        <input type="date" name="tanggal_verifikasi" class="form-control" disabled>
                    @endif
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
                <!-- Gambar Lowongan -->
                <div class="form-group mt-3">
                    <label for="file">Upload Dokumen Legal</label>
                    <input type="file" name="file" class="form-control" id="file" accept="file/*">
                </div>

                <!-- Kuota -->
                <div class="form-group mt-3">
                    <label for="kuota">Kuota</label>
                    <input type="number" class="form-control" id="kuota" name="kuota" required>
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
