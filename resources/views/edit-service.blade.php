@extends('layouts.container')

@section('title','Edit your service')

@section('content')

<h2>Edit service</h2>

<form id="form" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Service offered:</label>
    <br>
    <input type="text" class="inner" name="name" value="{{$service->name}}">
    <br>
    <label for="short_description">Short description:</label>
    <br>
    <textarea name="short_description" class="inner" cols="30" rows="10">{{$service->short_description}}</textarea>
    <br>
    <label for="long_description">Complete description:</label>
    <br>
    <textarea name="long_description" class="inner" cols="30" rows="10" value="">{{$service->long_description}}</textarea>
    <br>
    <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Edit</button>

</form>

<div id="resultForm"></div>
<br>
<a href="/user/{{ auth()->user()->id }}">Back to My Account</a>




<!-- 
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
</script> -->
@endsection