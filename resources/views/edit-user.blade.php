@extends('layouts.container')
​
@section('title','Edit account')
​
@section('content')
​
<h2>Update your info</h2>
​
<form id="form" action="/user/edit/{{$user->id}}" method="POST">
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
</form>
​
<div id="resultForm"></div>
<br>
<a href="/user/{{ auth()->user()->id }}">Back to My Account</a>
​
​

@endsection
