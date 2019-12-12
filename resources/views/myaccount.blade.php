@extends('layouts.container')

@section('title','Helooooooooo')

@section('content')

<h2>My services</h2>

@foreach($user->services as $service)
<br>
<h4>{{$service->name}}</h4>

<a class="read-more-toggle">Read More <i class="fas fa-angle-down"></i></a>
<div class="read-more-content">
    <br>
    <p>Short description:
        {{$service->short_description}}</p>

    <p>Complete description:
        {{$service->long_description}}</p>

    <p>Date created:
        {{date('d.m.Y', strtotime($service->created_at))}}</p>
    <br>

</div>

<p>(<a href="/services/edit/{{$service->id}}">Update</a>/
    <a id="delete" href="/services/delete/{{$service->id}}">Delete</a>)</p>

@endforeach

<div class="result"></div>


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(function() {

        $('#delete').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/services/delete/{{$service->id}}',
                type: 'post',
                data: $('#form').serialize(),
                success: function(result) {
                    if (result) {
                        console.log(result);
                        $('.result').html(result);
                    } else {
                        $.each(result.errors, function(key, value) {
                            $('.alert').show();
                            $('.alert').append('<p>' + value + '</p>');
                        })
                        console.log(result);
                    };
                },
                error: function(err) {
                    // if there's an error with the call
                    console.log('error with ajax call');
                    console.log(result);
                }
            });
        });
    });

    /*
     *
     */

    // Hide the extra content initially, using JS so that if JS is disabled, no problemo.
    $('.read-more-content').addClass('hide');

    // Set up the toggle.
    $('.read-more-toggle').on('click', function() {
        $(this).next('.read-more-content').toggleClass('hide');
    });
</script>


@endsection