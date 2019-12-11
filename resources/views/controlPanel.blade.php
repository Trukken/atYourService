@extends('layouts.container')

@section('title','Control Panel')

@section('content')

@if(!empty($notification))
    {{ $notification }}
@endif

<h1>Unhandled reports:</h1>
<div class="unhandled-reports">

</div>


<h1>Handled reports:</h1>
<div class="handled-reports">

    </div>

<script>
    let reports = {!! $reports !!}
    const unhandledReports = document.querySelector('.unhandled-reports');
    const handledReports = document.querySelector('.handled-reports');
    for (const report of reports) {
            createReport(report.handled,report.service_id,report.name,report.user_name,report.report_reason,report.id);
    }


    function createReport(handleState,service_id,name,user_name,report_reason,report_id){
        let report = document.createElement('div');
        report.className = 'report';
        let h4 = document.createElement('h4');
        h4.innerHTML = '<h4>Reported service: <a href="/services/detail/'+service_id+'">'+name+'</a> service id: '+service_id+'</h4>';
        let h42 = document.createElement('h4');
        h42.innerHTML = `Provider's name: <a href="">${name}`;

        if(handleState == false){
            report.append(h4);
            report.append(h42);
            if(report_reason){
                let p = document.createElement('p');
                p.innerHTML = `Report reason: ${report_reason}`
                report.append(p);
            }
            let button = document.createElement('button');
            button.innerText = 'Trash report';
            let csrf = document.createElement('input');
            csrf.innerHTML = '@csrf';
            csrf.type = 'hidden';
            let id = document.createElement('input');
            id.type = 'hidden';
            id.name = 'id';
            id.value = report_id;
            let form = document.createElement('form');
            form.action = '/admin';
            form.method = 'POST';
            form.append(id);
            form.append(csrf);
            form.append(button);
            report.append(form);
            unhandledReports.append(report);
        }else if(handleState == true){
            report.append(h4);
            report.append(h42);
            if(report_reason){
            let p = document.createElement('p');
            p.innerHTML = `Report reason: ${report_reason}`
            report.append(p);
            handledReports.append(report);
            }
        }
    }
</script>
@endsection
