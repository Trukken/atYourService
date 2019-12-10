@extends('layouts.container')


@section('title','Atyourservice Search')

@section('content')

<p>Search results: </p>

<h3>By service name: </h3>


@foreach($servicesResult as $service)
<div class="wrapper">
    <p>
        <strong>{{$service->name}}</strong>
        <br>
        <strong>(short) description: </strong> {{$service->short_description}}
        <hr>
    </p>
</div>
@endforeach

@endsection
