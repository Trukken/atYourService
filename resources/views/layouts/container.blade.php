<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1><a href="#home"><span>@</span>yourService </a><img src="../atYourService/style/images/waiter (1).png" alt=""></h1>
        <nav>
            <ul>
                @if(!Auth::user())
                <li><a href="#aboutus">About us</a></li>
                <li><a href="#contact">Contact us</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                @endif
                @if(Auth::user())
                <a href="/logout">Logout</a>
                @endif
            </ul>
        </nav>
    </header>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
