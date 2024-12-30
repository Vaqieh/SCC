@extends('layouts.login')

@section('content')
{{-- Login Pelamar --}}


    <div class="login-header">
        <h2>Login Pelamar</h2>
        <p>Login terlebih dahulu jika ingin masuk ke web</p>
    </div>

    <form class="login-form" action="{{ route('login.pelamar') }}" method="GET">
        @csrf
        <button type="submit" class="btn-custom">Login</button>
    </form>

    <div class="text-link">
        <p>Belum punya akun?? <a href="{{ route('register.pelamar') }}">Daftar disini</a>.</p>
    </div>
@endsection

@section('content2')
{{-- Login Perusahaan --}}
<div class="login-header">
    <h2>Login Perusahaan</h2>
    <p>Login terlebih dahulu jika ingin masuk ke web</p>
</div>

<form class="login-form" action="{{ route('login.perusahaan') }}" method="GET">
    @csrf
    <button type="submit" class="btn-custom">Login</button>
</form>

<div class="text-link">
    <p>Belum punya akun?? <a href="{{ route('register.perusahaan') }}">Daftar disini</a>.</p>
</div>
@endsection
