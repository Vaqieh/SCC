@extends('layouts.login')

@section('content')
    <div class="logo">
        <img src="{{ asset('image/logo_scc_white.png') }}" alt="Logo SCC">
    </div>

    <div class="login-header">
        <h2>Login Pelamar</h2>
        <p>Please sign in to your account</p>
    </div>

    <form class="login-form" action="{{ route('login.pelamar.submit') }}" method="POST">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button type="submit" class="btn-custom">Login</button>
    </form>

    <div class="text-link">
        <p>Forgot your password? <a href="{{ route('password.request') }}">Reset it here</a>.</p>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
        }
    </script>
@endsection
