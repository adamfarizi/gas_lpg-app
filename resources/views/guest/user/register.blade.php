<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/local/logo1.png') }}">
    <title>
        GasTrack | @yield('title', $title)
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    <main class="main-content  mt-0">
        <section>
        <div class="page-header min-vh-75">
            <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-5">
                    <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-primary text-gradient">Get Started Now</h3>
                    <p class="mb-0">Enter your personal data to register</p>
                    </div>
                    <div class="card-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $err)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white"><strong>Alert!</strong> {{ $err }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                
                        @endforeach
                    @endif
                    <form role="form" action="{{ route('register.action') }}" method="post">
                        @csrf
                        <label>Name <span class="text-danger">*</label>
                        <div class="mb-3">
                            <input type="test" class="form-control" placeholder="Enter your name" aria-label="Name" aria-describedby="name-addon" id="name" name="name" value="{{ old('name') }}">
                        </div>

                        <label>Email <span class="text-danger">*</label>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Enter your email" aria-label="Email" aria-describedby="email-addon" id="email" name="email" value="{{ old('email') }}">
                        </div>

                        <label>Password <span class="text-danger">*</label>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Enter your password" aria-label="Password" aria-describedby="password-addon" id="password" name="password" value="{{ old('password') }}">
                        </div>

                        <label>Confirm Password <span class="text-danger">*</label>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Confirm your password" aria-label="Password" aria-describedby="password-addon" id="password_confrimation" name="password_confrimation" value="{{ old('password') }}">
                        </div>

                        <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0" href="{{ route('register.action') }}">Sign up</button>
                        </div>
                    </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mt-4 mb-4 text-sm mx-auto">
                        Already have an account?                         
                        <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                    </p>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/local/bg_login2.png')"></div>
                            <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-color: rgba(0, 0, 0, 0.5);">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <img src="{{ asset('assets/img/local/logo6.png') }}" class="me-10" alt="main_logo" style="max-width: 20%; max-height: 20%;">
                                </div>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>