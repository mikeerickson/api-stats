@extends('layout')

@section('content')
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>⚾&nbsp;&nbsp;Stats API</h1>
            <h2>2015 Major League Baseball Stats</h2>
            <p>&nbsp;</p>
            <p class="tagline">All player stats are currently from 2015 season </p>
            <p class="tagline-small">📅&nbsp;&nbsp;&nbsp;<i>2016 will be available in Second Quarter 2017 when data becomes available</i></p>
            <hr />

            <div class="text-center home-endpoints">
                <a href="/resource?endpoint=players">Players</a>
                <a href="/resource?endpoint=batting">Batting</a>
                <a href="/resource?endpoint=pitching">Pitching</a>
                <a href="/resource?endpoint=fielding">Fielding</a>
                <a href="/resource?endpoint=managers">Managers</a>
                <a href="/resource?endpoint=teams">Teams</a>
                <a href="/resource?endpoint=parks">Parks</a>
                <a href="/resource?endpoint=salaries">Salaries</a>
            </div>

            <div class="text-center home-docs">
                <a href="docs/" target="_blank">API Documentation</a>
            </div>

        </div>
    </div>
    <div class="col-md-3"></div>
@stop
