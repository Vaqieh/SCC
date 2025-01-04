@extends('layouts.perusahaan', ['title' => 'Profil Perusahaan'])

@section('content')
<div class="content">
    <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-8">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="mb-4">
                        <div class="d-flex flex-column flex-md-row text-center text-md-start mb-3">
                            <figure class="me-4 flex-shrink-0">
                                <!-- Foto Profil dengan CSS -->
                                <img src="{{ asset('storage/' . ($profile->foto ?? 'default.jpg')) }}"
                                     alt="Foto Profil" class="profile-picture">
                            </figure>
                            <div class="flex-fill">
                                <h5 class="mb-3">{{ Auth::user()->name }}</h5>
                                <p class="small text-muted mt-3">Lengkapi Profil anda terlebih dahulu agar bisa mengakses semua fitur</p>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Basic Information</h6>
                                <form action="{{ route('perusahaan.profil.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <!-- Kolom Kiri (Nama dan Email) -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name', Auth::user()->name) }}" disabled>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email', Auth::user()->email) }}" disabled>
                                        </div>

                                        <!-- Kolom Kanan (Jenis Industri, Tahun Berdiri) -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Jenis Industri</label>
                                            <input type="text" class="form-control" name="jenis_industri"
                                                value="{{ old('jenis_industri', $profile->jenis_industri ?? '') }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tahun Berdiri</label>
                                            <input type="number" class="form-control" name="p_tahunBerdiri"
                                                value="{{ old('p_tahunBerdiri', $profile->p_tahunBerdiri ?? '') }}">
                                        </div>

                                        <!-- Lokasi -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Negara</label>
                                            <input type="text" class="form-control" name="negara"
                                                value="{{ old('negara', $profile->negara ?? '') }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Provinsi</label>
                                            <input type="text" class="form-control" name="provinsi"
                                                value="{{ old('provinsi', $profile->provinsi ?? '') }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Kabupaten</label>
                                            <input type="text" class="form-control" name="kabupaten"
                                                value="{{ old('kabupaten', $profile->kabupaten ?? '') }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Kota</label>
                                            <input type="text" class="form-control" name="kota"
                                                value="{{ old('kota', $profile->kota ?? '') }}">
                                        </div>

                                        <!-- Foto Profil (pindah ke bawah) -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Foto Profil</label>
                                            <input type="file" class="form-control" name="foto">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
