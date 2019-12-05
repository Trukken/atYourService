@extends('layouts.container')


@section('title','Yamm')

@section('content')

<p>Some content comes here in the future</p>


<!--Search section-->


<!--View random offers-->


@foreach($randomservices as $randomservice)
<div class="wrapper">
    <p>
        <strong>{{$randomservice->name}}</strong>
        <br>
        <strong>Description: </strong> {{$randomservice->short_description}}
        <hr>
    </p>
</div>
@endforeach



@endsection