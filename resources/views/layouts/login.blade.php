<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <!-- Google Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Vite CSS and JS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        /* Global Styles */
        body {
            background: #f7f2eb; /* Warna biru solid */
            font-family: 'Nunito', sans-serif;
            color: #333;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Header */
        .main-header {
            width: 100%;
            background-color: #0056b3;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            top: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .main-header h1 {
            font-size: 24px;
            margin: 0;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .button-group {
            margin-top: 10px;
        }

        .button-group a {
            display: inline-block;
            background: #fff;
            color: #0056b3;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .button-group a:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Card Container */
        .login-container {
            max-width: 400px;
            width: 100%;
            background: #7096D1;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-top: 100px; /* Memberi jarak dari header */
        }

        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header h2 {
            font-weight: bold;
            color: #007bff;
        }

        .login-header p {
            color: #666;
            font-size: 14px;
        }

        /* Form Styles */
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-control {
            border: 1px solid #dce8f0;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        /* Button */
        .btn-custom {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Links */
        .text-link {
            text-align: center;
            margin-top: 10px;
        }

        .text-link a {
            color: #007bff;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .text-link a:hover {
            color: #0056b3;
        }

        /* Logo */
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 80px;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="main-header">
        <h1>SUMATERA CAREER CENTER</h1>
        <div class="button-group">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

    <!-- Login Form Container -->
    <div class="login-container">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('image/logo_scc_white.png') }}" alt="Logo SCC">
        </div>

        <!-- Header -->
        <div class="login-header">
            <h2>Login Admin</h2>
            <p>Please sign in to your account</p>
        </div>

        <!-- Form -->
        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn-custom">Login</button>
        </form>

        <!-- Forgot Password Link -->
        <div class="text-link">
            <p>Forgot your password? <a href="#">Reset it here</a>.</p>
        </div>
    </div>
</body>

</html>
