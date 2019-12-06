<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        blablabla
        @if(!Auth::user())
        <a href="/register">Register</a>
        <a href="/login">Login</a>
        @endif
        @if(Auth::user())
        <a href="/logout">Logout</a>
        @endif
    </nav>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
