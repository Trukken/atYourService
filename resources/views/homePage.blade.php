@extends('layouts.container')

@section('title','Atyourservice')

@section('header')
<link rel="stylesheet" href="{{ URL::asset('css/homepage.css')}}">

@endsection

@section('title','Home')

@section('content')

<section id="home">

  <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('{{asset('images/background.jpg')}}'); 
background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-purple-slight">
      <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row pt-5 mt-3">
          <div class="col-md-12 wow fadeIn mb-3">
            <div class="text-center">
              <h1 class="display-4 font-weight-bold mb-5 wow fadeInUp"><span>@</span>YourService</h1>
              <h5 class="mb-5 wow fadeInUp" data-wow-delay="0.2s">Linking expats to experts in Luxembourg</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h1><span>@</span>YourService</h1>
  <h2>Linking expats to experts in Luxembourg</h2>

  <div class="search-container position-relative">
    <form action="/search-results" method="post" id="form" class="form-inline mr-auto search-box">
      {{ csrf_field() }}
      <div class="search-results-and-buttom d-flex align-items-start justify-between">
        <div class="search-and-results">
          <input class="form-control mr-sm-2 position-relative searchhome" type="text" name="searchbar" id="search" autocomplete="off" placeholder="Search" aria-label="Search">
          <br>
          <div class="result dropdown-menu input-dropdown-menu position-relative resulthome" id="result"></div>
        </div>
        <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>

      </div>
    </form>
  </div>

</section>
<!--View random offers-->

<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide Mockup used to create the displayed carousel, and cards, later on removed-->

    <div class="carousel-item mockup-carousel-item">

      <div class="col-md-4 mockup-col-md-4">
        <div class="card mb-2 text-center">
          <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text"></p>
            <a href="/services/detail/"><button class="btn peach-gradient">Details</button></a>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--/.First slide-->
  <!--Slides-->

  <!--Controls-->
  <div class="controls-top">
    <button class="btn-floating" href="#multi-item-example" data-slide="prev">
      <img id="btn" src="{{ URL::asset('images/arrow_left.svg')}}" alt="">
    </button>
    <button class="btn-floating" href="#multi-item-example" data-slide="next">
      <img id="btn" src="{{ URL::asset('images/arrow_right.svg')}}" alt="">
    </button>
  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->



<!-- AJAX call to create a live search -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
  let $input = $('#result');
  $('.result').css('display', 'none');

  $(function() {
    $('#search').keyup(function(e) {
      e.preventDefault();

      if ($('#search').val() !== '' && $('#search').val().length > 2) {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: '/livesearch',
          type: 'get',
          data: $('#search').serialize(),
          success: function(result) {
            $('.result').html(result);
            if (result !== '') {
              $('.result').css('display', 'block');
            } else {
              $('.result').css('display', 'none');
            }
          },
          error: function(err) {
            // If ajax errors happens
            $('.result').html('Error with ajax call');
          }
        });
      } else {
        $('#result').css('display', 'none');

      }
      //let $value = $(this).val();

    });
  });


  let cards = <?= $randomservices ?>;
  console.log(cards);
  let counter = 0;
  let slide = document.querySelector('.mockup-carousel-item');
  let liveSlide = slide.cloneNode(true);
  let item = document.querySelector('.mockup-col-md-4');
  for (const card of cards) {
    let newClone = item.cloneNode(true);
    item.remove();
    newClone.className = 'col-md-4';
    newClone.querySelector('h4').innerText = card.name;
    newClone.querySelector('img').src = card.image;
    newClone.querySelector('h4').innerText = card.title;
    newClone.querySelector('p').innerText = card.short_description;
    newClone.querySelector('a').href = "/services/detail/" + card.id;



    if (counter % 3 == 0 || counter == 0) {

      let newSlide = slide.cloneNode(true);
      newSlide.className = ('carousel-item');
      let slideHolder = document.querySelector('.carousel-inner');
      slideHolder.append(newSlide);
      liveSlide = newSlide;
      if (counter == 0) {
        liveSlide.className = 'carousel-item active';
      }
    }

    liveSlide.append(newClone);
    counter++;
  }
  document.querySelector('.mockup-carousel-item').remove();
</script>
@endsection