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
    <link rel="stylesheet" href="{{ asset('/storage/css/signup.css') }}">
    
    <title>Logastics</title>
  </head>
  <body>
    <section class="Signup d-flex">
      <div class="Signup-left w-50 h-100">
        <div class="row justify-content-center align-content-center h-100">
          <div class="col-6">
            <div class="header">
              <h1>Get Started Now</h1>
              @if($errors->any())
              @foreach ($errors->all() as $err)
                  <p class="alert alert-danger">{{ $err }}</p>
              @endforeach
              @endif
              <form action="{{ route('register.action') }}" method="post">
                @csrf
                <div class="Signup-form">
                  <label for="name" class="form-label">Name</label>
                  <input type="name" class="form-control" id="name" placeholder="Enter your name" name="name" value="{{ old('name') }}">
                  
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="{{ old('email') }}">
                  
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" value="{{ old('password') }}">
                  
                  <label for="password" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confrimation" placeholder="Enter your password" name="password_confrimation" value="{{ old('password') }}">
                </div>
                
                <button href="{{ route('register.action') }}">Sign Up</button>
                <p class="text-center">Or</p>
                <h5 class="text-center">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #FFCC1D">Sing In</a></h5>
              </form>
             </div>
            </div>
          </div>
        </div>

      <div class="Signup-right w-50 h-100">
        <h4 class="text-light fw-bold">Lo<span class="kuning">gas</span>tics 
        <br>
        <span class="quick">Quickest & Safest Delivery</span></h4>
      </div>
    </section>
  </body>
</html>