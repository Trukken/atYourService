@foreach($servicesResult as $service)
<tr>
    <td>{{ucwords($service->name)}}</td>
    <td>{{$service->short_description}}</td>
    <td>{{$service->updated_at}}</td>
</tr>
@endforeach


