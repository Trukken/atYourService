@extends('layouts.container')

@section('title','Add service')

@section('content')
<div class="add-service-body">
@if (!Auth::user())
<div class="">
    <p> <a href="/login">Log in</a> to post an offer!</p>
</div>

@elseif(Auth::user())


<div class="form-container">
    <h1>Add a service</h1>
    <form id="resultForm" action="" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
        <label for="servicename">Service: </label>
        <br>
        <input type="text" class="inner" name="servicename">
        <br>
        <label for="shortdescription">Write a short description (max. 144 characters): </label>
        <br>
        <textarea name="shortdescription" class="inner" maxlength="144" cols="30" rows="5"></textarea>
        <br>
        <label for="longdescription">Full description: </label>
        <br>
        <textarea name="longdescription" class="inner" maxlength="500" cols="30" rows="10"></textarea>
        <br>
        <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Send</button>
        <!-- <input type="submit" name="submit" value="send"> -->
    </form>
</div>
<div class="result"></div>
@endif
</div>

<div  class="h-100 d-flex justify-content-center align-items-center">
        <div class="container">
        <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

            <!--Form with header-->
            <div class="card wow fadeIn" data-wow-delay="0.3s">
            <div class="card-body">

                <!--Header-->
                <div class="form-header peach-gradient">
                <h3><img src="{{asset('images/justlogo.png')}}"> Add a service</h3>
                </div>

                <!--Body--> 
                <form action="" method="POST">
                    @csrf
                    <div class="md-form">
                        <i class="fas fa-user prefix" onclick="document.querySelector('.name-input').focus()"></i>
                        <input type="text" id="orangeForm-name" name="name" class="form-control">
                        <label for="orangeForm-name" onclick="className='active'; document.querySelector('.name-input').focus()">Your name</label>
                    </div>

                    <div class="md-form" onclick="document.querySelector('.email-input').focus()">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="text" id="orangeForm-email" name="email" class="form-control" value="{{ Session::get('email') }}">
                        <label for="orangeForm-email" onclick="className='active'; document.querySelector('.email-input').focus()">Your email</label>
                    </div>
                
                    <div class="md-form">
                        <i class="fas fa-lock prefix" onclick="document.querySelector('.password-input').focus()"></i>
                        <input type="password" id="orangeForm-pass" name="password" class="form-control">
                        <label for="orangeForm-pass">Your password</label>
                    </div>
                    
                    <div class="md-form">
                        <i class="fas fa-lock prefix" onclick="document.querySelector('.password_confirmation-input').focus()"></i>
                        <input type="password" id="orangeForm-pass" name="password_confirmation" class="form-control">
                        <label for="orangeForm-pass" onclick="className='active'; document.querySelector('.password_confirmation-input').focus()">Confirmation password</label>
                    </div>

                    <div class="md-form">
                        <i class="fas fa-phone prefix" onclick="document.querySelector('.phone-input').focus()"></i>
                        <input type="text" id="orangeForm-pass" name="phone" class="form-control">
                        <label for="orangeForm-pass" onclick="className='active'; document.querySelector('.phone-input').focus()">Your phone number</label>
                    </div>
                    
                    <input type="hidden" name="token" id="token">

                    <div class="text-center">
                    <input class="btn peach-gradient btn-rounded btn-lg waves-effect waves-light" type="submit" name="submit" value="Submit">
                    </div>
                </form>

            </div>
            </div>
            <!--/Form with header-->

        </div>
        </div>
    </div>
    </div>
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
