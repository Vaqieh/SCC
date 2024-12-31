@extends('layouts.register')

@section('content')
    {{-- Register Pelamar --}}


    <div class="register-header">
        <h2>Register Pelamar</h2>
        <p>Register terlebih dahulu jika ingin login</p>
    </div>

    <form class="register-form" action="{{ route('register.pelamar') }}" method="GET">
        @csrf
        <button type="submit" class="btn-custom">Register</button>
    </form>

@endsection

@section('content2')
    {{-- Register Perusahaan --}}
    <div class="register-header">
        <h2>Register Perusahaan</h2>
        <p>Register terlebih dahulu jika ingin login</p>
    </div>

    <form class="register-form" action="{{ route('register.perusahaan') }}" method="GET">
        @csrf
        <button type="submit" class="btn-custom">Register</button>
    </form>

@endsection
