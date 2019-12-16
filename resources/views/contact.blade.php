@extends('layouts.container')

@section('title','Contact us')

@section('content')

<div class="col-md-12 col-lg-6 col-xl-5 mx-auto mb-4">

<section class="form-gradient">

    <div class="card">

        <!--Header-->
        <div class="header pt-3 peach-gradient">

            <div class="row d-flex justify-content-center">
                <h3 class="white-text mb-3 pt-3 font-weight-bold">Contact Us</h3>
            </div>

        </div>
        <!--Header-->

        <div class="card-body mx-4 mt-4">

            <!--Body-->
            <div class="md-form">
                <input type="text" id="Form-name3" class="form-control">
                <label for="Form-email3">Your name</label>
            </div>

            <div class="md-form">
                <input type="text" id="Form-mail3" class="form-control">
                <label for="Form-pass3">Your mail</label>
            </div>

            <div class="md-form">
                <textarea type="text" id="message5" name="message5" rows="2" class="form-control md-textarea"></textarea>
                <label for="message5">Your message</label>
                <div class="form-group">
                </div>
            </div>

            <!--Grid row-->
            <div class="row d-flex mb-4">

                <!--Grid column-->
                <div class="col-md-1 col-md-5 d-flex  ml-auto">
                    <div class="text-center">
                    <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Send</button>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>

    </div>

</section>      

@endsection
