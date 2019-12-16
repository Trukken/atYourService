@extends('layouts.container')

@section('title','Forgotpassword')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
</div>
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
                <h3>Reset your password</h3>
                </div>

                <!--Body-->
                <form action="" method="POST">
                @csrf
                    <div class="md-form">
                        <i class="fas fa-lock prefix" onclick="document.querySelector('.password-input').focus()"></i>
                        <input type="password" id="orangeForm-pass" name="password" class="form-control">
                        <label for="orangeForm-pass">Your new password</label>
                    </div>
                    
                    <div class="md-form">
                        <i class="fas fa-lock prefix" onclick="document.querySelector('.password_confirmation-input').focus()"></i>
                        <input type="password" id="orangeForm-pass" name="password_confirmation" class="form-control">
                        <label for="orangeForm-pass" onclick="className='active'; document.querySelector('.password_confirmation-input').focus()">Confirmation password</label>
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