@extends('layouts.container')

@section('title','Report Misconduct')

@section('content')
<h1>Reporting: <a href="/services/detail/{{ $report->id }}">{{ $report->name }}</a></h1>



<form action="/send-report" method="POST">
    @csrf
    <input type="hidden" name="reportedService" value="{{ $report->id }}">
    <label for="report-reason">Reason of report: </label>
    <textarea name="reportReason" placeholder="Please tell us about the misconduct of the poster."></textarea>
    <input type="submit" name="submit" value="Submit">
</form>
@endsection
