@extends('layouts.container')

@section('title','Atyourservice Login')

@section('content')


@if(isset($loginError))
    <?php echo $loginError; ?>
@endif
    <section id="login">
        <div  class="mask h-100 d-flex justify-content-center align-items-center">
            <div class="container">
            <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
    
                <!--Form with header-->
                <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">
    
                    <!--Header-->
                    <div class="form-header peach-gradient">
                    <h3><i class="fas fa-user mt-2 mb-2"></i> Log in:</h3>
                    </div>
    
                    <!--Body--> 
                    <form action="" method="POST">
                @csrf
                @if(Session::get('email'))   
                    <div class="md-form">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="text" id="orangeForm-email" class="form-control" value="{{ Session::get('email') }}">
                    <label for="orangeForm-email">Your email</label>
                    </div>
                @endif
                @if(!Session::get('email'))
                    <div class="md-form">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="text" id="orangeForm-email" class="form-control" value="{{ Session::get('email') }}">
                    <label for="orangeForm-email">Your email</label>
                    </div>
                @endif
                    <div class="md-form">
                    <i class="fas fa-lock prefix"></i>
                    <input type="password" id="orangeForm-pass" class="form-control">
                    <input type="hidden" name="token" id="token">
                    <label for="orangeForm-pass">Your password</label>
                    </div>
    
                    <div class="text-center">
                        <input class="btn peach-gradient btn-rounded btn-lg waves-effect waves-light" type="submit" value="Submit">
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
    grecaptcha.execute('6LeqRcYUAAAAAC6bqp95JOb30MzDlY1gskQng9kL', {action: 'login'}).then(function(token) {
        document.querySelector('#token').value = token;
    });
});
</script>
@endsection
