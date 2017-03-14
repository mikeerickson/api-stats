
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
            <a class="navbar-brand" href="/">⚾&nbsp;&nbsp;API Stats</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ isEndpoint('home')    ? 'active' : '' }}"><a href="/">Home</a></li>
                <li class="{{ isEndpoint('about')   ? 'active' : '' }}"><a href="/about">About</a></li>
                <li class="{{ isEndpoint('contact') ? 'active' : '' }}"><a href="/contact">Contact Us</a></li>
                @if (Auth::check())
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
                            <li><a href="/resource?endpoint=salaries">Salaries</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(! isEndpoint('login'))
                    @if (Auth::check())
                        <li><img class="avatar" src="{{ Gravatar::get(Auth::user()->email, ['size'=> 30]) }}" /></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/account">Account</a></li>
                                <li><a href="/cache">Cache Viewer</a></li>
                                <li><a href="/contacts">Contact Request</a></li>
                                <li><a href="/stats">Stats</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        @if(! isEndpoint('register'))
                            <li><a href="/register">Register</a></li>
                        @endif
                        @if(! isEndpoint('register'))
                            <li><a href="/login">Login</a></li>
                        @endif
                    @endif
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

