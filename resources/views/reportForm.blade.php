@extends('layouts.container')

@section('title','Report misconduct')

@section('content')
<h1>Reporting: <a href="/services/detail/{{ $report->id }}">{{ $report->name }}</a></h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
</div>
@endif

<form action="/send-report" method="POST">
    @csrf
    <input type="hidden" name="reportedService" value="{{ $report->id }}">
    <label for="report-reason">Reason of report: </label>
    <textarea name="reportReason" placeholder="Please tell us about the misconduct of the poster."></textarea>
    <input type="submit" name="submit" value="Submit">
</form>
@endsection
