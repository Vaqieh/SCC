@extends('layouts.login')

@section('content')
<main class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card">
        <div class="text-center">
            <img src="{{ asset('image/logo_scc (1).png') }}" alt="Sumatera Career Center" style="width: 150px;">
            <h4>Login Admixxxxxxxxxxxxxxxxxxxx</h4>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus>
            </div>

            <div>
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
            </div>

            <div>
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-custom">Login</button>
        </form>
    </div>

</main>

<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;
    }
</script>
@endsection
