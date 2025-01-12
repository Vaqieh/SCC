@extends('layouts.app')

@section('content')
    <br><br><br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header text-center bg-primary text-white" style="padding: 20px;">
                        <h2 style="font-weight: bold; font-family: 'Poppins', sans-serif;">Form Lamaran Pekerjaan</h2>
                    </div>
                    <div class="card-body" style="padding: 30px; font-family: 'Roboto', sans-serif;">
                        <form action="{{ route('lamar.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Foto Profil Display -->
                            <div class="mb-3">
                                <strong>Foto Profil:</strong>
                                @if ($profile && $profile->foto)
                                    <img src="{{ asset('storage/' . $profile->foto) }}" width="100" class="mt-2">
                                @else
                                    <span>- Belum Ada Foto Profil</span>
                                @endif
                            </div>

                            <!-- Lowongan Pekerjaan (Disabled dan otomatis terisi) -->
                            <div class="mb-4">
                                <label for="lowongan_id" class="form-label">Lowongan Pekerjaan</label>
                                <!-- Input untuk menampilkan nama lowongan yang dipilih -->
                                <input type="text" class="form-control" id="lowongan_id_display"
                                    value="{{ $lowongan->nama_lowongan }}" disabled>

                                <!-- Input tersembunyi untuk mengirimkan lowongan_id -->
                                <input type="hidden" id="lowongan_id" name="lowongan_id" value="{{ $lowongan->id }}">
                            </div>


                            <!-- Nama Pelamar -->
                            <div class="mb-4">
                                <label for="NamaPelamar" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="NamaPelamar" name="NamaPelamar"
                                    value="{{ old('NamaPelamar', $profile->NamaPelamar ?? '') }}" disabled>
                                @error('NamaPelamar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Instansi -->
                            <div class="mb-4">
                                <label for="instansi" class="form-label">Instansi</label>
                                <input type="text" class="form-control" id="instansi" name="instansi"
                                    value="{{ old('instansi', $profile->instansi ?? '') }}" required>
                                @error('instansi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $profile->email ?? '') }}" disabled>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="mb-4">
                                <label for="TanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="TanggalLahir" name="TanggalLahir"
                                    value="{{ old('TanggalLahir', $profile->TanggalLahir ?? '') }}" required>
                                @error('TanggalLahir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="mb-4">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="Alamat" name="Alamat"
                                    value="{{ old('Alamat', $profile->Alamat ?? '') }}" required>
                                @error('Alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="mb-4">
                                <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" id="JenisKelamin" name="JenisKelamin">
                                    <option value="laki-laki"
                                        {{ old('JenisKelamin', $profile->JenisKelamin) == 'laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="perempuan"
                                        {{ old('JenisKelamin', $profile->JenisKelamin) == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('JenisKelamin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kompetensi -->
                            <div class="mb-4">
                                <label for="Kompetensi" class="form-label">Kompetensi</label>
                                <input type="text" class="form-control" id="Kompetensi" name="Kompetensi"
                                    value="{{ old('Kompetensi', $profile->Kompetensi ?? '') }}">
                                @error('Kompetensi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status (Disabled dan default "Menunggu") -->
                            <div class="mb-4">
                                <label for="Status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="Status" name="Status" value="Menunggu"
                                    disabled>
                                @error('Status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- CV Upload -->
                            <div class="mb-4">
                                <label for="cv" class="form-label">Upload CV</label>
                                <input type="file" class="form-control" id="cv" name="cv">
                                @error('cv')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sertifikat Upload -->
                            <div class="mb-4">
                                <label for="sertifikat" class="form-label">Upload Sertifikat</label>
                                <input type="file" class="form-control" id="sertifikat" name="sertifikat">
                                @error('sertifikat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Foto Profil -->
                            <div class="mb-4">
                                <label for="foto" class="form-label">Link Foto Profil</label>
                                <input type="text" class="form-control" id="foto" name="foto"
                                    value="{{ old('foto', $profile->foto ?? '') }}" disabled>
                                @error('foto')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Tombol Kirim -->
                            <div class="mb-4 text-center">
                                <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
@endsection
