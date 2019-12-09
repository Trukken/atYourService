<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service</title>
    <style>
        .notlogged {
            display: none;
        }

        .logged {
            display: none;
        }
    </style>
</head>


<body>
    <h1> {{ucwords($service->name)}} </h1>

    <h2>Description</h2>

    {{$service->short_description}}


    @if (!Auth::user())
    <div class="">
        <p> <a href="#">log in</a> to see contact information and full description</p>
    </div>
    @else

    <div class="">
        <h2>Provider: </h2>
        {{$service->user->name}}
        <h2>Full description:</h2>
        {{$service->long_description}}
        <h2>Contact info:</h2>
        <p>
            <strong> Phone number: </strong>
            {{$service->user->phone_number}}
            <br>
            <strong> E-mail : </strong>
            {{$service->user->email}}
        </p>
    </div>
    @endif


    <!-- COMMENTS -->

    <h3>Comments: </h3>


    <!--display comments-->
    <div class="reload">

        @foreach($comments as $comment)
        <p>
            <strong>User: </strong> {{$comment->username}}
            <br>
            <strong>Date: </strong>
            <?php
            $date = new DateTime($comment->date);
            echo $date->format('d.m.Y'); ?>
            <br>
            <strong>Comment: </strong> {{$comment->message}}
            <hr>
        </p>
        @endforeach
    </div>




    <!--Leave a comment-->

    <form id="form" action="/services/comments/add/{{$service->id}}" method="POST">
        @csrf
        <br>
        <input type="hidden" name="service_id" value="{{$service->id}}">

        <textarea name="message" id="" cols="30" rows="10" placeholder="message..."></textarea>
        <br>
        <input type="submit" name="comment" id="comment" value="Add a comment">
    </form>
    @foreach($errors->all() as $error)
    {{$error}}
    <br>
    @endforeach

    <div class="result"></div>
    <br>




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
</body>

</html>