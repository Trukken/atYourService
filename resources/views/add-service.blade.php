@extends('layouts.container')

@section('title','Helooooooooo')

@section('content')

@if (!Auth::user())
<div class="">
    <p> <a href="/login">log in</a> to post an offer</p>
</div>

@elseif(Auth::user())

<h1>Add a service</h1>

<form id="resultForm" action="" method="post">
    @csrf

    <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
    <label for="servicename">Service: </label>
    <br>
    <input type="text" name="servicename">
    <br>
    <label for="shortdescription">Write a short description (max. 144 characters): </label>
    <br>
    <textarea name="shortdescription" maxlength="144" cols="30" rows="5"></textarea>
    <br>
    <label for="longdescription">Full description: </label>
    <br>
    <textarea name="longdescription" maxlength="500" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" name="submit" value="send">

</form>
<div class="result"></div>
<a href="./">Back</a>
@endif


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
    $(function() {
        $('input[type="submit"]').click(function(e) {
            console.log('you clicked');
            e.preventDefault();
            $.ajax({
                url: '/add-services',
                type: 'post',
                data: $('#resultForm').serialize(),
                success: function(result) {
                    console.log('here is the result')
                    console.log(result);
                    $('.result').html('<p>' + result + '</p>');
                },
                error: function(err) {
                    // If ajax errors happens
                    console.log('ajax error');
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