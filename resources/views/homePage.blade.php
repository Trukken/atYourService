@extends('layouts.container')

@section('title','Atyourservice')

@section('header')
<link rel="stylesheet" href="{{ URL::asset('css/homepage.css')}}">

@endsection

@section('title','Home')

@section('content')

<section id="home">
  <div>
    <h1><span>at</span>YourService</a></h1>
    <h2>Linking expats to experts in Luxembourg</h2>
  </div>
  <div class="search-container">
    <form action="/search-results" method="post" id="form" class="form-inline mr-auto search-box">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="text" name="searchbar" id="search" autocomplete="off" placeholder="Search" aria-label="Search">

      <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
    </form>
  </div>
  <div class="result dropdown-menu input-dropdown-menu" id="result"></div>
</section>

<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">

      <div class="col-md-4">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/men/29.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 1</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
              saepe eveniet ut et voluptates.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

      <div class="col-md-4 clearfix d-none d-sm-block">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/men/85.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 2</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing minima veniam elit. Nam
              incidunt eius est voluptatibus.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

      <div class="col-md-4 clearfix d-none d-sm-block">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/women/43.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 3</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
              adipisci velit, sed quia
              non.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

    </div>
    <!--First slide-->

    <!--Second slide-->
    <div class="carousel-item">

      <div class="col-md-4">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/women/23.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 4</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing minima veniam elit. Nam
              incidunt eius est voluptatibus.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

      <div class="col-md-4 clearfix d-none d-sm-block">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/men/83.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 5</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
              adipisci velit, sed quia
              non.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

      <div class="col-md-4 clearfix d-none d-sm-block">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/women/65.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 6</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
              saepe eveniet ut et voluptates.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

    </div>
    <!--Second slide-->

    <!--Third slide-->
    <div class="carousel-item">

      <div class="col-md-4">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/women/79.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 7</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
              adipisci velit, sed quia
              non.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

      <div class="col-md-4 clearfix d-none d-sm-block">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/men/20.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 8</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
              saepe eveniet ut et voluptates.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

      <div class="col-md-4 clearfix d-none d-sm-block">

        <!--Card-->
        <div class="card card-cascade narrower card-ecommerce">

          <!--Card image-->
          <div class="view view-cascade overlay">
            <img src="https://randomuser.me/api/portraits/men/86.jpg" class="card-img-top" alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body card-body-cascade text-center no-padding">
            <!--Category & Title-->
            <h4 class="card-title">
              <strong>
                <a href="">Service Provider 9</a>
              </strong>
            </h4>

            <!--Description-->
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing minima veniam elit. Nam
              incidunt eius est voluptatibus.
            </p>

            <!--Card footer-->
            <div class="card-footer">
              <button type="button" class="btn btn-outline-danger">Details</button>
            </div>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>

    </div>
    <!--Third slide-->

  </div>
  <!--Slides-->
  <!--Controls-->
  <div class="controls-top">
    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
      <img src="{{ URL::asset('images/arrow_left.svg')}}" alt="">
    </a>
    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
      <img src="{{ URL::asset('images/arrow_right.svg')}}" alt="">
    </a>
  </div>
  <!--Controls-->
</div>
<!--Carousel Wrapper-->



<!--View random offers-->
<h4>Random services: </h4>
@foreach($randomservices as $randomservice)
<a href="/services/detail/{{$randomservice->id}}">
  <p>
    <strong>{{ucwords($randomservice->name)}}</strong>
    <br>
    <strong>Description: </strong> {{$randomservice->short_description}}
  </p>

</a>
<hr>
@endforeach

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
</script>

@endsection