@extends('layouts.container')
​
@section('title','My account')
​
@section('content')
<section id="myaccount">
    
    <h1>My services:</h1>
    <h2>{{$user->name}}</h2>
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
    @foreach($user->services as $service)
    <br>
    <h3>{{$service->name}}</h3>
    
    <a class="read-more-toggle">Read More <i class="fas fa-angle-down"></i></a>
    <div class="read-more-content">
        <br>
        <h5>Short description:</h5>
        <p> {{$service->short_description}}</p>
    
        <h5>Complete description:</h5>
        <p> {{$service->long_description}}</p>
    
        <h5>Date created:</h5>
        <p>{{date('d.m.Y', strtotime($service->created_at))}}</p>
    
    </div>
    
    
        @if(Auth::user() && Auth::user()->id == $user->id)
        <p>(<a href="/services/edit/{{$service->id}}">Update</a>/
        <a id="delete" href="/services/delete/{{$service->id}}">Delete</a>)</p>
    
        @endif
    @endforeach
    <div class="result"></div>
    
</section>





<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
@if(!empty($service->id))
<script>
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo.
    $('.read-more-content').addClass('hide');

    // Set up the toggle.
    $('.read-more-toggle').on('click', function() {
        $(this).next('.read-more-content').toggleClass('hide');
    });
</script>
@endif

@endsection