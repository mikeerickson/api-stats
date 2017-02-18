@extends('layout')

@section('content')
    <div id="v-resource">


        <div id="endpoint-list">
            <h3>{{ ucwords(str_singular($endpoint)) }} Endpoints</h3>
            <br />
            <ul class="v-endpoint-list">
                <li class="endpoint-item"><a href="#" class="endpoint-link" @click="handleRequest($event, '{{ $endpoint }}/')"><b>GET</b> {{ $endpoint }}/</a></li>
                <li class="endpoint-item"><a href="#" class="endpoint-link" @click="handleRequest($event, '{{ $endpoint }}/1')"><b>GET</b> {{ $endpoint }}/1</a></li>
                @if(($endpoint === 'parks') || ($endpoint === 'players'))
                    {{--These endpoints do not contain a teamID--}}
                @else
                    <li class="endpoint-item"><a href="#" class="endpoint-link"  @click="handleRequest($event, '{{ $endpoint }}/?q=teamID:LAA')"><b>GET</b> {{ $endpoint }}/?q=teamID:LAA</a></li>
                @endif
                <li class="endpoint-item"><a href="#" @click="handleRequest($event,'POST')"   class="endpoint-link"><b>POST</b> {{ $endpoint }}/</a></li>
                <li class="endpoint-item"><a href="#" @click="handleRequest($event,'PUT')"    class="endpoint-link"><b>PUT</b> {{ $endpoint }}/</a></li>
                <li class="endpoint-item"><a href="#" @click="handleRequest($event,'PATCH')"  class="endpoint-link"><b>PATCH</b> {{ $endpoint }}/</a></li>
                <li class="endpoint-item"><a href="#" @click="handleRequest($event,'DELETE')" class="endpoint-link"><b>DELETE</b> {{ $endpoint }}/</a></li>
            </ul>
        </div>

        <div id="endpoint-tree">
            <h3>{{ ucwords(str_singular($endpoint)) }} Response</h3>
            {{--<pre v-html="result"></pre>--}}
            <tree-view :data="tree" max-depth="3"></tree-view>
        </div>

        <div id="endpoint-results" class="hide">
            <h3>{{ ucwords(str_singular($endpoint)) }} Response</h3>
            {{--<pre id="v-response" v-html="result" class="api-response"></pre>--}}
        </div>

    </div>

@stop

