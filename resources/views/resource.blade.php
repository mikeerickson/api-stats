@extends('layout')

@section('content')
    <h3>{{ str_singular($endpoint) }} Endpoints</h3>
    <br />
    <ul class="endpoint-list">
        <li class="endpoint-item"><button type="button" x-data-request="{{ $endpoint }}/" class="btn btn-link btn-endpoint"><b>GET</b> {{ $endpoint }}/</button></li>
        <li class="endpoint-item"><button type="button" x-data-request="{{ $endpoint }}/1" class="btn btn-link btn-endpoint"><b>GET</b> {{ $endpoint }}/1</button></li>
        <li class="endpoint-item"><button type="button" x-data-request="{{ $endpoint }}/?teamID:laa" class="btn btn-link btn-endpoint"><b>GET</b> {{ $endpoint }}/?teamID:laa</button></li>
        <li class="endpoint-item"><button type="button" x-data-request="POST" class="btn btn-link btn-endpoint"><b>POST</b> {{ $endpoint }}/</button></li>
        <li class="endpoint-item"><button type="button" x-data-request="PUT" class="btn btn-link btn-endpoint"><b>PUT</b> {{ $endpoint }}/1</button></li>
        <li class="endpoint-item"><button type="button" x-data-request="PATCH" class="btn btn-link btn-endpoint"><b>PATCH</b> {{ $endpoint }}/1</button></li>
        <li class="endpoint-item"><button type="button" x-data-request="DELETE" class="btn btn-link btn-endpoint"><b>DELETE</b> {{ $endpoint }}/1</button></li>
    </ul>
    <hr />
    <pre id="response">
        Results Displayed Here...
    </pre>
@stop