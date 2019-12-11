@extends('layouts.container')

@section('title','Forgotpassword')

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

<form method="POST">
    @csrf
    <input type="password" name="password" placeholder="Your password">
    <input type="password" name="password_confirmation" placeholder="Your password confirmation">
    <input type="submit" name="submit" value="Submit">
</form>

@endsection
