@extends('layouts.container')

@section('title','Forgotpassword')

@section('content')
@if(!empty($emailError))
    {{ $emailError }}
@endif

<section id="login">
    <div  class="h-100 d-flex justify-content-center align-items-center">
        <div class="container">
        <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

            <!--Form with header-->
            <div class="card wow fadeIn" data-wow-delay="0.3s">
            <div class="card-body">

                <!--Header-->
                <div class="form-header peach-gradient">
                <h3><i class="fas fa-lock prefix"></i> Forgot your password?</h3>
                </div>

                <!--Body-->
                <form action="" method="POST">
                @csrf
                    <div class="md-form" onclick="document.querySelector('.email-input').focus()">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="text" name="email" id="orangeForm-email" class="form-control" value="{{ Session::get('email') }}">
                        <label for="orangeForm-email" onclick="className='active'; document.querySelector('.email-input').focus()">Your email</label>
                    </div>

                    <div class="text-center">
                        <input id="loginButton" class="btn peach-gradient btn-rounded btn-lg waves-effect waves-light" type="submit" name="submit" value="Submit">
                    </div>
                </form>

            </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</section>
@endsection