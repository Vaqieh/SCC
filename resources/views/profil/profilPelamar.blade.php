@extends('layouts.app', ['title' => 'Profil Pelamar'])

@section('content')
    <br>
    <br>
    <br>

    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header text-center bg-primary text-white" style="padding: 20px;">
                        <h2 style="font-weight: bold; font-family: 'Poppins', sans-serif;">Profil Pelamar</h2>
                    </div>
                    <div class="card-body" style="padding: 30px; font-family: 'Roboto', sans-serif;">

                        <!-- Foto Profil -->
                        <div class="text-center mb-4">
                            <figure>
                                <img width="100" class="rounded-circle"
                                    src="{{ asset('storage/' . ($profile->foto ?? 'default.jpg')) }}" alt="Foto Profil"
                                    style="border-radius: 50%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            </figure>
                        </div>

                        <!-- Nama Pelamar -->
                        <div class="text-center mb-4">
                            <h5 style="font-weight: bold;">{{ Auth::user()->name }}</h5>
                            <p class="small text-muted">Lengkapi profil Anda untuk mengakses semua fitur.</p>
                        </div>

                        <!-- Form Profil Pelamar -->
                        <form action="{{ route('pelamar.profil.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-4">
                                <!-- Nama dan Email -->
                                <div class="col-md-6">
                                    <label for="NamaPelamar" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="NamaPelamar"
                                        value="{{ old('NamaPelamar', Auth::user()->name) }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', Auth::user()->email) }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <!-- Tanggal Lahir dan Jenis Kelamin -->
                                <div class="col-md-6">
                                    <label for="TanggalLahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="TanggalLahir"
                                        value="{{ old('TanggalLahir', $profile->TanggalLahir ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-control" name="JenisKelamin">
                                        <option value="laki-laki"
                                            {{ old('JenisKelamin', $profile->JenisKelamin ?? '') == 'laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="perempuan"
                                            {{ old('JenisKelamin', $profile->JenisKelamin ?? '') == 'perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <!-- Alamat dan Kompetensi -->
                                <div class="col-md-6">
                                    <label for="Alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="Alamat"
                                        value="{{ old('Alamat', $profile->Alamat ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="Kompetensi" class="form-label">Kompetensi</label>
                                    <input type="text" class="form-control" name="Kompetensi"
                                        value="{{ old('Kompetensi', $profile->Kompetensi ?? '') }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <!-- Sertifikat -->
                                <div class="col-md-6">
                                    <label for="sertifikat" class="form-label">Sertifikat</label>
                                    <input type="file" class="form-control" name="sertifikat[]" multiple>

                                    @if ($profile && $profile->sertifikat)
                                        <a href="{{ Storage::url($profile->sertifikat) }}" target="_blank"
                                            class="mt-2 d-block">Lihat Sertifikat</a>
                                    @else
                                        <p class="mt-2 text-muted">Sertifikat belum diupload.</p>
                                    @endif

                                    @error('sertifikat')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="instansi" class="form-label">Instansi</label>
                                    <input type="text" class="form-control" name="instansi"
                                        value="{{ old('instansi', $profile->Alamat ?? '') }}">
                                </div>
                            </div>

                            <!-- CV -->
                            <div class="col-md-12">
                                <label for="cv" class="form-label">Upload CV</label>
                                <input type="file" class="form-control" name="cv">

                                @if ($profile && $profile->cv)
                                    <a href="{{ Storage::url($profile->cv) }}" target="_blank" class="mt-2 d-block">Lihat
                                        CV</a>
                                @else
                                    <p class="mt-2 text-muted">CV belum diupload.</p>
                                @endif
                            </div>

                            <!-- Foto Profil -->
                            <div class="col-md-12 mt-3">
                                <label for="foto" class="form-label">Foto Profil</label>
                                <input type="file" class="form-control" name="foto">

                                @if ($profile && $profile->foto)
                                    <img src="{{ Storage::url($profile->foto) }}" width="100" class="mt-3">
                                @else
                                    <p class="mt-2 text-muted">Foto profil belum diupload.</p>
                                @endif
                            </div>



                            <!-- Button Submit -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="font-weight: bold; padding: 10px 30px;">Simpan Perubahan</button>
                            </div>
                        </form>

                        <!-- Card untuk Menampilkan File yang Ada -->
                        <div class="card mt-4">
                            <div class="card-header bg-secondary text-white text-center">
                                <h5>File yang Sudah Diupload</h5>
                            </div>
                            <div class="card-body">
                                <!-- Sertifikat -->
                                <div class="mb-3">
                                    <strong>Sertifikat:</strong>
                                    @if ($profile && $profile->sertifikat)
                                        @php
                                            // Mendekode array sertifikat yang disimpan dalam bentuk JSON
                                            $sertifikatPaths = json_decode($profile->sertifikat);
                                        @endphp
                                        
                                        @if ($sertifikatPaths)
                                            @foreach ($sertifikatPaths as $sertifikat)
                                                <a href="{{ Storage::url($sertifikat) }}" target="_blank" class="btn btn-info btn-sm">Lihat Sertifikat</a>
                                            @endforeach
                                        @else
                                            <span>- Belum Ada Sertifikat</span>
                                        @endif
                                    @else
                                        <span>- Belum Ada Sertifikat</span>
                                    @endif
                                </div>

                                <!-- CV -->
                                <div class="mb-3">
                                    <strong>CV:</strong>
                                    @if ($profile && $profile->cv)
                                        <a href="{{ url('/storage/cv/' . basename($profile->cv)) }}" target="_blank"
                                            class="btn btn-info btn-sm">Lihat CV</a>
                                    @else
                                        <span>- Belum Ada CV</span>
                                    @endif
                                </div>

                                <!-- Foto Profil -->
                                <div class="mb-3">
                                    <strong>Foto Profil:</strong>
                                    @if ($profile && $profile->foto)
                                        <img src="{{ asset('storage/' . $profile->foto) }}" width="100"
                                            class="mt-2">
                                    @else
                                        <span>- Belum Ada Foto Profil</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
@endsection
