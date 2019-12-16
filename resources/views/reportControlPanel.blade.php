@extends('layouts.container')

@section('title','Control Panel')

@section('content')





<div class="report-control-panel">
<div class="unhandled-reports">
    <h1>Unhandled reports:</h1>
    @foreach ($unhandledReports as $unhandledReport)
    <div class="unhandled-report">
        <h4>Reported service: <a href="/services/detail/{{ $unhandledReport->service_id }}">{{ $unhandledReport->name }}</a> service id: {{ $unhandledReport->service_id }}</h4>
        <h4>Provider's name: <a href="/user/{{ $unhandledReport->id }}">{{ $unhandledReport->name }}</a></h4>
            @if(!empty($unhandledReport->report_reason))
            {{ $unhandledReport->report_reason }}
                @endif
        <form action="/control-panel" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $unhandledReport->id }}">
        <button class="btn peach-gradient btn-rounded btn-sm waves-effect waves-light">Trash report</button>
        </form>
    </div>
    @endforeach

    <?php
        //This line makes sure that the paginations remember eachother, origin: https://stackoverflow.com/questions/29058619/laravel-5-multiple-paginations-on-one-page?rq=1
    ?>
    {{ $unhandledReports -> appends(["handledReports" => $handledReports -> currentPage()]) -> links() }}

</div>


<div class="handled-reports">
    <h1>Handled reports:</h1>
    @foreach ($handledReports as $handledReport)
    <div class="handled-report">
        <h4>Reported service: <a href="/services/detail/{{ $handledReport->service_id }}">{{ $handledReport->name }}</a> service id: {{ $handledReport->service_id }}</h4>
        <h4>Provider's name: <a href="/user/{{ $handledReport->id }}">{{ $handledReport->name }}</a></h4>
            @if(!empty($handledReport->report_reason))
            {{ $handledReport->report_reason }}
            @endif

    </div>
    @endforeach

    <?php
        //This line makes sure that the paginations remember eachother, origin: https://stackoverflow.com/questions/29058619/laravel-5-multiple-paginations-on-one-page?rq=1
    ?>
    {{ $handledReports -> appends(["unhandledReports" => $unhandledReports -> currentPage()]) -> links() }}
</div>
</div>

@endsection
