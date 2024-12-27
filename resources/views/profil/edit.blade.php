@extends('layouts.app')  <!-- Atau layout Anda yang lain -->

@section('content')
<div class="container">
    <h2>Edit Profil Admin</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $admin->name) }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="admin_nohp" class="col-md-4 col-form-label text-md-end">No HP</label>
            <div class="col-md-6">
                <input id="admin_nohp" type="text" class="form-control @error('admin_nohp') is-invalid @enderror" name="admin_nohp" value="{{ old('admin_nohp', $admin->nohp) }}" required>
                @error('admin_nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $admin->email) }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Konfirmasi Password</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="row mb-3">
            <label for="login_history" class="col-md-4 col-form-label text-md-end">Login History</label>
            <div class="col-md-6">
                <textarea id="login_history" class="form-control" rows="4" disabled>{{ $admin->login_history }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="logout_history" class="col-md-4 col-form-label text-md-end">Logout History</label>
            <div class="col-md-6">
                <textarea id="logout_history" class="form-control" rows="4" disabled>{{ $admin->logout_history }}</textarea>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Update Profil
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
