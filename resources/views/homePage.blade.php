@extends('layouts.container')
@section('header')
<link rel="stylesheet" href="{{ URL::asset('css/homepage.css')}}">

@endsection

@section('title','Home')

@section('content')

<section id="home">
  <h1><span>@</span>YourService</a></h1>
  <h2>Linking expats to experts in Luxembourg</h2>

  <div class="search-container">
    <form action="/search-results" method="post" id="form" class="form-inline mr-auto search-box">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="text" name="searchbar" id="search" autocomplete="off" placeholder="Search" aria-label="Search">

      <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
    </form>
  </div>
  <div class="result dropdown-menu input-dropdown-menu" id="result"></div>


  <!--View random offers-->

  <!--Carousel Wrapper-->
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">

        <div class="col-md-4 clearfix d-none d-sm-block">

          <!--Card-->
          <div class="card card-cascade narrower card-ecommerce">

            <!--Card image-->
            <div class="view view-cascade overlay">
              <img src="dsqdsqdsqdsqdsq" class="card-img-top" alt="">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!--Card image-->

            <!--Card content-->
            <div class="card-body card-body-cascade text-center no-padding">
              <!--Category & Title-->
              <h4 class="card-title">
                <strong>dsqdsqdsq</strong>
              </h4>

              <!--Description-->
              <p class="card-text"><strong>Description: </strong> dsqdsqdsq
              </p>
              <a href="/services/detail/dsqdsqdqsdqs22222"><button class="btn peach-gradient">Details</button></a>
            </div>
            <!--Card content-->

          </div>
          <!--Card-->


          <!--Third slide-->

        </div>
        <!--Slides-->

        <!--Controls-->
        <div class="controls-top">
          <a class="btn-floating" href="#multi-item-example" data-slide="prev">
            <img id="btn" src="{{ URL::asset('images/arrow_left.svg')}}" alt="">
          </a>
          <a class="btn-floating" href="#multi-item-example" data-slide="next">
            <img id="btn" src="{{ URL::asset('images/arrow_right.svg')}}" alt="">
          </a>
        </div>
        <!--Controls-->
      </div>
      <!--Carousel Wrapper-->
</section>



<!-- AJAX call to create a live search -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
  let $input = $('#result');
  $('.result').css('display', 'none');

  $(function() {
    $('#search').keyup(function(e) {
      e.preventDefault();

      if ($('#search').val() !== '') {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: '/livesearch',
          type: 'post',
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

  let $cards = <?php echo $randomservices; ?>;
  console.log($cards[0]);

  counter = 1;
  for (const card of $cards) {
    const mockup = document.querySelector(".col-md-4");
    const newClone = mockup.cloneNode(true);
    if (counter % 3 == 0) {
      document.querySelecto(".carousel-item").append(document.querySelector(".carousel-item").cloneNode(true));
      document.querySelector(".carousel-item").append(newClone);
    } else {
      document.querySelector(".carousel-item").append(newClone);

    }
    newClone.querySelector("img").innerText = card.image;
    newClone.querySelector("h4").innerText = card.title;
    newClone.querySelector("p").innerText = card.description;
    newClone.querySelector("a").href = card.url;
    counter++;
  }
  document.querySelectorAll(".card")[0].style.display = "none";
</script>
@endsection