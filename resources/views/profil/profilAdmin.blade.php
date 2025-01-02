@extends('layouts.admin', ['title' => 'Profil Admin'])

@section('content')
    <div class="content">
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-md-8">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="mb-4">
                            <div class="d-flex flex-column flex-md-row text-center text-md-start mb-3">
                                <figure class="me-4 flex-shrink-0">
                                    <!-- Foto profil -->
                                    <img width="100" class="rounded-pill"
                                        src="../cakeadmin/html/images/user/FotoAdmin.jpeg" alt="...">
                                </figure>
                                <div class="flex-fill">
                                    <h5 class="mb-3">{{ Auth::user()->name }}</h5>
                                    <p class="small text-muted mt-3">Lengkapi terlebih dahulu profil anda agar bisa mengakses semua fitur yang ada</p>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h6 class="card-title mb-4">Basic Information</h6>
                                    <form action="{{ route('perusahaan.profil.update') }}" method="POST">
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

                                            <!-- Kolom Kanan (Nomor HP, Role, Login History, Logout History) -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" name="phone_number"
                                                    value="{{ old('phone_number', $profile->admin_nohp ?? '') }}">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Role</label>
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::user()->role }}" disabled>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Login History</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $profile->login_history ?? 'Belum ada login history' }}"
                                                    disabled>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Logout History</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $profile->logout_history ?? 'Belum ada logout history' }}"
                                                    disabled>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mt-4 text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
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
