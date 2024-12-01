@extends('layouts.app')

@section('content')
<main class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card" style="width: 400px;">
        <div class="text-center mb-4">
            <img src="{{ asset('image/logo_scc (1).png') }}" alt="Sumatera Career Center" style="width: 150px;">
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
                <label class="form-check-label" for="showPassword">Show Password</label>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" style="border-radius: 25px; width: 100px;">
                    {{ __('Login') }}
                </button>
            </div>
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
