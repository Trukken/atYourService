<html>

<body>
        <p>Dear {{ $details['name'] }} find your verification link attached to this email. <br>
        <a href="http://127.0.0.1:8000/token-validate/{{ $details['token'] }}">Verify me</a></p>
</body>

</html>
