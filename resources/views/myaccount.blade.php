@extends('layouts.container')
​
@section('title','My account')
​
@section('content')
​
​
<h1>My Account</h1>
<br>
​
​
@if(Auth::user() && Auth::user()->admin == true)
<form action="/user-control" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    @if($user->banned == false)
    <button name="status" value="ban">Ban user</button>
    @elseif($user->banned == true)
    <button name="status" value="unban">Unban user</button>
    @endif
</form>
@endif
​
​
​
<div class="user-page">
    <div class="user-profile user-pg-frame">
        <h2>Profile</h2>
        <div class="user-details">
            <div class="user-picture">
                <img src="{{$user->image}}" alt="profile picture">
            </div>
            <div class="user-info">
                <p><strong>Name: </strong> {{ $user->name }} </p>
                <p><strong>E-mail: </strong> {{ $user->email }} </p>
                <p><strong>Phone number: </strong> {{ $user->phone_number }} </p>
            </div>
        </div>
        <a href="/user/edit/{{auth()->user()->id}}" class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Edit</a>
    </div>
    ​
    <div class="user-services user-pg-frame">
        <h2>Provided Services:</h2>
        @foreach($user->services as $service)
        <br>
        <h3>{{$service->name}}</h3>
        ​
        <a class="read-more-toggle">Read More <i class="fas fa-angle-down"></i></a>
        <div class="read-more-content">
            <br>
            <h5>Short description:</h5>
            <p> {{$service->short_description}}</p>
            ​
            <h5>Complete description:</h5>
            <p> {{$service->long_description}}</p>
            ​
            <h5>Date created:</h5>
            <p>{{date('d.m.Y', strtotime($service->created_at))}}</p>
            ​
        </div>
        ​
        ​
        @if(Auth::user() && Auth::user()->id == $user->id)
        <p>(<a href="/services/edit/{{$service->id}}">Update</a>/
            <a id="delete" href="/services/delete/{{$service->id}}">Delete</a>)</p>
        ​
        @endif
        @endforeach
    </div>
</div>
<div class="result"></div>





<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(function() {

        $('#delete').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/services/delete/{{$service->id}}',
                type: 'post',
                data: $('#form').serialize(),
                success: function(result) {
                    if (result) {
                        console.log(result);
                        $('.result').html(result);
                    } else {
                        $.each(result.errors, function(key, value) {
                            $('.alert').show();
                            $('.alert').append('<p>' + value + '</p>');
                        })
                        console.log(result);
                    };
                },
                error: function(err) {
                    // if there's an error with the call
                    console.log('error with ajax call');
                    console.log(result);
                }
            });
        });
    });

    /*
     *
     */

    // Hide the extra content initially, using JS so that if JS is disabled, no problemo.
    $('.read-more-content').addClass('hide');

    // Set up the toggle.
    $('.read-more-toggle').on('click', function() {
        $(this).next('.read-more-content').toggleClass('hide');
    });
</script>


@endsection