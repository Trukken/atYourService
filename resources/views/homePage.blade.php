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

            <div class="carousel-item" style="display:hidden;">

                    <div class="col-md-4">
                      <div class="card mb-2">
                        <img class="card-img-top"
                          src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                          alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title</h4>
                          <p class="card-text"></p>
                          <a class="btn btn-primary">Button</a>
                        </div>
                      </div>
                    </div>

                  </div>

    <div class="carousel-item active">

            <div class="col-md-4">
              <div class="card mb-2">
                <img class="card-img-top"
                  src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                  alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                  <a class="btn btn-primary">Button</a>
                </div>
              </div>
            </div>

          </div>
          <!--/.First slide-->
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
        <!--/.Slides-->

      </div>
      <!--/.Carousel Wrapper-->
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

  let $cards = <?php echo $randomservices; ?> ;

  let counter = 1;
  for(const card of $cards) {
    const mockup = document.querySelector(".col-md-4");
    const newClone = mockup.cloneNode(true);
    if (counter % 3 == 0) {
      let newItem = document.querySelector(".carousel-item").cloneNode(true)
      document.querySelector(".carousel-inner").appendChild(newItem);
      newItem.append(newClone);
    } else {
        document.querySelector(".carousel-item").append(newClone);

    }
    newClone.querySelector("img").innerText = card.image;
    newClone.querySelector("h4").innerText = card.title;
    newClone.querySelector("p").innerText = card.description;
    newClone.querySelector("a").href = card.url;
    counter++;

}
  document.querySelectorAll(".col-md-4")[0].style.display = "none";
</script>
@endsection
