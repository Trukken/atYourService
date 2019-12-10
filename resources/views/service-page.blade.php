@extends('layouts.container')

@section('title','Helooooooooo')

@section('content')
<h1> {{ucwords($service->name)}} </h1>

<h2>Description</h2>

{{$service->short_description}}


@if (!Auth::user())
<div class="">
    <p> <a href="/login">log in</a> to see contact information and full description</p>
</div>
@else

<div class="">
    <h2>Provider: </h2>
    {{$service->user->name}}
    <h2>Full description:</h2>
    {{$service->long_description}}
    <h2>Contact info:</h2>
    <p>
        <strong> Phone number: </strong>
        {{$service->user->phone_number}}
        <br>
        <strong> E-mail : </strong>
        {{$service->user->email}}
    </p>
</div>
@endif


<!-- COMMENTS -->

<h3>Comments: </h3>


<!--display comments-->
<div class="reload">

    @foreach($comments as $comment)
    <p>
        <strong>User: </strong> {{$comment->user->name}}
        <br>
        <strong>Date: </strong>
        <?php $date = $comment->created_at;
        $newDate = date("d.m.Y - H:i", strtotime($date));
        echo $newDate; ?>
        <br>
        <strong>Comment: </strong> {{$comment->message}}
        <hr>
    </p>
    @endforeach
</div>




<!--Leave a comment-->
@if (!Auth::user())
<div class="">
    <p> <a href="/login">log in</a> to leave a comment</p>
</div>
@else

<form id="form" action="/services/comments/add/{{$service->id}}" method="POST">
    @csrf
    <br>
    <input type="hidden" name="service_id" value="{{$service->id}}">
    <input type="hidden" name="user_id" value="{{auth::user()->id ?? '1'}}">

    <textarea name="message" id="commentfield" cols="30" rows="10" placeholder="message..."></textarea>
    <br>
    <input type="submit" name="comment" id="comment" value="Add a comment">
</form>
@foreach($errors->all() as $error)
{{$error}}
<br>
@endforeach
@endif
<div class="result"></div>
<br>



<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function() {
        $('input[type="submit"]').click(function(e) {
            console.log('you clicked');
            e.preventDefault();
            $.ajax({
                url: '/services/comments/add/{{$service->id}}',
                type: 'post',
                data: $('#form').serialize(),
                success: function(result) {
                    $('.reload').load('/services/detail/{{$service->id}}' + ' .reload');
                    $('#commentfield').val('');
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection