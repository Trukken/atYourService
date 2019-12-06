<html>
    <body>
        <p>Dear {{ $details['name'] }} find your verification link attached to this email. <br>
            <a href="localhost:8000/token-validate/{{ $details['token'] }}">Verify me</a></p>
    </body>
</html>
