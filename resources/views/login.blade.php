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
    <link rel="stylesheet" href="{{ asset('/storage/css/login.css') }}">
    
    <title>Logastics</title>
  </head>
  <body>
    <section class="login d-flex">
      <div class="login-left w-50 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-6">
            <div class="header">
              <h1>Welcome Back !</h1>
              <p>Enter your Credentials to access your account</p>
            </div>
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if($errors->any())
            @foreach ($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <form action="{{ route('login.action') }}" method="post">
              @csrf
              <div class="login-form">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" placeholder="Enter your username" name="username" value="{{ old('username') }}">
                
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" value="{{ old('password') }}">
              </div>
              <div class="checkbox">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Remember your password
                </label>
              </div>
              
              <button href="{{ route('login.action') }}">Login</button>
              <p class="text-center">Or</p>
              <h5 class="text-center">Don’t have an account? <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #FFCC1D">Sing Up</a></h5>
            </form>
          </div>
        </div>
      </div>

      <div class="login-right w-50 h-100">
        <h4 class="text-light fw-bold">Lo<span class="kuning">gas</span>tics 
        <br>
        <span class="quick">Quickest & Safest Delivery</span></h4>
      </div>
    </section>
    
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  
    </body>
  </html>