@extends('layouts.container')

@section('title','Forgotpassword')

@section('content')
<form method="POST">
    @csrf
    <input type="text" name="email" placeholder="Your email">
    <input type="submit" name="submit" value="Submit">
</form>
@endsection
