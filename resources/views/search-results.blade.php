@extends('layouts.container')


@section('title','Atyourservice Search')

@section('content')



<h3>Search results:</h3>

<select name="order" id="order">
    <option selected value="date">Order by</option>
    <option value="updated_at">Last updated</option>
    <option value="name">Name</option>
</select>


@foreach($servicesResult as $service)
<div class="wrapper">
    <p>
        <strong> <a href="/services/detail/{{$service->id}}">{{ucwords($service->name)}}</a></strong>
        <br>
        <strong>(short) description: </strong> {{$service->short_description}}
        <hr>
    </p>
</div>
@endforeach


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
    $(function() {
        $('#order').on('change', function(e) {
            if ($('#order').val() !== '') {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/search-results',
                    type: 'post',
                    data: $('#order').serialize(),
                    success: function(result) {
                        $('.result').html(result);
                        if (result !== '') {
                            console.log(result);
                        }
                    },
                    error: function(err) {
                        // If ajax errors happens
                        $('.result').html('Error with ajax call');
                    }
                });
            } else {
                $('#result').css('display', 'none');

            }
        });
    });
</script>


@endsection