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
            color: #fff;
            padding: 15px 20px;
            position: fixed;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .header-left img {
            width: 150px;
            height: auto;
            margin-right: 15px;
        }

        .header-left h1 {
            font-size: 22px;
            margin: 0;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            padding-right: 20px;
        }

        .button-group a {
            display: inline-block;
            background: #fff;
            color: #0277BD;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 5px;
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
            margin-top: 100px;
        }

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
        <div class="header-left">
            <img src="{{ asset('image/logo_scc_white.png') }}" alt="Logo SCC">
            <h1>SUMATERA CAREER CENTER</h1>
        </div>
        <div class="button-group">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

    <!-- Login Form Container -->
    <div class="login-container">
        <div class="logo">
            <img src="{{ asset('image/logo_scc_white.png') }}" alt="Logo SCC">
        </div>

        <div class="login-header">
            <h2>Login Admin</h2>
            <p>Please sign in to your account</p>
        </div>

        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn-custom">Login</button>
        </form>

        <div class="text-link">
            <p>Forgot your password? <a href="#">Reset it here</a>.</p>
        </div>
    </div>
</body>

</html>
