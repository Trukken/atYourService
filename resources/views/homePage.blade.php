@extends('layouts.container')


@section('title','Yamm')

@section('content')

<!--Search section-->
<h2>Search a service: </h2>

<div class="container">
    <form action="/search-results" method="post" class="search-box" id="form">
        {{ csrf_field() }}
        <input type="text" name="searchbar" id="search" autocomplete="off">
        <input type="submit" value="search">
    </form>

    <div class="result dropdown-menu input-dropdown-menu"></div>
</div>


<!--View random offers-->
<h4>Random services: </h4>
@foreach($randomservices as $randomservice)
<a href="#">

    <p>
        <strong>{{$randomservice->name}}</strong>
        <br>
        <strong>Description: </strong> {{$randomservice->short_description}}
    </p>

</a>
<hr>
@endforeach

<!-- AJAX call to create a live search -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
    $(function() {
        $('#search').keyup(function(e) {
            console.log($(this).val());
            //let $value = $(this).val();
            e.preventDefault();
            $.ajax({
                url: '/livesearch',
                type: 'post',
                data: $('#search').serialize(),
                success: function(result) {
                    console.log(typeof(result));
                    $('.result').html('<p>' + result + '</p>');
                    console.log(result);
                },
                error: function(err) {
                    // If ajax errors happens
                    $('.result').html('Error with ajax call');
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@endsection