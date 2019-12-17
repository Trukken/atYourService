@extends('layouts.container')

@section('title', $service->name)

@section('content')
@if($service->banned !=true || Auth::user() && Auth::user()->admin == true)
<div class="service-container">
    <div class="container">
        <div class="card user-account-card">
            <div class="card-body">
                <!--Header-->
                <div class="form-header peach-gradient text-align-center">
                    <h1> {{ucwords($service->name)}}</h1>
                </div>

                @if($service->banned) - This service is currently banned @endif


            <div class="card-wrapper">

                <div class="card-flex d-flex justify-content-around align-items-center summary-part">
                    <img src="{{$service->user->image}}" alt="profile picture">
                    <p><strong>Summary:</strong> <br>{{$service->short_description}}</p>
                </div>

                @if (!Auth::user())
                <div class="">
                    <p class="text-center"> <a href="/login">log in</a> to see contact information and full description</p>
                </div>

                @elseif(Auth::user())
                <form action="/report-service" method="POST">
                    @csrf
                    <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" name="id" value="{{ $service->id }}">Report service</button>
                </form>

                @if(Auth::user()->admin == true)
                <br>
                <a href="/ban-service/{{ $service->id }}">Ban service</a>
                @if($service->banned == true)
                <a href="/unban-service/{{ $service->id }}">Unban service</a>
                @endif
                @endif

                <div class="user-detailed-info">
                    <h2>Provider: </h2>
                    <p>{{$service->user->name}}</p>
                    <h2>Contact info:</h2>
                    <p>
                        <strong> Phone number: </strong>
                        {{$service->user->phone_number}}
                        <br>
                        <strong> E-mail : </strong>
                        {{$service->user->email}}
                    </p>
                    <h2>Full description:</h2>
                    {{$service->long_description}}
                </div>
                @endif
                <!-- end of card body-->
            </div>
            <!-- end of card -->
        </div>


    <!-- COMMENTS card -->
    <div class="card user-account-card">
        <div class="card-body">
            <!--Header-->
            <div class="form-header peach-gradient text-align-center">
                <h1>Comments</h1>
            </div>
            <div class="card-wrapper">
                <div class="reload">
                    <!--display comments-->
                    @foreach($comments as $comment)
                    <div class="comment-single d-flex justify-content-around">
                        <div class="comment-image">
                            <img width="80" height="80" src="{{$comment->user->image}}" alt="avatar">
                        </div>
                        <div class="comment-info">
                            <p>
                                <strong>User: </strong> {{$comment->user->name}}
                                <br>
                                <strong>Date: </strong>
                                <?php $date = $comment->created_at;
                                $newDate = date("d.m.Y - H:i", strtotime($date));
                                echo $newDate; ?>
                                <br>
                                <strong>Comment: </strong> {{$comment->message}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>



                <!--Leave a comment-->
                <div class="put-comment-box">
                    @if (!Auth::user())
                    <div class="">
                        <p class="text-center"> <a href="/login">log in</a> to leave a comment</p>
                    </div>
                    @else
                    <h4>Leave a comment</h4>
                    <form id="form" action="/services/comments/add/{{$service->id}}" method="POST">
                        @csrf
                        <br>
                        <input type="hidden" name="service_id" value="{{$service->id}}">
                        <input type="hidden" name="user_id" value="{{auth::user()->id ?? '1'}}">

                        <textarea name="message" id="commentfield" cols="30" rows="5" class="form-control" placeholder="message..." maxlength="500"></textarea>
                        <br>
                        <input type="submit" class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" name="comment" id="comment" value="Add a comment">
                    </form>
                    @foreach($errors->all() as $error)
                    {{$error}}
                    <br>
                    @endforeach
                    @endif
                    <div class="result"></div>
                </div>




                <!-- end of card body-->
            </div>
            <!-- end of card -->
        </div>
        <!-- end of container -->
    </div>
</div>



















<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function() {
        $('input[type="submit"]').click(function(e) {
            console.log('you clicked');
            e.preventDefault();
            $.ajax({
                url: '/services/comments/add/{{$service->id}}',
                type: 'post',
                data: $('#form').serialize(),
                success: function(result) {
                    $('.reload').load('/services/detail/{{$service->id}}' + ' .reload');
                    $('#commentfield').val('');
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@elseif($service->banned == true)
<h2>This service is banned.</h2>
<h4><a href="/">Return to homepage.</a></h4>
@endif
@endsection
