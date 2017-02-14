
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
            <a class="navbar-brand" href="/">API Stats</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ isEndpoint('home')    ? 'active' : '' }}"><a href="/">Home</a></li>
                <li class="{{ isEndpoint('about')   ? 'active' : '' }}"><a href="/about">About</a></li>
                <li class="{{ isEndpoint('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Endpoints <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/resource?endpoint=players">Players</a></li>
                        <li><a href="/resource?endpoint=batting">Batting</a></li>
                        <li><a href="/resource?endpoint=pitching">Pitching</a></li>
                        <li><a href="/resource?endpoint=fielding">Fielding</a></li>
                        <li><a href="/resource?endpoint=managers">Managers</a></li>
                        <li><a href="/resource?endpoint=teams">Teams</a></li>
                        <li><a href="/resource?endpoint=parks">Parks</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Login</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
