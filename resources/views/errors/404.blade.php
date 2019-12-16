@extends('layouts.container')

@section('title','Page not found')

@section('content')
<div class="404-container " style="height: 73.1vh; margin: auto;">
    <div class="card m-auto" style="width: 18rem; height: 30vh; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="card-body">
            <h5 class="card-title">Ops! Something went wrong</h5>
            <p class="card-text">We don't quite have what you are looking for.</p>
            <a href="/" class="btn peach-gradient btn-rounded btn-lg waves-effect waves-light">Go to homepage</a>
        </div>
    </div>
</div>
@endsection