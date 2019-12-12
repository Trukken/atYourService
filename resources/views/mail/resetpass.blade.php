<html>

<body>
        <p>Dear {{ $details['name'] }} find your reset password link attached to this email. <br>
        <a href="http://127.0.0.1:8000/forgotpassword/{{ $details['token'] }}">Reset me</a></p>
</body>

</html>
