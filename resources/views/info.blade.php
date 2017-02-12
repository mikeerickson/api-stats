<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API Stats: Info</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="css/app.css"/>
        <link rel="stylesheet" href="css/general.css"/>

    </head>
    <body>

        @include('message')

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    API Stats Endpoints
                </div>

                <div class="links">
                    <a href="/">Home</a>
                    <a href="api/v1/players?token=c3be77b4-c9f1-3109-8729-e6704c93ef41">Players</a>
                    <a href="api/v1/batting?token=c3be77b4-c9f1-3109-8729-e6704c93ef41">Batting</a>
                    <a href="api/v1/pitching?token=c3be77b4-c9f1-3109-8729-e6704c93ef41">Pitching</a>
                    <a href="api/v1/fielding?token=c3be77b4-c9f1-3109-8729-e6704c93ef41">Fielding</a>
                    <a href="api/v1/managers?token=c3be77b4-c9f1-3109-8729-e6704c93ef41">Managers</a>
                    <a href="api/v1/parks?token=c3be77b4-c9f1-3109-8729-e6704c93ef41">Parks</a>
                    <a href="api/v1/teams?token=c3be77b4-c9f1-3109-8729-e6704c93ef41">Teams</a>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bundle.js"></script>

    </body>
</html>
