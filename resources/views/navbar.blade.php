
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
