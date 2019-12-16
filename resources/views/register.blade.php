@extends('layouts.container')

@section('title','Register')

@section('content')


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
                <h3><i class="fas fa-user mt-2 mb-2"></i> Join us</h3>
                </div>

                <!--Body-->
                <form action="" method="POST">
                    @csrf
                    <div class="md-form" onclick="document.querySelector('.name-input').focus()">
                        <i class="fas fa-user prefix"></i>
                        <label for="orangeForm-name" onclick="className='active'; document.querySelector('.name-input').focus()">Your name</label>
                        <input type="text" id="orangeForm-name" name="name" class="form-control name-input">
                    </div>

                    <div class="md-form" onclick="document.querySelector('.email-input').focus()">
                        <i class="fas fa-envelope prefix"></i>
                        <label for="orangeForm-email" onclick="className='active'; document.querySelector('.email-input').focus()">Your email</label>
                        <input type="text" id="orangeForm-email" name="email" class="form-control email-input" value="{{ Session::get('email') }}">
                    </div>

                    <div class="md-form" onclick="document.querySelector('.password-input').focus()">
                        <i class="fas fa-lock prefix" ></i>
                        <input type="password" id="orangeForm" name="password" class="form-control password-input">
                        <label for="orangeForm-pass">Your password</label>
                    </div>

                    <div class="md-form" onclick="document.querySelector('.password_confirmation-input').focus()">
                        <i class="fas fa-lock prefix" ></i>
                        <input type="password" id="orangeForm" name="password_confirmation" class="form-control password_confirmation-input">
                        <label for="orangeForm-pass" onclick="className='active'; document.querySelector('.password_confirmation-input').focus()">Confirmation password</label>
                    </div>

                    <div class="md-form" onclick="document.querySelector('.phone-input').focus()">
                        <i class="fas fa-phone prefix" ></i>
                        <input type="text" id="orangeForm" name="phone" class="form-control phone-input">
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
</section>



@endsection



