@extends('layouts.container')


@section('title','Atyourservice Search')

@section('content')



<h3>Search results:</h3>
<form name='filterform' method='POST' action='/search-results'>
    <select name="order" id="order">
        <option selected value="date">Order by</option>
        <option value="updated_at">Last updated</option>
        <option value="name">Name</option>
    </select>
</form>


<div class="wrapper">
    @foreach($servicesResult as $service)
    <p class="mockup">
        <strong> <a href="/services/detail/{{$service->id}}">{{ucwords($service->name)}}</a></strong>
        <br>
        <strong class="description">(short) description: </strong> <span> {{$service->short_description}} </span>
        <hr>
    </p>
    @endforeach
</div>


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
    let mockup = $('.mockup').clone();
    $(function() {
        $('#order').on('change', function(e) {
            if ($('#order').val() !== '') {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/search-results2',
                    type: 'post',
                    data: $('#order').serialize(),
                    success: function(results) {
                        if (results !== '') {
                            console.log(results);
                            $('.wrapper').html('');
                            for (const result of results) {

                                mockup.find('a').href = '/services/detail/' + result.id
                                $('.wrapper').append(mockup);
                            }

                        }
                    },
                    error: function(err) {
                        // If ajax errors happens
                        console.log('Error with ajax call');
                    }
                });
            } else {
                console.log('what is even here?');
            }
        });
    });
</script>


@endsection