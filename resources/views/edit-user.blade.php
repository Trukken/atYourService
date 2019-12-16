@extends('layouts.container')
​
@section('title','Edit account')
​
@section('content')
​
<h2>Update your info</h2>
​
<form id="form" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <br>
    <input type="text" class="inner editing-user" name="name" value="{{$user->name}}">
    <br>
    <label for="phone">Phone number:</label>
    <br>
    <input name="phone_number" class="inner editing-user" value="{{$user->phone_number}}">
    <br>
    <label for="image">profile picture url:</label>
    <br>
    <input name="image" class="inner editing-user" value="{{$user->image}}">
    <br>
    <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Edit</button>
    ​
    <!-- <input type="submit" name="edit" value="edit"> -->
    ​
</form>
​
<div id="resultForm"></div>
<br>
<a href="/user/{{ auth()->user()->id }}">Back to My Account</a>
​
​
​
​
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('button[type="submit"]').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/user/edit/{{$user->id}}',
                type: 'put',
                data: $('#form').serialize(),
                success: function(result) {
                    console.log(result);
                    console.log('success');
                    $('#resultForm').html('<div>' + result + '</div>');
                },
                error: function(err) {
                    // Si une erreur AJAX se produit
                    console.log('error');
                }
            });
        });
    });
</script>
@endsection