<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('/storage/css/style.css') }}">

    <title>Logastics</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-hitam" id="navMain">
        <div class="container-fluid mx-5">
          <a class="navbar-brand fw-bold mx-5 text-light" href="#">Lo<span class="kuning">gas</span>tics</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item mx-5">
                <a class="nav-link" aria-current="page" href="">Home</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" href="#">Track</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link active" href="#">About</a>
              </li>
            </ul>

            <div>
                @yield('user')
                
            </div>
          </div>
        </div>
    </nav>

      <!-- Header -->
      <section class="Top">
            <div class="container">
                <div class="row p-5 justify-content-center align-content-center">
                    <div class="col-6 p-5" style="margin-top: 5%">
                        <h4>Lorem ipsum dolor sit amet & <span class="text-secondary">Consectetur adipiscing elit</span></h4>
                    </div>
                    <div class="col-5 offset-1 p-5" style="margin-top: 5%">
                        <p>Logastics is an online platform specifically designed to monitor and oversee gas distribution operations. The website's primary objective is to provide information about gas distribution to customers and internal staff. This platform offers features that enable gas distributors to run their operations more efficiently.</p>
                    </div>
                </div>
            </div>
      </section>

      <!-- Cover -->
      <section>
        <div class="cover" style="background-image: url(/storage/img/Home/cover.png)"></div>
      </section>

      <!-- Atas -->
      <section class="atas">
        <div class="container-fluid">
            <div class="container">
                <div class="row pt-5 justify-content-center align-content-center">
                    <img src="{{ asset('storage/img/Home/Line5.png') }}" alt="">
                    <div class="col-5 pt-5">
                        <h4></span>Lorem ipsum dolor sit amet & consectetur adipiscing elit</h4>
                        <img src="{{ asset('storage/img/Home/about.png') }}" alt="" style="margin-top:72px">
                    </div>
                    <div class="kutipan col-4 offset-2 pt-5">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Gravida cum sociis natoque penatibus et magnis dis parturient montes. 
                        <br>
                        <br>
                        Feugiat in fermentum posuere urna nec tincidunt praesent. Laoreet id donec ultrices tincidunt arcu non sodales neque. Cursus in hac habitasse platea dictumst quisque sagittis purus sit. Volutpat commodo sed egestas egestas.</p>

                        <h4>“Our goal is to build software that gives customer-facing teams at SMBs the ability to create fruitful and enduring relationships with customers.”</h4>
                    </div>
                    
                    <img src="{{ asset('storage/img/Home/Line5.png') }}" alt="" class="p-5">
                </div>
            </div>
        </div>
      </section>

      <!-- Fitur --->
      <section class="fitur">
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center align-content-center">
                    <div class="col-3">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h4 class="fw-bold">290+</h4>
                    </div>
                    <div class="col-3 offset-1">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h4 class="fw-bold">290+</h4>
                    </div>
                    <div class="col-3 offset-1">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <h4 class="fw-bold">290+</h4>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!-- Carousel -->
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('storage/img/Home/carousel1.png') }}" class="d-block w-100" alt="">
            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
             <h5>Have a question? Our team is happy to assist you</h5>
             <button class="text-uppercase fw-bold text-light">Contact us</button><span>or call +62 881026268115</span>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('storage/img/Home/carousel2.jpg') }}" class="d-block w-100" alt="">
            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
              <h5>Have a question? Our team is happy to assist you</h5>
              <button class="text-uppercase fw-bold text-light">Contact us</button><span>or call +62 881026268115</span>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('storage/img/Home/carousel3.jpg') }}" class="d-block w-100" alt="">
            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
              <h5>Have a question? Our team is happy to assist you</h5>
              <button class="text-uppercase fw-bold text-light">Contact us</button><span>or call +62 881026268115</span>
            </div>
          </div>
        </div>
      </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>