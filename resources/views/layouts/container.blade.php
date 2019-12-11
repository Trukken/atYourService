<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <title>@yield('title')</title>
    @yield('header')

</head>

<body>

<!--Navbar -->
<header>
    <a class="navbar-brand" href="/home"><img src="{{asset('images/logo5.png')}}" alt=""></a>

<nav class="mb-1 navbar navbar-expand-lg navbar-dark lighten-1">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">Contact us</a>
      </li>
      @if(!Auth::user())
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
      @endif
      @if(Auth::user())
      <li class="nav-item">
        <a class="nav-link" href="/myaccount">My account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Log out</a>
      </li>
      @endif
    </ul>
   
  </div>
</nav>
<!--/.Navbar -->
</header>

    <div class="content">
        @yield('content')
    </div>


<footer>
  
<!-- Copyright -->
<div>© 2019 Copyright: JFS Company</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
