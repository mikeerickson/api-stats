@extends('layout')

@section('resource')
    <div id="v-resource">
        <div class="col-md-6">
            <div id="endpoint-list">
                <h3>{{ ucwords(str_singular($endpoint)) }} Endpoints</h3>
                <br />
                <ul class="v-endpoint-list">
                    <li class="endpoint-item"><a href="#" class="endpoint-link" @click="handleRequest($event, '{{ $endpoint }}/')"><b>GET</b> {{ $endpoint }}/</a></li>
                    <li class="endpoint-item"><a href="#" class="endpoint-link" @click="handleRequest($event, '{{ $endpoint }}/troutmi01')"><b>GET</b> {{ $endpoint }}/troutmi01</a></li>
                    @if(($endpoint === 'parks') || ($endpoint === 'players'))
                        {{--These endpoints do not contain a teamID--}}
                    @else
                        <li class="endpoint-item"><a href="#" class="endpoint-link"  @click="handleRequest($event, '{{ $endpoint }}/?q=teamID:LAA')"><b>GET</b> {{ $endpoint }}/?q=teamID:LAA</a></li>
                    @endif
                    <li class="endpoint-item"><a href="#" @click="handleRequest($event,'{{ $endpoint }}/POST')"   class="endpoint-link"><b>POST</b> {{ $endpoint }}/</a></li>
                    <li class="endpoint-item"><a href="#" @click="handleRequest($event,'{{ $endpoint }}/PUT')"    class="endpoint-link"><b>PUT</b> {{ $endpoint }}/</a></li>
                    <li class="endpoint-item"><a href="#" @click="handleRequest($event,'{{ $endpoint }}/PATCH')"  class="endpoint-link"><b>PATCH</b> {{ $endpoint }}/</a></li>
                    <li class="endpoint-item"><a href="#" @click="handleRequest($event,'{{ $endpoint }}/DELETE')" class="endpoint-link"><b>DELETE</b> {{ $endpoint }}/</a></li>
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
        <div class="col-md-6">
            <h3>{{ ucwords(str_singular($endpoint)) }} Form</h3>
            <form>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop
