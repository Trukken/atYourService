@extends('layouts.container')

@section('title','Atyourservice Search')

@section('content')
<div class="mask rgba-grey-slight">
    <div class="container search-results-container">

        <div class="search-container d-flex justify-content-center searchbar-results">
            <form action="/search-results" method="post" id="form" class="form-inline mr-auto search-box">
                {{ csrf_field() }}
                <div class="search-results-and-buttom d-flex align-items-start justify-between">
                    <div class="search-and-results">
                        <input class="form-control mr-sm-2 position-relative search-result-input" type="text" name="searchbar" id="search" autocomplete="off" placeholder="Search" aria-label="Search">
                        <div class="result dropdown-menu input-dropdown-menu search-result-output" id="result"></div>
                    </div>
                    <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>

                </div>
            </form>
        </div>


        <h3>Search results:</h3>


        <div class="wrapper">


            <table id="dtOrderExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name
                        </th>
                        <th class="th-sm">Description
                        </th>
                        <th class="th-sm">Last updated
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($servicesResult as $service)
                    <tr>
                        <td><a id="seach-result-name" href="/services/detail/{{ $service->id }}">{{ucwords($service->name)}}</a></td>
                        <td>{{$service->short_description}}</td>
                        <td>{{date('d-m-Y', strtotime($service->updated_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
        <?php echo $servicesResult->render(); ?>
        </div>
    </div>
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

        });
    });
</script>


@endsection
