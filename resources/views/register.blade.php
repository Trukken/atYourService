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
<form method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Name">
    <input type="password" name="password" placeholder="Name">
    <input type="password" name="password_confirmation" placeholder="Name">
    <input type="submit" value="Submit">
</form>

@endsection



