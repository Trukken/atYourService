@extends('layouts.container')

@section('title','Yamm')

@section('content')

<form method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="submit" value="Submit">
</form>

@endsection



