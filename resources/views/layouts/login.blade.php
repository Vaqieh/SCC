<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <!-- Google Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins:400,600|Roboto:400,500&display=swap" rel="stylesheet">

    <!-- Vite CSS and JS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        /* Global Styles */
        body {
            background: #E3F2FD;
            /* Soft blue background */
            font-family: 'Poppins', sans-serif;
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
            background-color: #0277BD;
            /* Blue color */
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            top: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .main-header h1 {
            font-size: 28px;
            margin: 0;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .button-group {
            margin-top: 10px;
        }

        .button-group a {
            display: inline-block;
            background: #fff;
            color: #0277BD;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 8px;
            transition: background-color 0.3s, color 0.3s;
        }

        .button-group a:hover {
            background-color: #0277BD;
            color: #fff;
        }

        /* Card Container */
        .login-container {
            max-width: 420px;
            width: 100%;
            background: #c5e0f8;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 80px;
            /* Space from header */
        }

        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-header h2 {
            font-weight: 600;
            color: #0277BD;
        }

        .login-header p {
            color: #000000;
            font-size: 14px;
        }

        /* Form Styles */
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-control {
            border: 1px solid #ffffff;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0277BD;
            box-shadow: 0 0 5px rgba(2, 119, 189, 0.5);
            outline: none;
        }

        /* Button */
        .btn-custom {
            background-color: #0277BD;
            color: #fff;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .btn-custom:hover {
            background-color: #01579b;
            transform: translateY(-2px);
        }

        /* Links */
        .text-link {
            text-align: center;
            margin-top: 20px;
        }

        .text-link a {
            color: #0277BD;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .text-link a:hover {
            color: #01579b;
        }

        /* Logo */
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="main-header">
        <div class="header-content">
            <img src="ILanding/assets/imgimage/logo_scc.png" alt="SCC Logo" class="logo-img">
            <h1>SUMATERA CAREER CENTER</h1>
        </div>
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
