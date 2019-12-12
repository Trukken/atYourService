@extends('layouts.container')

@section('title','Helooooooooo')

@section('content')

<h4>Edit service</h4>

<form id="form" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Service offered:</label>
    <input type="text" name="name" value="{{$service->name}}" id="">
    <br>
    <label for="short_description">Short description:</label>
    <br>
    <textarea name="short_description" id="" cols="30" rows="10">{{$service->short_description}}</textarea>
    <br>
    <label for="long_description">Complete description:</label>
    <br>
    <textarea name="long_description" id="" cols="30" rows="10" value="">{{$service->long_description}}</textarea>
    <br>
    <input type="hidden" name="user_id" value="1">


    <input type="submit" name="edit" value="edit">

</form>

<div id="resultForm"></div>

<a href="/myaccount/{{ auth()->user()->id }}">Back to My Account</a>




<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('input[type="submit"]').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/services/edit/{{$service->id}}',
                type: 'put',
                data: $('#form').serialize(),
                success: function(result) {
                    console.log(result);
                    console.log('success');
                    $('#resultForm').html('<div>' + result + '</div>');
                },
                error: function(err) {
                    // Si une erreur AJAX se produit
                    console.log('error');
                }
            });
        });
    });
</script>
@endsection