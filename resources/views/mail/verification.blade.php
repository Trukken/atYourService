<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Dear {{ $details['name'] }} find your verification link attached to this email. <br>
        <a href="http://127.0.0.1:8000/token-validate/{{ $details['token'] }}">Verify me</a></p>
    
</body>
</html>

