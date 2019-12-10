<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a service</title>
</head>

<body>

    @if (!Auth::user())
    <div class="">
        <p> <a href="/login">log in</a> post an offer</p>
    </div>

    @elseif(Auth::user())

    <h1>Add a service</h1>

    <form id="resultForm" action="" method="post">
        @csrf

        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

        <input type="text" name="servicename" placeholder="Service name" id="">
        <br>
        <textarea name="shortdescription" id="" cols="30" rows="5"></textarea>
        <br>
        <textarea name="longdescription" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" name="submit" value="send">

    </form>
    <div class="result"></div>
    <a href="./">Back</a>
    @endif


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('input[type="submit"]').click(function(e) {
                console.log('you clicked');
                e.preventDefault();
                $.ajax({
                    url: '/add-services',
                    type: 'post',
                    data: $('#resultForm').serialize(),
                    success: function(result) {
                        console.log(result);
                        $('.result').html('<p>' + result + '</p>');
                    },
                    error: function(err) {
                        // If ajax errors happens
                        console.log('ajax error');
                        $('.result').html('Error with ajax call');
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</body>

</html>