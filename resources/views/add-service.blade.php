@extends('layouts.container')

@section('title','Add service')

@section('content')
<div class="add-service-body">
    @if (!Auth::user())
    <div class="">
        <p> <a href="/login">Log in</a> to post an offer!</p>
    </div>

    @elseif(Auth::user())

    <div class="result"></div>
    @endif

    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

                    <!--Form with header-->
                    <div class="card wow fadeIn" data-wow-delay="0.3s">
                        <div class="card-body">

                            <!--Header-->
                            <div class="form-header peach-gradient">
                                <h3><img src="{{asset('images/justlogo.png')}}" height="40" width="40"> Add a service</h3>
                            </div>

                            <!--Body-->
                            <form method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
                                <input type="hidden" name="token" id="token">
                                <div class="form-group amber-border">
                                    <label for="form-control">Service</label>
                                    <input type="text" placeholder="Long description, minimum 4 characters" name="servicename" class="form-control">
                                </div>

                                <div class="form-group amber-border">
                                    <label for="form-control">Write a short description (max. 144 characters):</label>
                                    <textarea class="form-control" placeholder="Long description, minimum 4 characters" name="shortdescription" maxlength="144" cols="30" rows="5"></textarea>
                                </div>

                                <div class="form-group amber-border">
                                    <label for="form-control">Full description:</label>
                                    <textarea class="form-control" placeholder="Long description, minimum 20 characters" name="longdescription" maxlength="500" cols="30" rows="10"></textarea>
                                </div>

                                <div class="text-center">
                                    <input class="btn peach-gradient btn-rounded btn-lg waves-effect waves-light" type="submit" name="submit" value="Send">
                                </div>
                            </form>

                        </div>
                    </div>
                    <!--/Form with header-->

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>




<script>
    $(function() {
        $('button[type="submit"]').click(function(e) {
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
