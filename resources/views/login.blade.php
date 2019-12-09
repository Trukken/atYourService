@extends('layouts.container')

@section('title','Helooooooooo')

@section('content')



@if(isset($loginError))
    <?php echo $loginError; ?>
@endif

<form action="?" method="POST">
    @csrf
    @if(Session::get('email'))
    <input type="text" name="email" id="email" value="{{ Session::get('email') }}">
    @endif
    @if(!Session::get('email'))
    <input type="text" name="email" id="email">
    @endif
    <input type="password" name="password" id="password">
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
