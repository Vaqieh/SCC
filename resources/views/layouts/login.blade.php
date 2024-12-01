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

    <!-- Vite CSS dan JS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Warna biru untuk navbar */
        .navbar {
            background-color: #0386D0 !important;
            /* Biru tua */
            color: white;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        /* Warna biru muda untuk konten utama */
        body {
            background-color: #E5F0F9;
            /* Biru muda */
        }

        .card {
            background-color: #f0f9ff;
            /* Warna biru sangat muda untuk latar belakang */
            border-radius: 25px;
            /* Sudut bulat yang lebih lembut */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            /* Bayangan yang lembut dan modern */
            padding: 40px;
            /* Ruang ekstra di dalam card */
            max-width: 600px;
            /* Lebar card lebih besar */
            width: 100%;
            /* Pastikan card mengambil 100% ruang jika layar kecil */
            margin: 20px auto;
            /* Pusatkan card */
            border: 1px solid #dce8f0;
            /* Garis pinggir lembut */
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
            /* Efek melayang saat hover */
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            /* Bayangan lebih besar */
        }

        /* Gaya untuk header di dalam card */
        .card h4 {
            color: #004aad;
            /* Warna biru tua untuk teks header */
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        /* Gaya untuk form */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            /* Jarak antar elemen */
        }

        .form-control {
            border: 1px solid #dce8f0;
            /* Garis lembut */
            border-radius: 8px;
            /* Sudut melengkung */
            padding: 12px 15px;
            /* Ruang dalam yang cukup */
            font-size: 16px;
            /* Ukuran teks lebih besar */
            background-color: #ffffff;
            /* Latar belakang putih */
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
            /* Bayangan dalam */
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #004aad;
            /* Garis biru tua saat fokus */
            box-shadow: 0 0 5px rgba(0, 74, 173, 0.5);
            /* Efek glowing */
            outline: none;
            /* Hilangkan outline default */
        }

        /* Tombol login */
        .btn-custom {
            background-color: #004aad;
            /* Warna biru tua */
            color: #ffffff;
            /* Teks putih */
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-custom:hover {
            background-color: #00337a;
            /* Warna biru lebih gelap saat hover */
            transform: translateY(-2px);
            /* Efek naik sedikit */
        }

        /* Gaya untuk tautan */
        a.text-decoration-none {
            color: #004aad;
            font-size: 14px;
            text-decoration: underline;
            transition: color 0.3s;
        }

        a.text-decoration-none:hover {
            color: #00337a;
            /* Warna lebih gelap saat hover */
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="{{ asset('image/logo_scc (1).png') }}" alt="Logo SCC"
                    style="width: 80px; height: 30px; margin-right: 15px;">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Konten utama dari halaman login -->
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Vite JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
