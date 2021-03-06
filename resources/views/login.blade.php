@extends('layouts.container')

@section('title','Login')

@section('content')

<section id="login">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

                    <!--Form with header-->
                    <div class="card wow fadeIn" data-wow-delay="0.3s">
                        <div class="card-body">

                            <!--Header-->
                            <div class="form-header peach-gradient">
                                <h3><i class="fas fa-user mt-2 mb-2"></i> Log in</h3>
                            </div>

                            <!--Body-->
                            <form method="POST">
                                @csrf
                                @if(Session::get('email'))
                                <div class="md-form" onclick="document.querySelector('.email-input').focus()">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="text" name="email" class="form-control orangeForm" value="{{ Session::get('email') }}">
                                    <label for="orangeForm-email" class="orangeForm" onclick="className='active'; document.querySelector('.email-input').focus()">Your email</label>
                                </div>
                                @elseif(!Session::get('email'))
                                <div class="md-form" onclick="document.querySelector('.email-input').focus()">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input class="form-control email-input orangeForm" type="text" name="email">
                                    <label for="orangeForm-email" class="orangeForm" onclick="className='active'; document.querySelector('.email-input').focus()">Your email</label>
                                </div>
                                @endif
                                <div class="md-form" onclick="document.querySelector('.password-input').focus()">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" name="password" class="form-control password-input orangeForm">
                                    <label for="orangeForm-pass" class="orangeForm" onclick="className='active'; document.querySelector('.password-input').focus()">Your password</label>
                                </div>


                                <input type="hidden" name="token" id="token">
                                <div class="text-center">
                                    <input id="loginButton" class="btn peach-gradient btn-rounded btn-lg waves-effect waves-light" type="submit" name="submit" value="Submit">
                                </div>

                                <div class="card-footer">
                                    <div class="d-flex justify-content-center links">Don't have an account? <a href="/register"> Sign Up</a>
                                    </div>
                                    <div class="d-flex justify-content-center"><a href="/forgotpassword">Forgot your password?</a>
                                    </div>
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

<script src="https://www.google.com/recaptcha/api.js?render=6LeqRcYUAAAAAC6bqp95JOb30MzDlY1gskQng9kL"></script>
<script>
  grecaptcha.ready(function() {
    grecaptcha.execute('6LeqRcYUAAAAAC6bqp95JOb30MzDlY1gskQng9kL', {
      action: 'addservice'
    }).then(function(token) {
      document.querySelector('#token').value = token;
    });
  });
</script>


@endsection
