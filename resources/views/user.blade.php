@extends('Home')
@section('user')
    @auth
        <p class="text-center" style="background-color: #FFCC1D"><b>{{ Auth::user()->name }}</b></p>
        <a class="btn button-primary" href="{{ route('logout') }}">Logout</a>
        
    @endauth
    @guest
        <a class="btn button-primary" href="{{ route('login') }}">Sign In</a>
        <a class="btn button-secondary me-3 text-uppercase fw-bold" href="{{ route('register') }}">Sign Up Free</a>
    @endguest
@endsection