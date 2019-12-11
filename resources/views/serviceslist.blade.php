@extends('layouts.container')


@section('title','Atyourservice Search')

@section('content')
<div class="search-container">
    <form action="/search-results" method="post" id="form" class="form-inline mr-auto search-box">
        {{ csrf_field() }}
        <input class="form-control mr-sm-2" type="text" name="searchbar" id="search" autocomplete="off" placeholder="Search" aria-label="Search">

        <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
    </form>
</div>


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