@extends('app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top bg-hitam" id="navMain">
  <div class="container">
    <a class="navbar-brand fw-bold mx-5" href="{{ route('home') }}">Lo<span class="kuning">gas</span>tics</a>

    <!-- Tombol toggle untuk menu seluler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu di tengah -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item mx-5">
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item mx-5">
          <a class="nav-link" href="#">Track</a>
        </li>
        <li class="nav-item mx-5">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <div class="navbar-nav ml-auto">
        @auth
        <a class="nav-link active">{{ Auth::user()->name }}</a></p>
        <a class="nav-link link-danger" href="{{ route('logout') }}">Logout</a>     
        @endauth
        @guest
        <a class="btn button-primary" href="{{ route('login') }}">Sign In</a>
        <a class="btn button-secondary me-3 text-uppercase fw-bold" href="{{ route('register') }}">Sign Up Free</a>
        @endguest
      </div>
    </div>
  </div>
</nav>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('/storage/css/style.css') }}">

    <title>Logastics</title>
  </head>
  <body>

    <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent bg-hitam" id="navMain">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold mx-5" href="#">Lo<span class="kuning">gas</span>tics</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item mx-5">
                <a class="nav-link active" aria-current="page" href="">Home</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" href="{{ route('track') }}">Track</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" href="{{ route('about') }}">About</a>
              </li>
            </ul>

            <div>
              @yield('user')
              
            </div>
          </div>
        </div>
      </nav>

    <!-- Header -->
    <section>
      <div class="title" style="background-image: url(/storage/img/Home/Hero.png)">
        <div class="container-fluid">
          <div class="container">
            <div class="row">
              <div class="col-lg-7 d-flex flex-column justify-content-center pt-5" style="margin-top: 8%">
                <h2 class="fw-bold">Quickest & <br>Safest Delivery</h2>
                <p class='mt-3'>Fueling progress with smart, secure gas logistics, ensuring efficiency <br>in every mile of delivery for a brighter, sustainable tomorrow</p>
                <div class="search-box mt-2 p-3 ps-4" style="border-radius: 5px; background: rgba(255, 255, 255, 0.15);backdrop-filter: blur(2px);">
                  <p>Enter your tracking number</p>
                  <input class="search-input ps-2" type="text" name="" placeholder="Tracking No.">
                  <button class="search-button" href="#">TRACK YOUR SHIPMENT</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Title -->
    <section>
      <div class="container p-4">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 text-center pt-5">
              <h4 class="fw-bold">Fueling efficiency and tracking precision <br>for your gas delivery</h4>
              <img src="{{ asset('/storage/img/Home/Line.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Keunggulan -->
    <section>
        <div class="container p-5 mb-4">
            <div class="row align-items-center">
              <div class="col-3 offset-1 rounded bg-abu" style="width: 310px; height: 228px;">
                  <img src="{{ asset('/storage/img/Home/icon1.png') }}" class="card-img mt-3 ms-3" alt="" style="width: 50px; height: 50px; ">
                  <div class="card-body">
                    <h5 class="card-title fw-bold">User Friendly</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                </div>
              <div class="col-3 offset-1 bg-light rounded shadow " style="width: 310px; height: 228px;">
                  <img src="{{ asset('/storage/img/Home/icon2.png') }}" class="card-img mt-3 ms-3" alt="" style="width: 50px; height: 50px;">
                  <div class="card-body">
                    <h5 class="card-title fw-bold">Accurate</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
              </div>
              <div class="col-3 offset-1 rounded bg-abu" style="width: 310px; height: 228px;">
                  <img src="{{ asset('/storage/img/Home/icon3.png') }}" class="card-img mt-3 ms-3" alt="" style="width: 50px; height: 50px;">
                  <div class="card-body">
                    <h5 class="card-title fw-bold">Full TIme Monitoring</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
              </div>
            </div>
        </div>
    </section>

    <!-- Middle -->
    <section>
      <div class="container-fluid">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-5 offset-1 p-5">
              <img src="{{ asset('/storage/img/Home/Gas1.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-1">
              <img src="{{ asset('/storage/img/Home/Line2.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-5">
              <h4 class="fw-bold">Lorem ipsum dolor sit amet <br>& consectetur adipiscing elit</h4>
              <p class="pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br> sed do eiusmod tempor incididunt ut labore et <br>dolore magna aliqua. Gravida cum sociis natoque<br> penatibus et magnis dis parturient montes.
              <br><br>
              Feugiat in fermentum posuere urna nec tincidunt<br> praesent. Laoreet id donec ultrices tincidunt arcu non<br> sodales neque. Cursus in hac habitasse platea <br>dictumst quisque sagittis purus sit. Volutpat<br> commodo sed egestas egestas.</p>
              <button class="learn-button" href="#">LEARN MORE</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bottom -->
    <section class="bottom">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-1 offset-1 pt-3">
              <img src="{{ asset('storage/img/Home/Line3.png') }}" alt="">
            </div>
            <div class="col-8 pt-3 me-5">
              <h4 class="fw-bold">Join us today for a better gas logistics experience. Register now and get the benefits !</h4>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sign Up-->
    <section class="d-flex justify-content-center mt-5">
      <div class="card shadow-lg">
        <div class="row">
          <div class="col-7">
            <div class="card-body">
              <div class="signup-form">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name">
      
                <label for="emai" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email">
      
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password">
      
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password">
                <button class="signup" href="#">Sign-Up</button>
              </div>
            </div>
          </div>
          <div class="col-4 offset-1">
            <img src="{{ asset('/storage/img/Home/Cewek.png') }}" alt="" >
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <section class="footer">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-light">
            <img src="{{ asset('/storage/img/Home/Line.png') }}" alt="" class="pb-4">
            <h4 class="pb-4">Lo<span class="kuning">gas</span>tics</h4>
            <ul class="list-unstyled text-center text-light">
              <li class="list-inline-item"><i>Lorem Ipsum</i></li>
              <li class="list-inline-item"><i>Lorem Ipsum</i></li>
              <li class="list-inline-item"><i>Lorem Ipsum</i></li>
              <li class="list-inline-item"><i>Lorem Ipsum</i></li>
            </ul>
          </div>
        </div>	
        <div class="row">
          <div class="col-sm-12 col-md-12 mt-2 mt-sm-5">
            <h6 class="text-center">© 2023 Logastics. All rights reserved.</h6>
          </div>
        </div>	
      </div>
    </section>

  <!-- Javascript -->
  <script src="{{ asset('storage/js/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

  @endsection