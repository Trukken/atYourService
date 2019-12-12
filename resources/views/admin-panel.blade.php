@extends('layouts.container')

@section('title','Helooooooooo')

@section('content')


<h2>Choose which topic you want to display:</h2>
    <form method="POST">
        @csrf
        <button name="adminControl" value="displayUsers">Users</button>
        <button name="adminControl" value="displayServices">Services</button>
        <button name="adminControl" value="displayReports">Reports</button>
    </form>










@endsection

