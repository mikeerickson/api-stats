
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>API Stats</title>

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/general.css"/>

    <!-- Custom styles for this template -->
    <link href="css/navbar.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    @include('message')

    <div class="container">

        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">API Stats</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Endpoints <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="api/v1/players?{{ $data['qs'] }}">Players</a></li>
                                <li><a href="api/v1/batting?{{ $data['qs'] }}">Batting</a></li>
                                <li><a href="api/v1/pitching?{{ $data['qs'] }}">Pitching</a></li>
                                <li><a href="api/v1/fielding?{{ $data['qs'] }}">Fielding</a></li>
                                <li><a href="api/v1/managers?{{ $data['qs'] }}">Managers</a></li>
                                <li><a href="api/v1/teams?{{ $data['qs'] }}">Teams</a></li>
                                <li><a href="api/v1/parks?{{ $data['qs'] }}">Parks</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Login</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>

        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>API Stats</h1>
            <p>Major League Baseball Players and Teams Stats</p>
            <p class="tagline">Currently from 2015 season, 2016 will be available in Second Quarter 2017.</p>
            <p>
                <a class="btn btn-lg btn-primary" href="docs/" role="button">View API Docs &raquo;</a>
            </p>
        </div>

    </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
