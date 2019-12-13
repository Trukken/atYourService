@extends('layouts.container')


@section('title','Atyourservice Search')

@section('content')

<div class="search-container position-relative">
    <form action="/search-results" method="post" id="form" class="form-inline mr-auto search-box">
        {{ csrf_field() }}
        <div class="search-results-and-buttom d-flex align-items-start justify-between">
            <div class="search-and-results">
                <input class="form-control mr-sm-2 position-relative" type="text" name="searchbar" id="search" autocomplete="off" placeholder="Search" aria-label="Search">
                <br>
                <div class="result dropdown-menu input-dropdown-menu position-relative" id="result"></div>
            </div>
            <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>

        </div>
    </form>
</div>


<h3>Search results:</h3>
<!-- <form name='filterform' method='POST' action='/search-results'>
    <select name="order" id="order">
        <option selected value="date">Order by</option>
        <option value="updated_at">Last updated</option>
        <option value="name">Name</option>
    </select>
</form> -->


<div class="wrapper">


    <table id="dtOrderExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Name
                </th>
                <th class="th-sm">Description
                </th>
                <th class="th-sm">Created at
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach($servicesResult as $service)
            <tr>
                <td>{{ucwords($service->name)}}</td>
                <td>{{$service->short_description}}</td>
                <td>{{$service->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    /**LIVE SEARCH AJAX CALL */


    let $input = $('#result');
    $('.result').css('display', 'none');

    $(function() {
        $('#search').keyup(function(e) {
            e.preventDefault();

            if ($('#search').val() !== '' && $('#search').val().length > 2) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/livesearch',
                    type: 'get',
                    data: $('#search').serialize(),
                    success: function(result) {
                        $('.result').html(result);
                        if (result !== '') {
                            $('.result').css('display', 'block');
                        } else {
                            $('.result').css('display', 'none');
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
            //let $value = $(this).val();

        });
    });




    /**
     *
     * lots of things to figure out in the *near* future
     * about filtering
     *
     **/


    $(document).ready(function() {
        $('#dtOrderExample').DataTable({
            "order": [
                [3, "desc"]
            ]
        });
        $('.dataTables_length').addClass('bs-select');
    });


    /** */


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