@extends('app')
@section('sidebar')
    <!-- Side Bar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 text-center" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/local/logo5.png') }}" class="navbar-brand-img" alt="main_logo">
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  active" href="{{ route('home') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('admin_proses') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>document</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(154.000000, 300.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Proses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ url('admin/user') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/stock') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                <path class="color-background"
                                                    d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"
                                                    id="Path"></path>
                                                <path class="color-background"
                                                    d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                    id="Path" opacity="0.7"></path>
                                                <path class="color-background"
                                                    d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                    id="Path" opacity="0.7"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Stok</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Akun</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ url('admin/profile') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3">
            <a class="btn bg-gradient-primary mt-5 w-100" href="{{ route('logout') }}">Keluar</a>
        </div>
    </aside>
    <!-- End Side Bar -->
@endsection

@section('navbar')
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                            href="{{ url('admin/dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Beranda</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Beranda</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <ul class="navbar-nav justify-content-end me-5">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="../assets/img/local/profil.png" class="avatar avatar-sm  me-3 mt-1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold"> {{ Auth::user()->name }} </span>
                                </h6>
                                <p class="text-xs text-secondary mb-0 ">
                                    <i class="fa fa-solid fa-circle" style="color: #82d616;"></i>
                                    Online
                                </p>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </li>

        </div>
    </nav>
    <!-- End Navbar -->
@endsection

@section('content')
    {{-- Nav Content --}}
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Gas</p>
                                <div class="d-flex font-weight-bolder mb-0">
                                    <h5 class="font-weight-bolder mb-0" id="total-gas"></h5>
                                    <span class="ms-2 mt-1 text-black text-sm font-weight-bolder">gas</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fa fa-solid fa-fire opacity-10" style="color: #ffffff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pesanan Masuk</p>
                                <div class="d-flex font-weight-bolder mb-0">
                                    <h5 class="font-weight-bolder mb-0" id="pesanan-diproses"></h5>
                                    <span class="ms-2 mt-1 text-black text-sm font-weight-bolder">pesanan</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fa fa-solid fa-clipboard-list opacity-10" style="color: #ffffff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pesanan Dikirim</p>
                                <div class="d-flex font-weight-bolder mb-0">
                                    <h5 class="font-weight-bolder mb-0" id="pesanan-dikirim"></h5>
                                    <span class="ms-2 mt-1 text-black text-sm font-weight-bolder">pesanan</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <svg class="mt-3" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        svg {
                                            fill: #ffffff
                                        }
                                    </style>
                                    <path
                                        d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pesanan Selesai</p>
                                <div class="d-flex font-weight-bolder mb-0">
                                    <h5 class="font-weight-bolder mb-0" id="pesanan-selesai"></h5>
                                    <span class="ms-2 mt-1 text-black text-sm font-weight-bolder">pesanan</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fa fa-solid fa-clipboard-check opacity-10" style="color: #ffffff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik --}}
    <div class="row mt-4">
        {{-- Grafik Gas Terjual --}}
        <div class="col-lg-5 mb-lg-0 mb-4">
            <div class="card z-index-2">
                <div class="card-body p-3">
                    <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                    <h6 class="ms-2 mt-4 mb-0"> Gas Terjual </h6>
                    <p class="text-sm ms-2">
                        @if ($PeningkatanPembelian > 0)
                            <span class="font-weight-bolder text-success"><i class="fa fa-arrow-up text-success"></i>
                                {{ number_format($PeningkatanPembelian, 2) }}%</span> than last day
                        @elseif ($PeningkatanPembelian < 0)
                            <span class="font-weight-bolder text-danger"><i class="fa fa-arrow-down text-danger"></i>
                                {{ number_format($PeningkatanPembelian, 2) }}%</span> than last day
                        @else
                            Same than last day
                        @endif
                    </p>
                    <div class="container border-radius-lg">
                        <div class="row">
                            <div class="col-6 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div
                                        class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-solid fa-fire opacity-10 mt-2" style="color: #ffffff;"></i>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Gas Terjual</p>
                                </div>
                                <div class="d-flex">
                                    <h4 h4 class="font-weight-bolder" id="gas-terjual"></h4>
                                    <h4 h4 class="ms-2 font-weight-bolder">Gas</h4>
                                </div>
                            </div>
                            <div class="col-6 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div
                                        class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 43 36" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                    fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background"
                                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                opacity="0.593633743"></path>
                                                            <path class="color-background"
                                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Penjualan</p>
                                </div>
                                <h4 h4 class="font-weight-bolder" id="jumlah-transaksi"></h4>
                                {{-- <h4 class="font-weight-bolder">Rp {{ number_format($jumlahTransaksiDiterima, 0, ',', '.') }}</h4> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Grafik Penjualan --}}
        <div class="col-lg-7">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Sales overview</h6>
                    <p class="text-sm ms-2">
                        @if ($PeningkatanPenjualan > 0)
                            <span class="font-weight-bolder text-success"><i class="fa fa-arrow-up text-success"></i>
                                {{ number_format($PeningkatanPenjualan, 2) }}%</span> than last month
                        @elseif ($PeningkatanPenjualan < 0)
                            <span class="font-weight-bolder text-danger"><i class="fa fa-arrow-down text-danger"></i>
                                {{ number_format($PeningkatanPenjualan, 2) }}%</span> than last month
                        @else
                            Same than last month
                        @endif
                    </p>
                </div>
                <div class="card-body pt-0 pb-4 px-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table transaksi --}}
    <div class="row my-4">
        <div class="col-lg-12 col-smd-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col d-flex">
                            <h4 class="card-tittle ms-3">Semua Pesanan</h4>
                        </div>
                        <div class="col-md-3 col-sm-6 ml-auto">
                            <div class="input-group mb-3">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control " id="searchInput_transaksi"
                                    placeholder="Cari Pesanan ...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pb-5" style="min-height: 100px;">
                    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                        <div class="text-center" id="noResultsMessage" style="display: none;">
                            Pesanan tidak ditemukan.
                        </div>
                        <table id="table_transaksi" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Id Pesanan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tgl. Pesanan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Pemesanan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Jumlah Gas</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Alamat Pesanan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Informasi</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pesanan --}}
    @foreach ($transaksis as $transaksi)
        <div class="row">
            <div class="col-md-4">
                <div class="modal fade" id="more-info{{ $transaksi->id_transaksi }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default{{ $transaksi->id_transaksi }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <img class="ms-2 position-absolute top-50 start-50 translate-middle d-sm-block" src="{{ asset('assets/img/local/logo7.png') }}" height="150" alt="main_logo" style="z-index: 0; opacity: 0.3; display:none;">
                            <div class="modal-header">
                                <h6 class="modal-title text-uppercase" id="modal-title-default">Rincian Pesanan</h6>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body p-2" style="max-height:500px; overflow-y: auto;">
                                <div class="border border-2 py-3 px-2">
                                    <div class="row">
                                        <div class="col">
                                            <img class="ms-2" src="{{ asset('assets/img/local/logo5.png') }}" height="30" alt="main_logo">
                                        </div>
                                        <div class="col text-end mt-1 me-2">
                                            {{ $transaksi->tanggal_transaksi }}
                                        </div>
                                    </div>
                                    <hr class="border border-dark" style="width: 100%">
                                    <div class="row">
                                        <div class="col">
                                            <p class="pb-0 ms-2 mb-4">RESI : {{ $transaksi->resi_transaksi }}</p>
                                        </div>
                                        <div class="col">
                                            @if (isset($transaksi->pengiriman->kurir) && isset($transaksi->pengiriman->truck))
                                                <p class="pb-0 me-2 mb-4 text-end">{{ $transaksi->pengiriman->resi_pengiriman }}</p>
                                            @else
                                                <p class="pb-0 me-2 mb-4 text-end">Belum Dikirim</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row ms-2" >
                                        <div class="col-1 me-3">
                                            @if ($transaksi->status_pengiriman == 'Belum Dikirim')
                                            <img src="{{ asset('assets/img/local/insurance.png') }}" class="ms-1" height="45" alt="belum_dikirim">
                                            @elseif($transaksi->status_pengiriman == 'Dikirim')
                                            <img src="{{ asset('assets/img/local/fast-delivery.png') }}" class="pt-2" width="50" alt="dikirim">
                                            @else
                                            <img src="{{ asset('assets/img/local/delivered.png') }}" class="pt-1 ms-1" height="45" alt="diterima">
                                            @endif
                                        </div>   
                                        <div class="col-4 ms-4">
                                                <div class="d-flex flex-column">
                                                    <div>Status</div>
                                                    <div><p><strong>{{ $transaksi->status_pengiriman }}</strong></p></div>
                                                </div>
                                        </div>
                                        <div class="col-3 d-flex flex-column" >
                                            <div>Kurir</div>
                                            <div>
                                                @if (isset($transaksi->pengiriman->kurir) && isset($transaksi->pengiriman->truck))
                                                    <div><p><strong>{{ $transaksi->pengiriman->kurir->name }}</strong></p></div>
                                                @else
                                                    <div><p><strong>None</strong></p></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3 d-flex flex-column" >
                                            <div>Truck</div>
                                            <div>
                                                @if (isset($transaksi->pengiriman->kurir) && isset($transaksi->pengiriman->truck))
                                                    <div><p><strong>{{ $transaksi->pengiriman->truck->plat_truck }}</strong></p></div>
                                                @else
                                                    <div><p><strong>None</strong></p></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ms-1 my-3">
                                        <div class="col-12 col-md-6 mb-3 d-flex flex-column">
                                            <div>Kepada : </div>
                                            <div><strong>{{ $transaksi->agen->name }}</strong></div>
                                            <div>{{ $transaksi->agen->alamat }}</div>
                                            <div><em>{{ $transaksi->agen->no_hp }}</em></div>
                                        </div>
                                        <div class="col-12 col-md-5 mb-2 d-flex flex-column">
                                            <div>Terakhir diedit oleh :</div>
                                            <div><strong>{{ $transaksi->admin->name }}</strong></div>
                                            <div>{{ $transaksi->updated_at }}</div>
                                        </div>
                                    </div>
                                    <hr style="border: 2px dashed #8392ab;"/>
                                    <div class="row ms-1">
                                        <div class="col-12 col-md-6 col-lg-3 mb-2 d-flex flex-column">
                                            <div><strong>Produk</strong></div>
                                            <div>{{ $transaksi->gas->jenis_gas }}</div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3 mb-2 d-flex flex-column ">
                                            <div><strong>Jumlah</strong></div>
                                            <div >{{ $transaksi->jumlah_transaksi }} Gas</div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3 mb-2 d-flex flex-column ">
                                            <div><strong>Pembayaran</strong></div>
                                            <div>RP. {{ number_format($transaksi->total_transaksi, 0, ',', '.') }}</div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-3 mb-2 d-flex flex-column ">
                                            <div><strong>Status</strong></div>
                                            @if ($transaksi->pembayaran->status_pembayaran === 'Belum Bayar')
                                                <div><span class="badge badge-pill badge-lg bg-gradient-danger">Belum Bayar</span></div>
                                            @elseif($transaksi->pembayaran->status_pembayaran === 'Proses')
                                                <div><span class="badge badge-pill badge-lg bg-gradient-info">Konfirmasi</span></div>
                                            @else
                                                <div><span class="badge badge-pill badge-lg bg-gradient-success">Sudah Bayar</span></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link ml-auto"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('js')
    {{-- Script search --}}
    <script>
        $(document).ready(function() {
            $("#searchInput_transaksi").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table_transaksi tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });

                var noResultsMessage = $("#noResultsMessage");
                if ($("#table_transaksi tr:visible").length === 0) {
                    noResultsMessage.show();
                } else {
                    noResultsMessage.hide();
                }
            });
        });
    </script>

    {{-- Data Table --}}
    <script>    
        document.addEventListener("DOMContentLoaded", function (event) {
            Echo.channel('newtran-channel')
                .listen('newTranEvent', (event) => {
                    fetchRealTimeData();
                    updateData() 
                });
        });

        document.addEventListener("DOMContentLoaded", function (event) {
            Echo.channel('updateTran-channel')
                .listen('updateTranEvent', (event) => {
                    fetchRealTimeData();
                    updateData() 
                });
        });

        document.addEventListener("DOMContentLoaded", function (event) {
            Echo.channel('finishTran-channel')
                .listen('finishTranEvent', (event) => {
                    fetchRealTimeData();
                    updateData() 
                });
        });

        function updateTable(transaksis) {    
            var tableBody = $('#table-body');
            tableBody.empty();
    
            transaksis.forEach(function(transaksi) {
                var statusBadge = getStatusBadge(transaksi);
    
                var row = 
                '<tr class="text-dark">' +
                    '<td class="align-middle text-sm text-center" style="border-bottom: none;">' + transaksi.resi_transaksi + '</td>' +
                    '<td class="align-middle text-sm text-center" style="border-bottom: none;">' + transaksi.tanggal_transaksi + '</td>' +
                    '<td class="align-middle text-sm text-center" style="border-bottom: none;">' + transaksi.agen_name + '</td>' +
                    '<td class="align-middle text-sm text-center" style="border-bottom: none;" data-jumlah-gas="' + transaksi.jumlah_transaksi + '">' + transaksi.jumlah_transaksi + ' Gas</td>' +
                    '<td class="align-middle text-sm text-center" style="border-bottom: none; white-space: pre-wrap; word-wrap: break-word; max-width: 100px;">' + transaksi.agen_alamat + '</td>' +
                    '<td class="align-middle text-sm text-center" style="border-bottom: none;">' + statusBadge + '</td>' +
                    '<td class="align-middle text-sm text-center" style="border-bottom: none;">' +
                    '<a href="#" type="button" data-id="' + transaksi.id_transaksi + '" data-bs-toggle="modal" data-bs-target="#more-info' + transaksi.id_transaksi + '">' +
                    '<p style="text-decoration: underline;">Selengkapnya</p>' +
                    '</a>' +
                    '</td>' +
                '</tr>';
                tableBody.append(row);
            });
        }
    
        function getStatusBadge(transaksi) {
            if (transaksi.status_pengiriman === 'Belum Dikirim') {
                if (transaksi.status_pembayaran === 'Belum Bayar') {
                    return '<span class="badge badge-sm bg-gradient-danger mb-3">Belum Bayar</span>';
                } else if (transaksi.status_pembayaran === 'Proses') {
                    return '<span class="badge badge-sm bg-gradient-warning mb-3">Proses Bayar</span>';
                } else {
                    return '<span class="badge badge-sm bg-gradient-warning mb-3">Belum Dikirim</span>';
                }
            } else if (transaksi.status_pengiriman === 'Dikirim') {
                return '<span class="badge badge-sm bg-gradient-info mb-3" style="width: 100px;">Dikirim</span>';
            } else {
                return '<span class="badge badge-sm bg-gradient-success mb-3" style="width: 100px;">Diterima</span>';
            }
        }
    
        function fetchRealTimeData() {
            $.ajax({
                url: '/admin/dashboard/realtimeData', // Sesuaikan dengan rute yang Anda definisikan
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    // Tangani data yang diterima di sini
                    var transaksis = response.transaksis;
                    updateTable(transaksis); // Panggil fungsi untuk memperbarui tabel
                },
                error: function (error) {
                    console.error('Gagal mengambil data:', error);
                }
            });
        }
    
        // Panggil fungsi fetchRealTimeData untuk memuat data saat halaman dimuat
        $(document).ready(function () {
            fetchRealTimeData();
        });

    </script>    

    {{-- Data  --}}
    <script>
        function updateData() {
            $.ajax({
                url: '/admin/dashboard/realtimeData',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    const totalGasElement = document.getElementById('total-gas');
                    totalGasElement.textContent = data.total_gas;
                    
                    const pesananDiprosesElement = document.getElementById('pesanan-diproses');
                    pesananDiprosesElement.textContent = data.pesanan_diproses;
                    
                    const pesananDikirimElement = document.getElementById('pesanan-dikirim');
                    pesananDikirimElement.textContent = data.pesanan_dikirim;
                    
                    const pesananSelesaiElement = document.getElementById('pesanan-selesai');
                    pesananSelesaiElement.textContent = data.pesanan_selesai;

                    const totalGasTerjualElement = document.getElementById('gas-terjual');
                    totalGasTerjualElement.textContent = data.totalGasTerjual;

                    const jumlahTransaksiElement = document.getElementById('jumlah-transaksi');
                    const jumlahTransaksi = parseFloat(data.jumlahTransaksiDiterima);
                    if (!isNaN(jumlahTransaksi)) {
                        const formattedNumber = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(jumlahTransaksi);

                        jumlahTransaksiElement.textContent = formattedNumber;
                    } else {
                        jumlahTransaksiElement.textContent = 'Rp 0';
                    }

                },
                error: function (error) {
                    console.error(error);
                }
            });
        }

        $(document).ready(function () {
            updateData() ;
        });
    </script>

    <!--   Chart 1   -->
    <script>
        let chart;
        let data;
        let labels;
    
        function getDataChart1() {
            $.ajax({
                url: '/admin/dashboard/realtimeChart1',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    const ctx = document.getElementById('chart-bars').getContext('2d');

                    if (chart) {
                        chart.destroy();
                    }
                    
                    const data_hari = data.data1;
                    const label_jumlah = data.labels1;

                    chart1 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: label_jumlah,
                            datasets: [{
                                label: 'Gas Terjual',
                                tension: 0.4,
                                borderWidth: 0,
                                borderRadius: 4,
                                borderSkipped: false,
                                backgroundColor: '#fff',
                                data: data_hari,
                                maxBarThickness: 6,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                },
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                    },
                                    ticks: {
                                        suggestedMin: 0,
                                        suggestedMax: 500,
                                        beginAtZero: true,
                                        padding: 15,
                                        font: {
                                            size: 14,
                                            family: 'Open Sans',
                                            style: 'normal',
                                            lineHeight: 2,
                                        },
                                        color: '#fff',
                                    },
                                },
                                x: {
                                    reverse: true,
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                    },
                                    ticks: {
                                        display: false,
                                    },
                                },
                            },
                        },
                    });
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    
        $(function () {
            getDataChart1();
        });

        let dataChart1 = {
            labels: [],
            data: [],
        };
        document.addEventListener("DOMContentLoaded", function(event) { 
            Echo.channel(`chart1-channel`)
            .listen('chart1Event', (e) => {
                updateData();
                if (chart1) {
                    const labelIndex = chart1.data.labels.indexOf(e.tanggal_transaksi);

                    if (labelIndex !== -1) {
                        // Jika label sudah ada, tambahkan nilai jumlah_transaksi ke dataset yang sesuai
                        chart1.data.datasets[0].data[labelIndex] = parseInt(chart1.data.datasets[0].data[labelIndex]);
                        chart1.data.datasets[0].data[labelIndex] += parseInt(e.jumlah_transaksi);
                    } else {
                        // Jika label belum ada, tambahkan label baru dan nilai jumlah_transaksi ke data chart
                        chart1.data.labels.push(e.tanggal_transaksi);
                        chart1.data.datasets[0].data.push(e.jumlah_transaksi);
                    }

                    // Optional: Batasi jumlah data di chart
                    if (chart1.data.labels.length > 7) {
                        chart1.data.labels.shift();
                        chart1.data.datasets[0].data.shift();
                    }

                    chart1.update();
                }

            });
        });
    </script>
    
    <!--   Chart 2   -->
    <script>
        var ctx2 = document.getElementById("chart-line").getContext("2d");
        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); // Purple colors
        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); // Purple colors
    
        var chart2; // Deklarasikan variabel chart2
    
        function getDataChart2() {
            $.ajax({
                url: '/admin/dashboard/realtimeChart2',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Hancurkan chart2 jika sudah ada
                    if (chart2) {
                        chart2.destroy();
                    }

                    const data_bulan = data.data2;
                    const label_total = data.labels2;
                    // Buat chart2 baru
                    chart2 = new Chart(ctx2, {
                        type: "line",
                        data: {
                            labels: label_total,
                            datasets: [{
                                label: "Sales",
                                tension: 0.4,
                                borderWidth: 0,
                                pointRadius: 0,
                                borderColor: "#cb0c9f",
                                borderWidth: 3,
                                backgroundColor: gradientStroke1,
                                fill: true,
                                data: data_bulan,
                                maxBarThickness: 6
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                },
                            },
                            interaction: {
                                intersect: false,
                                mode: 'index',
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                    },
                                    ticks: {
                                        display: true,
                                        padding: 10,
                                        color: '#b2b9bf',
                                        font: {
                                            size: 11,
                                            family: "Open Sans",
                                            style: 'normal',
                                            lineHeight: 2,
                                        },
                                    },
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: false,
                                        drawTicks: false,
                                        borderDash: [5, 5],
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#b2b9bf',
                                        padding: 20,
                                        font: {
                                            size: 11,
                                            family: "Open Sans",
                                            style: 'normal',
                                            lineHeight: 2,
                                        },
                                    },
                                },
                            },
                        },
                    });
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
        $(function () {
            getDataChart2();
        });

        let dataChart2 = {
            labels: [],
            data: [],
        };
        document.addEventListener("DOMContentLoaded", function(event) { 
            Echo.channel(`chart2-channel`)
            .listen('chart2Event', (e) => {
                updateData();
                if (chart2) {
                    const labelIndex = chart2.data.labels.indexOf(e.bulan_transaksi);

                    if (labelIndex !== -1) {
                        // Jika label sudah ada, tambahkan nilai jumlah_transaksi ke dataset yang sesuai
                        chart2.data.datasets[0].data[labelIndex] = parseInt(chart2.data.datasets[0].data[labelIndex]);
                        chart2.data.datasets[0].data[labelIndex] += parseInt(e.total_transaksi);
                    } else {
                        // Jika label belum ada, tambahkan label baru dan nilai jumlah_transaksi ke data chart
                        chart2.data.labels.push(e.bulan_transaksi);
                        chart2.data.datasets[0].data.push(e.total_transaksi);
                    }

                    // Optional: Batasi jumlah data di chart
                    if (chart2.data.labels.length > 7) {
                        chart2.data.labels.shift();
                        chart2.data.datasets[0].data.shift();
                    }

                    chart2.update();
                }

            });
        });
    </script>

@endsection
