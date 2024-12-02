<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <title> CakeAdmin Bootstrap 5 Demo - Free Admin Template </title>

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


<!-- notifications sidebar -->
<div class="sidebar" id="notifications">
    <div class="sidebar-header d-block align-items-end">
        <div class="align-items-center d-flex justify-content-between py-4">
            Notifications
            <button data-sidebar-close>
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active nav-link-notify" data-bs-toggle="tab" href="#activities">Activities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
            </li>
        </ul>
    </div>
    <div class="sidebar-content">
        <div class="tab-content">
            <div class="tab-pane active" id="activities">
                <div class="tab-pane-body">
                    <ul class="list-group list-group-flush">
                        <li class="px-0 list-group-item">
                            <a href="#" class="d-flex">
                                <div class="flex-shrink-0">
                                    <figure class="avatar avatar-info me-3">
                                            <span class="avatar-text rounded-circle">
                                                <i class="bi bi-person"></i>
                                            </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 fw-bold d-flex justify-content-between">
                                        You joined a group
                                    </p>
                                    <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> Today
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="px-0 list-group-item">
                            <a href="#" class="d-flex">
                                <div class="flex-shrink-0">
                                    <figure class="avatar avatar-warning me-3">
                                            <span class="avatar-text rounded-circle">
                                                <i class="bi bi-hdd"></i>
                                            </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 fw-bold d-flex justify-content-between">
                                        Storage is running low!
                                    </p>
                                    <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> Today
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="px-0 list-group-item">
                            <a href="#" class="d-flex">
                                <div class="flex-shrink-0">
                                    <figure class="avatar avatar-secondary me-3">
                                            <span
                                                class="avatar-text rounded-circle">
                                                <i class="bi bi-file-text"></i>
                                            </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 d-flex justify-content-between">
                                        1 person sent a file
                                    </p>
                                    <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> Yesterday
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="px-0 list-group-item">
                            <a href="#" class="d-flex">
                                <div class="flex-shrink-0">
                                    <figure class="avatar avatar-success me-3">
                                            <span class="avatar-text rounded-circle">
                                                <i class="bi bi-download"></i>
                                            </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 d-flex justify-content-between">
                                        Reports ready to download
                                    </p>
                                    <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> Yesterday
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="px-0 list-group-item">
                            <a href="#" class="d-flex">
                                <div class="flex-shrink-0">
                                    <figure class="avatar avatar-info me-3">
                                            <span class="avatar-text rounded-circle">
                                                <i class="bi bi-lock"></i>
                                            </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 d-flex justify-content-between">
                                        2 steps verification
                                    </p>
                                    <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> 20 min ago
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane-footer">
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-check2 me-2"></i> Make All Read
                    </a>
                    <a href="#" class="btn btn-danger ms-2">
                        <i class="bi bi-trash me-2"></i> Delete all
                    </a>
                </div>
            </div>
            <div class="tab-pane" id="notes">
                <div class="tab-pane-body">
                    <ul class="list-group list-group-flush">
                        <li class="px-0 list-group-item">
                            <p class="mb-0 fw-bold text-success d-flex justify-content-between">
                                This month's report will be prepared.
                            </p>
                            <span class="text-muted small">
                                <i class="bi bi-clock me-1"></i> Today
                            </span>
                            <div class="mt-2">
                                <a href="#">Edit</a>
                                <a href="#" class="text-danger ms-2">Delete</a>
                            </div>
                        </li>
                        <li class="px-0 list-group-item">
                            <p class="mb-0 fw-bold text-success d-flex justify-content-between">
                                An email will be sent to the customer.
                            </p>
                            <span class="text-muted small">
                                <i class="bi bi-clock me-1"></i> Today
                            </span>
                            <div class="mt-2">
                                <a href="#">Edit</a>
                                <a href="#" class="text-danger ms-2">Delete</a>
                            </div>
                        </li>
                        <li class="px-0 list-group-item">
                            <p class="mb-0 d-flex justify-content-between">
                                The meeting will be held.
                            </p>
                            <span class="text-muted small">
                                <i class="bi bi-clock me-1"></i> Yesterday
                            </span>
                            <div class="mt-2">
                                <a href="#">Edit</a>
                                <a href="#" class="text-danger ms-2">Delete</a>
                            </div>
                        </li>
                        <li class="px-0 list-group-item">
                            <p class="mb-0 fw-bold text-success d-flex justify-content-between">
                                Conversation with users.
                            </p>
                            <span class="text-muted small">
                                <i class="bi bi-clock me-1"></i> Yesterday
                            </span>
                            <div class="mt-2">
                                <a href="#">Edit</a>
                                <a href="#" class="text-danger ms-2">Delete</a>
                            </div>
                        </li>
                        <li class="px-0 list-group-item">
                            <p class="mb-0 fw-bold text-warning d-flex justify-content-between">
                                Payment refund will be made to the customer.
                            </p>
                            <span class="text-muted small">
                                <i class="bi bi-clock me-1"></i> 20 min ago
                            </span>
                            <div class="mt-2">
                                <a href="#">Edit</a>
                                <a href="#" class="text-danger ms-2">Delete</a>
                            </div>
                        </li>
                        <li class="px-0 list-group-item">
                            <p class="mb-0 d-flex justify-content-between">
                                Payment form will be activated.
                            </p>
                            <span class="text-muted small">
                                <i class="bi bi-clock me-1"></i> 20 min ago
                            </span>
                            <div class="mt-2">
                                <a href="#">Edit</a>
                                <a href="#" class="text-danger ms-2">Delete</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane-footer">
                    <a href="#" class="btn btn-primary btn-block">
                        <i class="bi bi-plus me-2"></i> Add Notes
                    </a>
                </div>
            </div>
            <div class="tab-pane" id="alerts">
                <div class="tab-pane-body">
                    <ul class="list-group list-group-flush">
                        <li class="px-0 list-group-item d-flex">
                            <div class="flex-shrink-0">
                                <figure class="avatar avatar-warning me-3">
                                        <span class="avatar-text rounded-circle">
                                            <i class="bi bi-lock"></i>
                                        </span>
                                </figure>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-bold d-flex justify-content-between">
                                    Signed in with a different device.
                                </p>
                                <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> Yesterday
                                    </span>
                            </div>
                        </li>
                        <li class="px-0 list-group-item d-flex">
                            <div class="flex-shrink-0">
                                <figure class="avatar avatar-warning me-3">
                                        <span class="avatar-text fw-bold rounded-circle">
                                            <i class="bi bi-file-text"></i>
                                        </span>
                                </figure>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 fw-bold d-flex justify-content-between">
                                    Your billing information is not active.
                                </p>
                                <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> Yesterday
                                    </span>
                            </div>
                        </li>
                        <li class="px-0 list-group-item d-flex">
                            <div class="flex-shrink-0">
                                <figure class="avatar avatar-warning me-3">
                                        <span class="avatar-text rounded-circle">
                                            <i class="bi bi-person"></i>
                                        </span>
                                </figure>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 d-flex justify-content-between">
                                    Your subscription has expired.
                                </p>
                                <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> Today
                                    </span>
                            </div>
                        </li>
                        <li class="px-0 list-group-item d-flex">
                            <div class="flex-shrink-0">
                                <figure class="avatar avatar-warning me-3">
                                        <span class="avatar-text rounded-circle">
                                            <i class="bi bi-hdd"></i>
                                        </span>
                                </figure>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 d-flex justify-content-between">
                                    Your storage space is running low
                                </p>
                                <span class="text-muted small">
                                        <i class="bi bi-clock me-1"></i> Today
                                    </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane-footer">
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-check2 me-2"></i> Make All Read
                    </a>
                    <a href="#" class="btn btn-danger ms-2">
                        <i class="bi bi-trash me-2"></i> Delete all
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./ notifications sidebar -->

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
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked>
                    <label class="form-check-label" for="flexCheckDefault1">
                        Remember next visits
                    </label>
                </div>
            </li>
            <li class="list-group-item px-0 border-0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" checked>
                    <label class="form-check-label" for="flexCheckDefault2">
                        Enable report generation.
                    </label>
                </div>
            </li>
            <li class="list-group-item px-0 border-0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" checked>
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
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5" checked>
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
    <div class="sidebar-header">
        Search
        <button data-sidebar-close>
            <i class="bi bi-arrow-right"></i>
        </button>
    </div>
    <div class="sidebar-content">
        <form class="mb-4">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-describedby="button-search-addon">
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
        <a href="./dashboard.html" class="menu-header-logo">
            <img src="../logo.svg" alt="logo">
            <span>CakeAdmin</span>
        </a>
        <a href="#" class="btn btn-sm menu-close-btn">
            <i class="bi bi-x"></i>
        </a>
    </div>
    <div class="menu-body">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                <div class="avatar me-3">
                    <img src="../images/user/man_avatar5.jpg"
                         class="rounded-circle" alt="image">
                </div>
                <div>
                    <div class="fw-bold">Timotheus Bendan</div>
                    <small class="text-muted">Admin</small>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-person dropdown-item-icon"></i> Profile
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-envelope dropdown-item-icon"></i> Inbox
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center" data-sidebar-target="#settings">
                    <i class="bi bi-gear dropdown-item-icon"></i> Settings
                </a>
                <a href="./login.html" class="dropdown-item d-flex align-items-center text-danger"
                   target="_blank">
                    <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
                </a>
            </div>
        </div>
        <ul>
            <li class="menu-divider">Dashboard</li>
            <li>
                <a  class="active"  href="./dashboard.html">
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
                    <span>Orders</span>
                </a>
                <ul>
                    <li>
                        <a href="/kelolapelamar">Data Perusahaan</a>
                    </li>
                    <li>
                        <a href="/kelolapelamar/create">Tambah Data Perusahaan </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-truck"></i>
                    </span>
                    <span>Products</span>
                </a>
                <ul>
                    <li>
                        <a  href="./product-list.html">List View</a>
                    </li>
                    <li>
                        <a  href="./product-grid.html">Grid View</a>
                    </li>
                    <li>
                        <a  href="./product-detail.html">Product Detail</a>
                    </li>
                    <li>
                        <a  href="./shopping-cart.html">Shopping Cart</a>
                    </li>
                    <li>
                        <a  href="./checkout.html">Checkout</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-wallet2"></i>
                    </span>
                    <span>Buyer</span>
                </a>
                <ul>
                    <li>
                        <a  href="./buyer-dashboard.html">Dashboard</a>
                    </li>
                    <li>
                        <a  href="./buyer-orders.html">Orders</a>
                    </li>
                    <li>
                        <a  href="./buyer-addresses.html">Addresses</a>
                    </li>
                    <li>
                        <a  href="./buyer-wishlist.html">Wishlist</a>
                    </li>
                </ul>
            </li>
            <li>
                <a  href="./customers.html">
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
                        <a href="./invoices.html" >List</a>
                    </li>
                    <li>
                        <a href="./invoice-detail.html" >Detail</a>
                    </li>
                </ul>
            </li>
            <li class="menu-divider">Apps</li>
            <li>
                <a  href="./chats.html">
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
                        <a  href="./email.html">
                            <span>Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a  href="./email.html-detail">
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
                        <a  href="./todo-list.html">
                            <span>List</span>
                        </a>
                    </li>
                    <li>
                        <a  href="./todo-detail.html">
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
                        <a  href="./profile-posts.html">Post</a>
                    </li>
                    <li>
                        <a  href="./profile-connections.html">Connections</a>
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
                        <a  href="./user-list.html">List View</a>
                    </li>
                    <li>
                        <a  href="./user-grid.html">Grid View</a>
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
                        <a  href="./access-denied.html">Access Denied</a>
                    </li>
                    <li>
                        <a href="./under-construction.html" target="_blank">Under Construction</a>
                    </li>
                </ul>
            </li>
            <li>
                <a  href="./settings.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-gear"></i>
                    </span>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a  href="./pricing-table.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-wallet2"></i>
                    </span>
                    <span>Pricing Table</span>
                    <span class="badge bg-success ms-auto">New</span>
                </a>
            </li>
            <li>
                <a  href="./search-page.html">
                    <span class="nav-link-icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <span>Search Page</span>
                </a>
            </li>
            <li>
                <a  href="./faq.html">
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
                </a>
            </li>
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
        <img width="100" src="../logo.png" alt="logo">
    </a>
    <!-- ./ Logo -->
    <div class="page-title">Dashboard</div>
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
                <a href="#" class="nav-link nav-link-notify" data-count="2" data-sidebar-target="#notifications">
                    <i class="bi bi-bell icon-lg"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
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
                                    <img src="../images/products/3.jpg" class="rounded" width="60"
                                         alt="...">
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
                                    <img src="../images/products/4.jpg" class="rounded" width="60"
                                         alt="...">
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
                                    <img src="../images/products/5.jpg" class="rounded" width="60"
                                         alt="...">
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
                                    <img src="../images/products/6.jpg" class="rounded" width="60"
                                         alt="...">
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
            </li>
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

    <!-- content -->
    <div class="content ">
        
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-7 col-md-12">
            <div class="card widget h-100">
                <div class="card-header d-flex">
                    <h6 class="card-title">
                        Sales Chart
                        <a href="#" class="bi bi-question-circle ms-1 small" data-bs-toggle="tooltip"
                           title="Daily orders and sales"></a>
                    </h6>
                    <div class="d-flex gap-3 align-items-center ms-auto">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">View Detail</a>
                                <a href="#" class="dropdown-item">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-md-flex align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <div class="display-7 me-3">
                                <i class="bi bi-bag-check me-2 text-success"></i> $10.552,40
                            </div>
                            <span class="text-success">
                                <i class="bi bi-arrow-up me-1 small"></i>8.30%
                            </span>
                        </div>
                        <div class="d-flex gap-4 align-items-center ms-auto mt-3 mt-lg-0">
                            <select class="form-select">
                                <optgroup label="2020">
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </optgroup>
                                <optgroup label="2021">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May" selected>May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div id="sales-chart"></div>
                    <div class="d-flex justify-content-center gap-4 align-items-center ms-auto mt-3 mt-lg-0">
                        <div>
                            <i class="bi bi-circle-fill mr-2 text-primary me-1 small"></i>
                            <span>Sales</span>
                        </div>
                        <div>
                            <i class="bi bi-circle-fill mr-2 text-success me-1 small"></i>
                            <span>Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12">
            <div class="card widget h-100">
                <div class="card-header d-flex">
                    <h6 class="card-title">
                        Channels
                        <a href="#" class="bi bi-question-circle ms-1 small" data-bs-toggle="tooltip"
                           title="Channels where your products are sold"></a>
                    </h6>
                    <div class="d-flex gap-3 align-items-center ms-auto">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">View Detail</a>
                                <a href="#" class="dropdown-item">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="sales-channels"></div>
                    <div class="row text-center mb-5 mt-4">
                        <div class="col-4">
                            <div class="display-7">48%</div>
                            <div class="text-success my-2 small">
                                <i class="bi bi-arrow-up me-1 small"></i>30.50%
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-orange me-2 small"></i>
                                <span class="text-muted">Social Media</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="display-7">30%</div>
                            <div class="text-danger my-2 small">
                                <i class="bi bi-arrow-down me-1 small"></i>15.20%
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-cyan me-2 small"></i>
                                <span class="text-muted">Google</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="display-7">22%</div>
                            <div class="text-success my-2 small">
                                <i class="bi bi-arrow-up me-1 small"></i>1.80%
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-circle-fill text-indigo me-2 small"></i>
                                <span class="text-muted">Email</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-icon">
                            <i class="bi bi-download"></i> Download Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <i class="bi bi-basket"></i>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">View Detail</a>
                                <a href="#" class="dropdown-item">Download</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Orders</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7">310</div>
                        <div class="ms-auto" id="total-orders"></div>
                    </div>
                    <div class="text-success">
                        Over last month 1.4% <i class="small bi bi-arrow-up"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="display-7">
                            <i class="bi bi-credit-card-2-front"></i>
                        </div>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">View Detail</a>
                                <a href="#" class="dropdown-item">Download</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Sales</h4>
                    <div class="d-flex mb-3">
                        <div class="display-7">$3.759,00</div>
                        <div class="ms-auto" id="total-sales"></div>
                    </div>
                    <div class="text-danger">
                        Over last month 2.4% <i class="small bi bi-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h6 class="card-title">Recent Reviews</h6>
                        <div class="dropdown ms-auto">
                            <a href="#">View All</a>
                        </div>
                    </div>
                    <div class="summary-cards">
                        <div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar me-3">
                                    <img src="../images/user/women_avatar5.jpg" class="rounded-circle"
                                         alt="image">
                                </div>
                                <div>
                                    <h5 class="mb-1">Amara Keel</h5>
                                    <ul class="list-inline ms-auto mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-muted"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">(4)</li>
                                    </ul>
                                </div>
                            </div>
                            <div>I love your products. It is very easy and fun to use this panel.</div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar me-3">
                                    <span class="avatar-text bg-indigo rounded-circle">J</span>
                                </div>
                                <div>
                                    <h5 class="mb-1">Johnath Siddeley</h5>
                                    <ul class="list-inline ms-auto mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">(5)</li>
                                    </ul>
                                </div>
                            </div>
                            <div>Very nice glasses. I ordered for my friend.</div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar me-3">
                                    <span class="avatar-text bg-yellow rounded-circle">D</span>
                                </div>
                                <div>
                                    <h5 class="mb-1">David Berks</h5>
                                    <ul class="list-inline ms-auto mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </li>
                                        <li class="list-inline-item mb-0">(5)</li>
                                    </ul>
                                </div>
                            </div>
                            <div>I am very satisfied with this product.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex mb-4">
                        <h6 class="card-title mb-0">Customer Rating</h6>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">View Detail</a>
                                <a href="#" class="dropdown-item">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="display-6">3.0</div>
                        <div class="d-flex justify-content-center gap-3 my-3">
                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                            <i class="bi bi-star-fill icon-lg text-warning"></i>
                            <i class="bi bi-star-fill icon-lg text-muted"></i>
                            <i class="bi bi-star-fill icon-lg text-muted"></i>
                            <span>(318)</span>
                        </div>
                    </div>
                    <div class="text-muted d-flex align-items-center justify-content-center">
                        <span class="text-success me-3 d-block">
                            <i class="bi bi-arrow-up me-1 small"></i>+35
                        </span> Point from last month
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6 m-auto">
                            <div id="customer-rating"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-primary btn-icon">
                            <i class="bi bi-download"></i> Download Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 bg-purple">
                <div class="card-body text-center">
                    <div class="text-white-50">
                        <div class="bi bi-box-seam display-6 mb-3"></div>
                        <div class="display-8 mb-2">Products Sold</div>
                        <h5>89 Sold</h5>
                    </div>
                    <div id="products-sold"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card widget h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        Your Top Countries
                        <a href="#" class="bi bi-question-circle ms-1 small" data-bs-toggle="tooltip"
                           title="Sales performance revenue based by country"></a>
                    </h5>
                    <a href="#">View All</a>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="d-flex flex-grow-1 align-items-center">
                                <img width="45" class="me-3"
                                     src="../images/flags/united-states-of-america.svg" alt="...">
                                <span>United States</span>
                            </div>
                            <span>$1.671,10</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="d-flex flex-grow-1 align-items-center">
                                <img width="45" class="me-3" src="../images/flags/venezuela.svg" alt="...">
                                <span>Venezuela</span>
                            </div>
                            <span>$1.064,75</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="d-flex flex-grow-1 align-items-center">
                                <img width="45" class="me-3" src="../images/flags/salvador.svg" alt="...">
                                <span>Salvador</span>
                            </div>
                            <span>$1.055,98</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div class="d-flex flex-grow-1 align-items-center">
                                <img width="45" class="me-3" src="../images/flags/russia.svg" alt="...">
                                <span>Russia</span>
                            </div>
                            <span>$1.042,00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12">
            <div class="card widget">
                <div class="card-header">
                    <h5 class="card-title">Activity Overview</h5>
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-truck text-secondary"></i>
                                </div>
                                <h5 class="my-3">Delivered</h5>
                                <div class="text-muted">15 New Packages</div>
                                <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-receipt text-warning"></i>
                                </div>
                                <h5 class="my-3">Ordered</h5>
                                <div class="text-muted">72 New Items</div>
                                <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 67%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-bar-chart text-info"></i>
                                </div>
                                <h5 class="my-3">Reported</h5>
                                <div class="text-muted">50 Support New Cases</div>
                                <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-cursor text-success"></i>
                                </div>
                                <h5 class="my-3">Arrived</h5>
                                <div class="text-muted">34 Upgraded Boxed</div>
                                <div class="progress mt-3" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 55%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            @yield('content')
        </div>
        

    
    <!-- ./ content -->

    <!-- content-footer -->
    <footer class="content-footer">
        <div><a href="https://cakeadmin.com" target="_blank">CakeAdmin</a> © 2023</div>
        <div>
            <nav class="nav gap-4">
                <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
                <a href="#" class="nav-link">Change Log</a>
                <a href="#" class="nav-link">Get Help</a>
            </nav>
        </div>
    </footer>
    <!-- ./ content-footer -->

</div>
<!-- ./ layout-wrapper -->

<!-- JQuery -->
<script src="{{ asset('cakeadmin/html/libs/jquery-3.7.1.min.js') }}"></script>

<!-- Nicescroll -->
<script src="{{ asset('cakeadmin/html/libs/nicescroll.js') }}"></script>

<!-- Apex chart -->
<script src="{{ asset('admin/html/libs/charts/apex/apexcharts.min.js') }}"></script>

<!-- Slick -->
<script src="{{ asset('cakeadmin/html/libs/slick/slick.min.js') }}"></script>

<!-- Examples -->
<script src="{{ asset('cakeadmin/html/js/examples/dashboard.js') }}"></script>

<!-- Main Javascript file -->
<script src="{{ asset('cakeadmin/html/js/app.js') }}"></script>
</body>

</html>
