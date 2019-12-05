@extends('layouts.container')


@section('title','Yamm')

@section('content')

<p>Some content comes here in the future</p>

<h3>Services: </h3>

@foreach($servicesResult as $service)
<div class="wrapper">
    <p>
        <strong>{{$service->name}}</strong>
        <br>
        <strong>Description: </strong> {{$service->short_description}}
        <hr>
    </p>
</div>
@endforeach

@endsection