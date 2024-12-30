@extends('layouts.register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Responsive: menggunakan col-md-8 dan col-sm-12 -->

                <div class="logo">
                    <img src="{{ asset('image/logo_scc_white.png') }}" alt="Logo SCC">
                </div>

                <div class="register-header">
                    <h2>Register Pelamar</h2>
                    <p>Create a new account</p>
                </div>

                <form class="register-form" action="{{ route('register.pelamar.submit') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>

                    <!-- Input tersembunyi untuk role -->
                    <input type="hidden" name="role" value="pelamar">
                    <button type="submit" class="btn-custom">Register</button>
                </form>

                <div class="text-link">
                    <p>Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
                </div>


    </div>
</div>
@endsection
