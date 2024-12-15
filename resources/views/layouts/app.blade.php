<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Index - iLanding Bootstrap Template</title>
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Favicons -->
<link href="{{ asset('iLanding/assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('iLanding/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('iLanding/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('iLanding/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('iLanding/assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('iLanding/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('iLanding/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Main CSS File -->
<link href="{{ asset('iLanding/assets/css/main.css') }}" rel="stylesheet">

<!-- =======================================================
  * Template Name: iLanding
  * Template URL: https://bootstrapmade.com/ilanding-bootstrap-landing-page-template/
  * Updated: Nov 12 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <style>
        /* Atur margin dan padding agar tidak ada jarak */
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: #add8e6;
            /* Background untuk keseluruhan halaman */
        }

        nav {
            margin-bottom: 0 !important;
            /* Hilangkan margin bawah dari nav */
        }

        main {
            margin: 0;
            padding: 0;
        }

        .card {
            border-radius: 15px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md shadow-sm mb-0" style="background-color: #9CD5FF;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <header id="header" class="header d-flex align-items-center fixed-top">
                        <div
                            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

                            <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
                                <!-- Uncomment the line below if you also wish to use an image logo -->
                                <!-- <img src="ilanding/img/logo.png" alt=""> -->
                                <img src="{{ url('image/logo_scc (1).png') }}" alt="Logo SCC">

                            </a>

                            <nav id="navmenu" class="navmenu">
                                <ul>
                                    <li><a href="#hero" class="active">Dashboard</a></li>
                                    <li><a href="#hero">Lowongan</a></li>
                                    <li><a href="#about">Tentang Kami</a></li>
                                </ul>
                                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                            </nav>
                        </div>
                        </header>
                        <!-- Content -->
                        <main>
                            @yield('content')
                        </main>

                        <footer id="footer" class="footer">

                            <div class="container footer-top">
                                <div class="row gy-1">
                                    <div class="col-lg-4 col-md-6 footer-about">
                                        <a href="index.html" class="logo d-flex align-items-center">
                                            <span class="sitename">SCC</span>
                                        </a>
                                        <div class="footer-contact pt-6">
                                            <p class="mt-1"><strong>Sumatera Career Center</strong> adalah Career
                                                Center
                                                yang berpusat di
                                                Politeknik Caltex Riau. Tujuan kami adalah menjadi pusat informasi karir
                                                yang lengkap dan terpercaya bagi para
                                                pencari kerja maupun perusahaan.
                                                <span></span>
                                            </p>
                                            <p><strong>Email:</strong> <span>pcr@gmail.com</span></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 footer-links">
                                        <h4>Alamat Kantor</h4>
                                        <ul>
                                            <li><a href="#">Jl. Umban Sari (Patin) No. 1

                                                    Rumbai, Pekanbaru, Riau

                                                    Indonesia

                                                    28265</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-md-6 footer-links">
                                        <h4>Kontak</h4>
                                        <ul>
                                            <li><a href="#">Telp : 08117574101 & (0761) - 554224/a></li>
                                            <li> Email : scc@pcr.ac.id </li>
                                        </ul>
                                        <div class="social-links d-flex mt-4">
                                            <a href=""><i class="bi bi-twitter-x"></i></a>
                                            <a href=""><i class="bi bi-facebook"></i></a>
                                            <a href=""><i class="bi bi-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container copyright text-center mt-4">
                                <p>© <span>Copyright</span> <strong class="px-1 sitename">iLanding</strong> <span>All
                                        Rights Reserved</span>
                                </p>
                                <div class="credits">
                                    <!-- All the links in the footer should remain intact. -->
                                    <!-- You can delete the links only if you've purchased the pro version. -->
                                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div>
                            </div>

                        </footer>

                        <!-- Scroll Top -->
                        <a href="#" id="scroll-top"
                            class="scroll-top d-flex align-items-center justify-content-center"><i
                                class="bi bi-arrow-up-short"></i></a>

                        <!-- Vendor JS Files -->
                        <script src="{{ asset('iLanding/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                        <script src="{{ asset('iLanding/assets/vendor/php-email-form/validate.js') }}"></script>
                        <script src="{{ asset('iLanding/assets/vendor/aos/aos.js') }}"></script>
                        <script src="{{ asset('iLanding/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
                        <script src="{{ asset('iLanding/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
                        <script src="{{ asset('iLanding/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

                        <!-- Main JS File -->
                        <script src="{{ asset('iLanding/assets/js/main.js') }}"></script>
                        <!-- Right Side Of Navbar -->
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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin: 0; padding: 0;">
            @yield('content')
        </main>

    </div>
</body>

</html>
