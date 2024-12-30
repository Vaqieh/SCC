<!DOCTYPE html>
<html lang="en">

<head>
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
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('iLanding/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('iLanding/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('iLanding/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('iLanding/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('iLanding/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('iLanding/assets/css/main.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: #add8e6;
        }

        nav {
            margin-bottom: 0 !important;
        }

        main {
            margin: 0;
            padding: 0;
        }

        footer {
            background-color: #f0f8ff; /* Warna biru muda */
            color: #333333;
            padding: 20px 0;
            font-family: 'Poppins', sans-serif;
        }

        footer .footer-top {
            padding-bottom: 20px;
            background-color: #f0f8ff; /* Warna biru muda */
            color: #333333;
            border-radius: 8px;
            padding: 15px;
        }

        footer h4 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        footer p,
        footer ul li a {
            font-size: 14px;
            color: #666666;
            text-decoration: none;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer ul li a:hover {
            color: #000000;
        }

        .social-links a {
            color: #666666;
            margin-right: 10px;
            font-size: 18px;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #000000;
        }

        .copyright {
            font-size: 14px;
            margin-top: 10px;
            background-color: #add8e6; /* Warna biru muda */
            color: #ffffff;
            padding: 10px;
            border-radius: 8px;
        }

        .copyright a {
            color: #ffffff;
            text-decoration: none;
        }

        .copyright a:hover {
            text-decoration: underline;
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
                                <img src="{{ url('image/logo_scc (1).png') }}" alt="Logo SCC">
                            </a>

                            <nav id="navmenu" class="navmenu">
                                <ul>
                                    <li><a href="#hero" class="active">Dashboard</a></li>
                                    <li><a href="#features">Lowongan</a></li>
                                    <li><a href="#about">Tentang Kami</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-link text-decoration-none">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                            </nav>
                        </div>
                    </header>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer id="footer" class="footer">
            <div class="container footer-top">
                <div class="row gy-1">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename">SCC</span>
                        </a>
                        <div class="footer-contact pt-6">
                            <p class="mt-1"><strong>Sumatera Career Center</strong> adalah Career Center
                                yang berpusat di Politeknik Caltex Riau. Tujuan kami adalah menjadi pusat informasi karir
                                yang lengkap dan terpercaya bagi para pencari kerja maupun perusahaan.</p>
                            <p><strong>Email:</strong> <span>pcr@gmail.com</span></p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Alamat Kantor</h4>
                        <ul>
                            <li><a href="#">Jl. Umban Sari (Patin) No. 1, Rumbai, Pekanbaru, Riau, Indonesia, 28265</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Kontak</h4>
                        <ul>
                            <li><a href="#">Telp: 08117574101 & (0761) - 554224</a></li>
                            <li>Email: scc@pcr.ac.id</li>
                        </ul>
                        <div class="social-links d-flex mt-4">
                            <a href="https://x.com/PolicaltexRiau?t=iCjcxmyAiSkfUWGWNS8RgA&s=09"><i class="bi bi-twitter"></i></a>
                            <a href="https://www.facebook.com/share/1Dy4mGBBr7/"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/scc.pcr?igsh=MW4ya3ZvcW9zYTA0cQ=="><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container copyright text-center mt-4">
                <p>&copy; <span>Copyright</span> <strong class="px-1 sitename">iLanding</strong> <span>All Rights Reserved</span></p>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </footer>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
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
    </div>
</body>

</html>
