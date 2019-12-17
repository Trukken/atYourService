@extends('layouts.container')

@section('title','Register')

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
                                <h3><i class="fas fa-user mt-2 mb-2"></i> Join us</h3>
                            </div>

                            <!--Body-->
                            <form method="POST">
                                @csrf
                                <div class="md-form" onclick="document.querySelector('.name-input').focus()">
                                    <i class="fas fa-user prefix"></i>
                                    <input type="text" name="name" class="form-control name-input orangeForm">
                                    <label for="orangeForm-name" class="orangeForm" onclick="className='active'; document.querySelector('.name-input').focus()">Your name</label>
                                </div>

                                <div class="md-form" onclick="document.querySelector('.email-input').focus()">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="text" name="email" class="form-control email-input orangeForm" value="{{ Session::get('email') }}">
                                    <label for="orangeForm-email" class="orangeForm" onclick="className='active'; document.querySelector('.email-input').focus()">Your email</label>
                                </div>

                                <div class="md-form" onclick="document.querySelector('.password-input').focus()">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" name="password" class="form-control password-input orangeForm">
                                    <label class="orangeForm" for="orangeForm-pass" onclick="className='active'; document.querySelector('.password-input').focus()">Your password</label>
                                </div>

                                <div class="md-form" onclick="document.querySelector('.password_confirmation-input').focus()">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" name="password_confirmation" class="form-control password_confirmation-input orangeForm">
                                    <label class="orangeForm" for="orangeForm-pass" onclick="className='active'; document.querySelector('.password_confirmation-input').focus()">Confirmation password</label>
                                </div>

                                <div class="md-form" onclick="document.querySelector('.phone-input').focus()">
                                    <i class="fas fa-phone prefix"></i>
                                    <input type="text" name="phone" class="form-control phone-input orangeForm">
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
