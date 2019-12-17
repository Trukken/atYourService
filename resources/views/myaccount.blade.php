@extends('layouts.container')

@section('title','My account')
@section('content')

<div class="myaccount-container">
    <div class="container">
        <div class="card user-account-card myaccount-cards">
            <div class="card-body">
                <!--Header-->
                <div class="form-header peach-gradient text-align-center">
                    <h3>Profile</h3>
                </div>
                <div class="card-flex d-flex justify-content-around align-items-center">
                    <img src="{{$user->image}}" alt="profile picture">
                    @if(Auth::user() && Auth::user()->id == $user->id || Auth::user() && Auth::user()->admin == true)
                    <form id="form" class="account-form" action="/user/edit/{{$user->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name">Name:</label>
                        <input type="text" class="inner editing-user form-control" name="name" value="{{$user->name}}">
                        <br>
                        <label for="phone">Phone number:</label>
                        <br>
                        <input name="phone_number" class="inner editing-user form-control" value="{{ $user->phone_number}}">
                        <br>
                        <label for="image">profile picture url:</label>
                        <br>
                        <input name="image" class="inner editing-user form-control" value="{{ $user->image}}">
                        <br>
                        <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light d-flex justify-content-center button-account" type="submit">Edit account</button>
                        ​
                    </form>
                    @else
                        <div class="account-form">
                            <h2 class="inner editing-user">{{ $user->name }}</h2>
                            <h2 class="inner editing-user">{{ $user->email }}</h2>
                            <h2 class="inner editing-user">{{ $user->phone_number }}</h2>
                        </div>

                    @endif
                </div>
            </div>
            @if(Auth::user() && Auth::user()->admin == true)
            <form action="/user-control" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                @if($user->banned == false)
                <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light button-account" name="status" value="ban">Ban user</button>
                @elseif($user->banned == true)
                <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light button-account" name="status" value="unban">Unban user</button>
                @endif
            </form>
            @endif
        </div>
        <!-- SERVICES CARD -->

        <div class="card user-account-card second-user-card myaccount-cards">
            <div class="card-body">
                <div class="form-header peach-gradient text-align-center">
                    <h3>Provided Services</h3>
                </div>
                <p class="card-text">
                    @foreach($user->services as $service)
                    <br>
                    <h3 class="read-more-toggle">{{$service->name}} <i class="fas fa-angle-down"></i></h3>
                    <div class="read-more-content">
                        @if(Auth::user() && Auth::user()->id == $user->id || Auth::user() && Auth::user()->admin == true)
                        <form action="/user/{{$service->id}}" class="user-form" method="POST">
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
                                <textarea name="long_description" class="form-control my-account-form" cols="30" rows="10">{{ $service->long_description }}</textarea>
                            </div>

                            <div class="buttonflex d-flex justify-content-between w-100">
                                <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Edit</button>
                            </form>
                            ​<a href="/services/delete/{{$service->id}}" class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Delete</a>
                        </div>
                        @else
                            <div class="user-form">
                                <br>
                                <h3 class="my-account-form"><a href="/services/detail/{{ $service->id }}">{{$service->name}}</a></h3>
                                <p class="my-account-form">{{ $service->long_description }}</p>
                            </div>
                        @endif
                    </div>
                    @endforeach
            </div>
        </div>
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
@endsection
