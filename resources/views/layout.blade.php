
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Baseball Stats API">
    <meta name="author" content="Mike Erickson">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="icon" href="../../favicon.ico">

    <title>API Stats : {{ ucwords(endpoint()) }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    
    <![endif]-->
</head>
    <body id="app">

        {{--Application Navbar (will appear on all pages--}}
        @include('navbar')

        {{--Any flash messages will appear here--}}
        @include('message')

        {{--Configure Authentication--}}
        @if(!Auth::check())
            <div class="text-center">
                @if (isEndpoint('home'))
                    <a class="btn btn-lg btn-success" href="register" role="button">Sign Up Now!</a>
                @endif
            </div>
        @endif

        <div id="v-app">
            <div id="content" class="content">
                @yield('content')
            </div>
        </div>

        {{--Vendor libraries available on CDN so we dont overload our bundle--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

        {{--Pull in vue from CDN--}}
        <script src="https://unpkg.com/vue/dist/vue.js"></script>
        {{--<script src="js/vue-formly.min.js"></script>--}}

        {{--Application bundle--}}
        <script src="js/bundle.js"></script>

        {{--Application Footer (sticky footer)--}}
        @include('footer')

    </body>
</html>
