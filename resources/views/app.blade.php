<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/local/logo1.png') }}">
        <title>GasTrack | @yield('title', $title)</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css">
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
        <!-- Nepcha Analytics (nepcha.com) -->
        <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
        <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
    </head>

    <body class="g-sidenav-show  bg-gray-100">
        @yield('sidebar')
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @if (Auth::check()) <!-- Memeriksa apakah pengguna sudah login -->
                <div class="position-fixed top-2 end-2 d-flex flex-column" style="z-index: 100;">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="min-width: 300px;  display: none;" id="toast_transaksi">
                        <span class="alert-icon me-3">
                            <i class="fa fa-solid fa-check-to-slot" style="color: #ffffff;"></i>
                        </span>
                        <span class="alert-text text-white">Pesanan masuk dari </span>
                        <span class="alert-text text-white fw-bold" id="agen_name"></span>
                        <button type="button" class="btn-close pt-3" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-info alert-dismissible fade show" role="alert" style="min-width: 300px; display: none;" id="toast_pembayaran">
                        <span class="alert-icon me-3">
                            <i class="fa fa-solid fa-money-bill-transfer" style="color: #ffffff;"></i>
                        </span>
                        <span class="alert-text text-white fw-bold" id="agen_name2"></span>
                        <span class="alert-text text-white"> telah membayar !</span>
                        <button type="button" class="btn-close pt-3" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="min-width: 300px; display: none;" id="toast_selesai">
                        <span class="alert-icon me-3">
                            <i class="fa fa-solid fa-hand-holding-heart" style="color: #ffffff;"></i>
                        </span>
                        <span class="alert-text text-white fw-bold" id="agen_name3"></span>
                        <span class="alert-text text-white"> telah menerima pesanan !</span>
                        <button type="button" class="btn-close pt-3" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif         
            @yield('navbar')
            <div class="container-fluid py-4">
                @yield('content')
                <div class="fixed-plugin">
                        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                        <i class="fa fa-cog py-2"> </i>
                        </a>
                        <div class="card shadow-lg ">
                        <div class="card-header pb-0 pt-3 ">
                            <div class="float-start">
                            <h5 class="mt-3 mb-0">GasTrack Configurator</h5>
                            <p>See our dashboard options.</p>
                            </div>
                            <div class="float-end mt-4">
                            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                                <i class="fa fa-close"></i>
                            </button>
                            </div>
                            <!-- End Toggle Button -->
                        </div>
                        <hr class="horizontal dark my-1">
                        <div class="card-body pt-sm-3 pt-0">
                            <!-- Sidenav Type -->
                            <div class="mt-3">
                            <h6 class="mb-0">Sidenav Type</h6>
                            <p class="text-sm">Choose between 2 different sidenav types.</p>
                            </div>
                            <div class="d-flex">
                            <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                            <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2 active" data-class="bg-white" onclick="sidebarType(this)">White</button>
                            </div>
                            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                            <!-- Navbar Fixed -->
                            <div class="mt-3">
                            <h6 class="mb-0">Navbar Fixed</h6>
                            </div>
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                            </div>      
                        </div>
                    </div>
                </div>
                <footer class="footer pt-3  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                document.write(new Date().getFullYear())
                                </script>
                                | GasTrack Team
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        @vite('resources/js/app.js')
        <script>
            document.addEventListener("DOMContentLoaded", function(event) { 
                Echo.channel(`newtran-channel`)
                .listen('newTranEvent', (e) => {
                    // Ambil elemen pesan dan elemen agen name
                    const toast_transaksi = document.getElementById('toast_transaksi');
                    const agen_name = document.getElementById('agen_name');

                    // Ubah teks pesan dengan data yang diterima dari event
                    agen_name.textContent = e.agen_new;

                    // Tampilkan elemen pesan
                    toast_transaksi.style.display = 'block';

                    // Sembunyikan pesan setelah beberapa detik (misalnya, 5 detik)
                    setTimeout(function() {
                        toast_transaksi.style.display = 'none';
                    }, 5000); // 5000 milidetik = 5 detik
                });
            });
            document.addEventListener("DOMContentLoaded", function(event) { 
                Echo.channel(`updateTran-channel`)
                .listen('updateTranEvent', (e) => {
                    // Ambil elemen pesan dan elemen agen name
                    const toast_pembayaran = document.getElementById('toast_pembayaran');
                    const agen_name2 = document.getElementById('agen_name2');

                    // Ubah teks pesan dengan data yang diterima dari event
                    agen_name2.textContent = e.agen_name;

                    // Tampilkan elemen pesan
                    toast_pembayaran.style.display = 'block';

                    // Sembunyikan pesan setelah beberapa detik (misalnya, 5 detik)
                    setTimeout(function() {
                        toast_pembayaran.style.display = 'none';
                    }, 5000); // 5000 milidetik = 5 detik
                });
            });
            document.addEventListener("DOMContentLoaded", function(event) { 
                Echo.channel(`finishTran-channel`)
                .listen('finishTranEvent', (e) => {
                    // Ambil elemen pesan dan elemen agen name
                    const toast_selesai = document.getElementById('toast_selesai');
                    const agen_name3 = document.getElementById('agen_name3');

                    // Ubah teks pesan dengan data yang diterima dari event
                    agen_name3.textContent = e.agen_name;

                    // Tampilkan elemen pesan
                    toast_selesai.style.display = 'block';

                    // Sembunyikan pesan setelah beberapa detik (misalnya, 5 detik)
                    setTimeout(function() {
                        toast_selesai.style.display = 'none';
                    }, 5000); // 5000 milidetik = 5 detik
                });
            });
        </script>
        @yield('js')
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('') }}assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
    </body>
</html>