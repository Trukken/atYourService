@extends('layouts.container')


@section('title','Yamm')

@section('content')

<section id="home">
    <h1><span>@</span>yourService</a></h1>
    <h2>Linking expats to experts in Luxembourg</h2>
    <div class="search-container">
        <form action=""> <!--/action_page.php-->
            <input type="text" placeholder="Search your service..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</section>

<div class="card-deck">
    <div class="card">
        <img class="card-img-top" src="https://randomuser.me/api/portraits/women/74.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Service Provider 1</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
        <button type="button" class="btn btn-outline-danger">Details</button>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="https://randomuser.me/api/portraits/men/79.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Service Provider 2</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
        <button type="button" class="btn btn-outline-danger">Details</button>
        </div>
    </div>
    <div class="card">
            <img class="card-img-top" src="https://randomuser.me/api/portraits/men/85.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Service Provider 3</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-outline-danger">Details</button>
        </div>
    </div>
</div>

@endsection
