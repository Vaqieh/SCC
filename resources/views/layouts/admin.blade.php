<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <title> CakeAdmin Bootstrap 5 Demo - Free Admin Template </title>

    <!-- Add this to include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('cakeadmin/html/favicon.png') }}" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('cakeadmin/html/libs/slick/slick.css') }}/" type="text/css">

    <!-- Main style file -->
    <link rel="stylesheet" href="{{ asset('cakeadmin/html/css/app.css') }}" type="text/css">
</head>

<body>
    <!-- preloader -->
    <div class="preloader">
        <img src="{{ asset('cakeadmin/html/logo.svg') }}" alt="logo">
        <div class="preloader-icon"></div>
    </div>
    <!-- ./ preloader -->

    <!-- sidebars -->


    <!-- settings sidebar -->
    <div class="sidebar" id="settings">
        <div class="sidebar-header">
            <div>
                <i class="bi bi-gear me-2"></i>
                Settings
            </div>
            <button data-sidebar-close>
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
        <div class="sidebar-content">
            <ul class="list-group list-group-flush">
                <li class="list-group-item px-0 border-0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1"
                            checked>
                        <label class="form-check-label" for="flexCheckDefault1">
                            Remember next visits
                        </label>
                    </div>
                </li>
                <li class="list-group-item px-0 border-0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2"
                            checked>
                        <label class="form-check-label" for="flexCheckDefault2">
                            Enable report generation.
                        </label>
                    </div>
                </li>
                <li class="list-group-item px-0 border-0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3"
                            checked>
                        <label class="form-check-label" for="flexCheckDefault3">
                            Allow notifications.
                        </label>
                    </div>
                </li>
                <li class="list-group-item px-0 border-0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                        <label class="form-check-label" for="flexCheckDefault4">
                            Hide user requests
                        </label>
                    </div>
                </li>
                <li class="list-group-item px-0 border-0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5"
                            checked>
                        <label class="form-check-label" for="flexCheckDefault5">
                            Speed up demands
                        </label>
                    </div>
                </li>
                <li class="list-group-item px-0 border-0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Hide menus
                        </label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidebar-action">
            <a href="#" class="btn btn-primary">All Settings</a>
        </div>
    </div>
    <!-- ./ settings sidebar -->

    <!-- search sidebar -->
    <div class="sidebar" id="search">
        <div class="sidebar-header" disabled>
            Search
            <button data-sidebar-close>
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
        <div class="sidebar-content">
            <form class="mb-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search"
                        aria-describedby="button-search-addon">
                    <button class="btn btn-outline-light" type="button" id="button-search-addon">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <h6 class="mb-3">Last searched</h6>
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <a href="#" class="avatar avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-search"></i>
                        </span>
                    </a>
                    <a href="#" class="flex-fill">Reports for 2021</a>
                    <a href="#" class="btn text-danger btn-sm" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <a href="#" class="avatar avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-search"></i>
                        </span>
                    </a>
                    <a href="#" class="flex-fill">Current users</a>
                    <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <a href="#" class="avatar avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-search"></i>
                        </span>
                    </a>
                    <a href="#" class="flex-fill">Meeting notes</a>
                    <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
            </div>
            <h6 class="mb-3">Recently viewed</h6>
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <a href="#" class="avatar avatar-secondary avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-check-circle"></i>
                        </span>
                    </a>
                    <a href="#" class="flex-fill">Todo list</a>
                    <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <a href="#" class="avatar avatar-warning avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-wallet2"></i>
                        </span>
                    </a>
                    <a href="#" class="flex-fill">Pricing table</a>
                    <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <a href="#" class="avatar avatar-info avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-gear"></i>
                        </span>
                    </a>
                    <a href="#" class="flex-fill">Settings</a>
                    <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <a href="#" class="avatar avatar-success avatar-sm me-3">
                        <span class="avatar-text rounded-circle">
                            <i class="bi bi-person-circle"></i>
                        </span>
                    </a>
                    <a href="#" class="flex-fill">Users</a>
                    <a href="#" class="btn" data-bs-toggle="tooltip" title="Remove">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-action">
            <a href="#" class="btn btn-danger">All Clear</a>
        </div>
    </div>
    <!-- ./ search sidebar -->

    <!-- ./ sidebars -->

    <!-- menu -->
    <div class="menu">
        <div class="menu-header">

            <a href="/admin/dashboard" class="menu-header-logo">
                <img src="{{ asset('image/logo_scc (1).png') }}" alt="logo" style="width: 110px; height: auto;">
                <span style="font-size: 20px;">Sumatera Carrer Center</span>
            </a>


            <a href="#" class="btn btn-sm menu-close-btn">
                <i class="bi bi-x"></i>
            </a>
        </div>
        <div class="menu-body">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                    <div class="avatar me-3">
                        <img src="../../cakeadmin/html/images/user/FotoAdmin.jpeg" class="rounded-circle" alt="Photo profile">
                    </div>
                    <div>
                        {{ Auth::user()->name }}
                        <br><small class="text-muted">{{ Auth::user()->role }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="/admin/profil" class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-person dropdown-item-icon"></i> Profil
                    </a>

                    <!-- Form logout dengan metode POST -->
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                            <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
                        </button>
                    </form>


                </div>
            </div>
            <ul>
                <li class="menu-divider">Dashboard</li>
                <li>
                    <a class="active" href="/admin/dashboard">
                        <span class="nav-link-icon">
                            <i class="bi bi-bar-chart"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi bi-receipt"></i>
                        </span>
                        <span>Kelola Perusahaan </span>
                    </a>
                    <ul>
                        <li>
                            <a href="/kelolaperusahaan">Data Perusahaan</a>
                        </li>
                        <li>
                            <a href="/kelolaperusahaan/create">Tambah Data Perusahaan </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <!-- Menggunakan ikon yang lebih sesuai, misalnya bi-clipboard-data -->
                            <i class="bi bi-clipboard-data"></i>
                        </span>
                        <span>Kelola Data Panggilan Tes</span>
                    </a>
                    <ul>
                        <li>
                            <a href="/kelolapanggilantes">Data Panggilan Tes</a>
                        </li>
                        <li>
                            <a href="/kelolapanggilantes/create">Tambah Data Panggilan Tes</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi-file-earmark-person"></i>
                        </span>
                        <span>Kelola Pelamar</span>
                    </a>
                    <ul>
                        <li>
                            <a href="/kelolapelamar">Daftar Pelamar</a>
                        </li>
                        <li>
                            <a href="/kelolapelamar/create">Tambah Pelamar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi bi-briefcase"></i>
                        </span>
                        <span>Kelola Lowongan </span>
                    </a>
                    <ul>
                        <li>
                            <a href="/kelolalowongan">Data Lowongan</a>
                        </li>
                        <li>
                            <a href="/kelolalowongan/create">Tambah Data Lowongan</a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi bi-wallet2"></i>
                        </span>
                        <span>Buyer</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ asset('cakeadmin/html/pages/buyer-dashboard.html') }}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ asset('cakeadmin/html/pages//buyer-orders.html') }}">Orders</a>
                        </li>
                        <li>
                            <a href="{{ asset('cakeadmin/html/pages/buyer-addresses.html') }}">Addresses</a>
                        </li>
                        <li>
                            <a href="./buyer-wishlist.html">Wishlist</a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="./customers.html">
                        <span class="nav-link-icon">
                            <i class="bi bi-person-badge"></i>
                        </span>
                        <span>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi bi-receipt"></i>
                        </span>
                        <span>Invoices</span>
                    </a>
                    <ul>
                        <li>
                            <a href="./invoices.html">List</a>
                        </li>
                        <li>
                            <a href="./invoice-detail.html">Detail</a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="menu-divider">Apps</li>
                <li>
                    <a href="./chats.html">
                        <span class="nav-link-icon">
                            <i class="bi bi-chat-square"></i>
                        </span>
                        <span>Chats</span>
                        <span class="badge bg-success rounded-circle ms-auto">2</span>
                    </a>
                </li>
                <li>
                    <a href="./email.html">
                        <span class="nav-link-icon">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <span>Email App</span>
                    </a>
                    <ul>
                        <li>
                            <a href="./email.html">
                                <span>Inbox</span>
                            </a>
                        </li>
                        <li>
                            <a href="./email.html-detail">
                                <span>Detail</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./todo-list.html">
                        <span class="nav-link-icon">
                            <i class="bi bi-check-circle"></i>
                        </span>
                        <span>Todo App</span>
                    </a>
                    <ul>
                        <li>
                            <a href="./todo-list.html">
                                <span>List</span>
                            </a>
                        </li>
                        <li>
                            <a href="./todo-detail.html">
                                <span>Details</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-divider">Pages</li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi bi-person"></i>
                        </span>
                        <span>Profile</span>
                    </a>
                    <ul>
                        <li>
                            <a href="./profile-posts.html">Post</a>
                        </li>
                        <li>
                            <a href="./profile-connections.html">Connections</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi bi-person-circle"></i>
                        </span>
                        <span>Users</span>
                    </a>
                    <ul>
                        <li>
                            <a href="./user-list.html">List View</a>
                        </li>
                        <li>
                            <a href="./user-grid.html">Grid View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi bi-lock"></i>
                        </span>
                        <span>Authentication</span>
                    </a>
                    <ul>
                        <li>
                            <a href="./login.html" target="_blank">Login</a>
                        </li>
                        <li>
                            <a href="./register.html" target="_blank">Register</a>
                        </li>
                        <li>
                            <a href="./reset-password.html" target="_blank">Reset Password</a>
                        </li>
                        <li>
                            <a href="./lock-screen.html" target="_blank">Lock Screen</a>
                        </li>
                        <li>
                            <a href="./account-verified.html" target="_blank">Account Verified</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-link-icon">
                            <i class="bi bi-exclamation-octagon"></i>
                        </span>
                        <span>Error Pages</span>
                    </a>
                    <ul>
                        <li>
                            <a href="./404.html" target="_blank">404</a>
                        </li>
                        <li>
                            <a href="./access-denied.html">Access Denied</a>
                        </li>
                        <li>
                            <a href="./under-construction.html" target="_blank">Under Construction</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./settings.html">
                        <span class="nav-link-icon">
                            <i class="bi bi-gear"></i>
                        </span>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="./pricing-table.html">
                        <span class="nav-link-icon">
                            <i class="bi bi-wallet2"></i>
                        </span>
                        <span>Pricing Table</span>
                        <span class="badge bg-success ms-auto">New</span>
                    </a>
                </li>
                <li>
                    <a href="./search-page.html">
                        <span class="nav-link-icon">
                            <i class="bi bi-search"></i>
                        </span>
                        <span>Search Page</span>
                    </a>
                </li>
                <li>
                    <a href="./faq.html">
                        <span class="nav-link-icon">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <span>FAQ</span>
                    </a>
                </li>
                <li class="menu-divider">Other</li>
                <li>
                    <a target="_blank" href="https://cakeadmin.com/bootstrap-docs/introduction">
                        <span class="nav-link-icon">
                            <i class="bi bi-file-earmark-medical"></i>
                        </span>
                        <span>Documentation</span>
                    </a>
                    <a target="_blank" href="https://github.com/bundui/cakeadmin">
                        <span class="nav-link-icon">
                            <i class="bi bi-github"></i>
                        </span>
                        <span>CakeAdmin Github</span>
                    </a>
                    <a target="_blank" href="https://cakeadmin.com">
                        <span class="nav-link-icon">
                            <i class="bi bi-file-person"></i>
                        </span>
                        <span>CakeAdmin About</span>
                    </a>
                    <a target="_blank" href="https://cakeadmin.com/contact">
                        <span class="nav-link-icon">
                            <i class="bi bi-person-raised-hand"></i>
                        </span>
                        <span>Support</span>
                    </a> --}}
                {{-- </li> --}}
            </ul>
        </div>
    </div>
    <!-- ./  menu -->

    <!-- layout-wrapper -->
    <div class="layout-wrapper">

        <!-- header -->
        <div class="header">
            <div class="menu-toggle-btn"> <!-- Menu close button for mobile devices -->
                <a href="#">
                    <i class="bi bi-list"></i>
                </a>
            </div>
            <!-- Logo -->
            <a href="./dashboard.html" class="logo">
                <img width="100" src="{{ asset('cakeadmin/html/logo.png') }}" alt="logo">
            </a>
            <!-- ./ Logo -->
            {{-- <div class="page-title">Dashboard</div> --}}
            <form class="search-form">
                <div class="input-group">
                    <button class="btn btn-outline-light" type="button" id="button-addon1">
                        <i class="bi bi-search"></i>
                    </button>
                    <input type="text" class="form-control" placeholder="Search..."
                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <a href="#" class="btn btn-outline-light close-header-search-bar">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
            </form>
            <div class="header-bar ms-auto">
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-notify" data-count="2"
                            data-sidebar-target="#notifications">
                            <i class="bi bi-bell icon-lg"></i>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a href="#" class="nav-link nav-link-notify" data-count="3" data-bs-toggle="dropdown">
                            <i class="bi bi-cart2 icon-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                            <h6 class="m-0 px-4 py-3 border-bottom">Shopping Cart</h6>
                            <div class="dropdown-menu-body">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex align-items-center">
                                        <a href="#" class="text-danger me-3" title="Remove">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="#" class="me-3 flex-shrink-0 ">
                                            <img src="{{ asset('cakeadmin/html/images/products/3.jpg') }}"
                                                class="rounded" width="60" alt="...">
                                        </a>
                                        <div>
                                            <h6>Digital clock</h6>
                                            <div>1 x $1.190,90</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex align-items-center">
                                        <a href="#" class="text-danger me-3" title="Remove">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="#" class="me-3 flex-shrink-0 ">
                                            <img src="{{ asset('cakeadmin/html/images/products/4.jpg') }}"
                                                class="rounded" width="60" alt="...">
                                        </a>
                                        <div>
                                            <h6>Toy Car</h6>
                                            <div>1 x $139.58</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex align-items-center">
                                        <a href="#" class="text-danger me-3" title="Remove">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="#" class="me-3 flex-shrink-0 ">
                                            <img src="{{ asset('cakeadmin/html/images/products/5.jpg') }}"
                                                class="rounded" width="60" alt="...">
                                        </a>
                                        <div>
                                            <h6>Sunglasses</h6>
                                            <div>2 x $50,90</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex align-items-center">
                                        <a href="#" class="text-danger me-3" title="Remove">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="#" class="me-3 flex-shrink-0 ">
                                            <img src="{{ asset('cakeadmin/html/images/products/6.jpg') }}"
                                                class="rounded" width="60" alt="...">
                                        </a>
                                        <div>
                                            <h6>Cake</h6>
                                            <div>1 x $10,50</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="m-0 px-4 py-3 border-top small">Sub Total : <strong
                                    class="text-primary">$1.442,78</strong></h6>
                        </div>
                    </li>
                    <li class="nav-item ms-3">
                        <button class="btn btn-primary btn-icon">
                            <i class="bi bi-plus-circle"></i> Create Report
                        </button>
                    </li> --}}
                </ul>
            </div>
            <!-- Header mobile buttons -->
            <div class="header-mobile-buttons">
                <a href="#" class="search-bar-btn">
                    <i class="bi bi-search"></i>
                </a>
                <a href="#" class="actions-btn">
                    <i class="bi bi-three-dots"></i>
                </a>
            </div>
            <!-- ./ Header mobile buttons -->
        </div>
        <!-- ./ header -->
        <div class="container-fluid">
            <!-- Cek apakah ada pesan error -->
            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Cek apakah ada pesan sukses -->
            @if (session()->has('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div>
            @yield('content')
        </div>

        <!-- content-footer -->
        <footer class="content-footer">
            <div><a href="https://cakeadmin.com" target="_blank">Sumatera Carrer Center</a> © 2024</div>

        </footer>
        <!-- ./ content-footer -->

    </div>
    <!-- ./ layout-wrapper -->

    <!-- JQuery -->
    <script src="{{ asset('cakeadmin/html/libs/jquery-3.7.1.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Nicescroll -->
    <script src="{{ asset('cakeadmin/html/libs/nicescroll.js') }}"></script>

    <!-- Apex chart -->
    <script src="{{ asset('cakeadmin/html/libs/charts/apex/apexcharts.min.js') }}"></script>

    <!-- Slick -->
    <script src="{{ asset('cakeadmin/html/libs/slick/slick.min.js') }}"></script>

    <!-- Examples -->
    <script src="{{ asset('cakeadmin/html/js/examples/dashboard.js') }}"></script>

    <!-- Main Javascript file -->
    <script src="{{ asset('cakeadmin/html/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: function() {
                    return $(this).data('placeholder');
                },
                allowClear: true,
                width: 'resolve'
            });
        });
    </script>
    @yield('js')
</body>

</html>
