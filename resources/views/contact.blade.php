@extends('layouts.container')
@section('title','Contact us')
@section('content')
<div class="contactus d-flex justify-content-center align-items-center">
    <div class="col-md-12 col-lg-6 col-xl-5 mx-auto mb-4">
        <section class="form-gradient">
            <div class="card">
                <form method="POST">
                    <!--Header-->
                    @csrf
                    <div class="header pt-3 peach-gradient">
                        <div class="row d-flex justify-content-center">
                            <h3 class="white-text mb-3 pt-3 font-weight-bold"><img src="{{asset('images/justlogo.png')}}" height="60" width="60"> Contact Us</h3>
                        </div>
                    </div>
                    <!--Header-->
                    <div class="card-body mx-4 mt-4">
                        <!--Body-->
                        <div class="md-form" onclick="document.querySelector('.name-input').focus()">
                            <input type="text" name="name" class="form-control name-input">
                            <label for="orangeForm-name" onclick="className='active'; document.querySelector('.name-input').focus()">Your name</label>
                        </div>

                        <div class="md-form" onclick="document.querySelector('.email-input').focus()">
                            <input type="text" name="email" class="form-control email-input" value="{{ Session::get('email') }}">
                            <label for="orangeForm-email" onclick="className='active'; document.querySelector('.email-input').focus()">Your email</label>
                        </div>

                        <div class="md-form" onclick="document.querySelector('.md-textarea').focus()">
                            <textarea type="text" name="message" class="form-control md-textarea"></textarea>
                            <label for="message" onclick="className='active'; document.querySelector('.md-textarea').focus()">Your message</label>
                        </div>

                        <div class="text-center">
                            <input class="btn peach-gradient btn-rounded btn-lg waves-effect waves-light" type="submit" name="submit" value="Send"> </div>
                    </div>
            </div>
            </form>
    </div>
    </section>
</div>
</div>
@endsection