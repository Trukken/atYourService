@extends('layouts.container')

@section('title','Yamm')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($loginError))
{{ $loginError }}
@endif
<form method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Name">
    <input type="password" name="password" placeholder="Name">
    <input type="password" name="password_confirmation" placeholder="Name">
    <input type="text" name="phone" placeholder="Phone number">
    <input type="hidden" name="token" id="token">
    <input type="submit" name="submit" value="Submit">
</form>
        <script src="https://www.google.com/recaptcha/api.js?render=6LeqRcYUAAAAAC6bqp95JOb30MzDlY1gskQng9kL"></script>
        <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeqRcYUAAAAAC6bqp95JOb30MzDlY1gskQng9kL', {action: 'login'}).then(function(token) {
                document.querySelector('#token').value = token;
            });
        });
        </script>
@endsection



