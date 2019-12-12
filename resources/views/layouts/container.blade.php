<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <title>@yield('title')</title>
    @yield('header')
</head>

<body>

<!--Navbar -->
<header>
  <a class="navbar-brand" href="/homePage"><img src="{{asset('images/logo5.png')}}" alt=""></a>
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


<!--Footer-->
<footer class="page-footer pt-0">

<!--Footer Links-->
<div class="container">

  <!--First row-->
  <div class="row">

    <!--First column-->
    <div class="col-md-12 wow fadeIn" data-wow-delay="0.3s">

      <div class="text-center d-flex justify-content-center my-4">

        <!--Facebook-->
        <a class="p-2 m-2 fa-lg fb-ic"><i class="fab fa-facebook-f white-text fa-lg pr-md-4"> </i></a>
        <!--Twitter-->
        <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter white-text fa-lg pr-md-4"> </i></a>
        <!--Google +-->
        <a class="p-2 m-2 fa-lg gplus-ic"><i class="fab fa-google-plus-g white-text fa-lg pr-md-4"> </i></a>
        <!--Linkedin-->
        <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-linkedin-in white-text fa-lg pr-md-4"> </i></a>
        <!--Instagram-->
        <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text fa-lg pr-md-4"> </i></a>
        <!--Pinterest-->
        <a class="p-2 m-2 fa-lg pin-ic"><i class="fab fa-pinterest white-text fa-lg pr-md-4"> </i></a>
      </div>

    </div>
    <!--/First column-->

  </div>
  <!--/First row-->

</div>
<!--/Footer Links-->

<!--Copyright-->
<div class="footer-copyright py-3 text-center wow fadeIn" data-wow-delay="0.3s">
  <div class="container-fluid">
    © 2019 Copyright: atYourService </a>
  </div>
</div>
<!--/.Copyright-->

</footer>
    <!--  SCRIPTS  -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>

</html>
