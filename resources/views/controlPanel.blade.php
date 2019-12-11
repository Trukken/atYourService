@extends('layouts.container')

@section('title','Control Panel')

@section('content')

@foreach ($services as $service)
        <h4><a href="/services/detail/{{ $service->id }}">{{ $service->name }}</a></h4>

        @if(!empty($service->reported_reason))
            {{ $service->reported_reason }}
        @endif
@endforeach

@endsection
