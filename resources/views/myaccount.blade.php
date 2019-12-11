@extends('layouts.container')

@section('title','Helooooooooo')

@section('content')

<h2>{{$user->name}}</h2>
<h4>My services:</h4>

@foreach($user->services as $service)
<br>
{{$service->name}} <br>
<p>(<a href="/services/edit/{{$service->id}}">Update</a>/
    <a href="/services/delete/{{$service->id}}">Delete</a>)</p>

@endforeach
@endsection