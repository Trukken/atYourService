@extends('layouts.container')

@section('title','Helooooooooo')

@section('content')

<h2>{{$user->name}}</h2>
@if(Auth::user() && Auth::user()->admin == true)
    <form action="/user-control" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    @if($user->banned == false)
    <button name="status" value="ban">Ban user</button>
    @elseif($user->banned == true)
    <button name="status" value="unban">Unban user</button>
    @endif
    </form>
@endif
<h4>Posted services:</h4>
@foreach($user->services as $service)
<br>
<h5>{{$service->name}}</h5> <br>
@if(Auth::user() && Auth::user()->id == $user->id)
<p>(<a href="/services/edit/{{$service->id}}">Update</a>/
    <a id="delete" href="/services/delete/{{$service->id}}">Delete</a>)</p>

    @endif
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
</script>


@endsection
