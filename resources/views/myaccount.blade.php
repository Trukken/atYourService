@extends('layouts.container')

@section('title','My account')
@section('content')
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
<div class="container">
    <div class="card user-account-card">
        <div class="card-body">
            <!--Header-->
            <div class="form-header peach-gradient text-align-center">
                <h3>Profile</h3>
            </div>
            <div class="card-flex d-flex justify-content-around align-items-center">
                <img src="{{$user->image}}" alt="profile picture">
                <form id="form" class="account-form" action="/user/edit/{{$user->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="name">Name:</label>
                    <input type="text" class="inner editing-user form-control" name="name" value="{{$user->name}}">
                    <br>
                    <label for="phone">Phone number:</label>
                    <br>
                    <input name="phone_number" class="inner editing-user form-control" value="{{$user->phone_number}}">
                    <br>
                    <label for="image">profile picture url:</label>
                    <br>
                    <input name="image" class="inner editing-user form-control" value="{{$user->image}}">
                    <br>
            </div>

        </div>
        <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light d-flex justify-content-center button-account" type="submit">Edit account</button>
        ​
        </form>
    </div>
    <!-- SERVICES CARD -->

    <div class="card user-account-card second-user-card">
        <div class="card-body">
            <div class="form-header peach-gradient text-align-center">
                <h3>Provided Services</h3>
            </div>
            <p class="card-text">
                @foreach($user->services as $service)
                <br>
                <h3 class="read-more-toggle">{{$service->name}} <i class="fas fa-angle-down"></i></h3>
                <div class="read-more-content">
                    <form class="user-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Service Offered:</label>
                            <input type="text" class="form-control my-account-form" name="name" value="{{$service->name}}">
                        </div>
                        <div class="form-group">
                            <label for="shortdescription">Short description:</label>
                            <textarea name="short_description" class="form-control my-account-form" cols="30" rows="10">{{$service->short_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="long_description">Complete description:</label>
                            <textarea name="long_description" class="form-control my-account-form" cols="30" rows="10">{{$service->long_description}}</textarea>
                        </div>
                        <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Edit</button>
                    </form>
                </div>
                ​
                ​
                @if(Auth::user() && Auth::user()->id == $user->id)
                <p>(<a href="/services/edit/{{$service->id}}">Update</a>/
                    <a id="delete" href="/services/delete/{{$service->id}}">Delete</a>)</p>
                ​
                @endif
                @endforeach
            </p>
        </div>

    </div>
</div>
</div>
<!-- End of cards -->

<!-- <div class="user-page">
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
    </div> -->
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



<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
@if(!empty($service->id))
<script>
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo.
    $('.read-more-content').addClass('hide');

    // Set up the toggle.
    $('.read-more-toggle').on('click', function() {
        $(this).next('.read-more-content').toggleClass('hide');
        $(this).find('.fas').toggleClass('fa-angle-up');
    });
</script>
@endif


<!-- <script>
    $(function() {
        $('button[type="submit"]').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/services/edit/{{$service->id}}',
                type: 'put',
                data: $('.user-form').serialize(),
                success: function(result) {
                    console.log(result);
                    console.log('success');
                    $('#resultForm').html('<div>' + result + '</div>');
                },
                error: function(err) {
                    // Si une erreur AJAX se produit
                    console.log('error');
                }
            });
        });
    });
</script> -->

@endsection