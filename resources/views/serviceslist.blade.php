@extends('layouts.container')


@section('title','Atyourservice Search')

@section('content')

<h3>Search results:</h3>

@foreach($services as $service)
<div class="wrapper">
    <p>
        <strong> <a href="/services/detail/{{$service->id}}">{{ucwords($service->name)}}</a></strong>
        <br>
        <strong>(short) description: </strong> {{$service->short_description}}
        <hr>
    </p>
</div>
@endforeach
@endsection