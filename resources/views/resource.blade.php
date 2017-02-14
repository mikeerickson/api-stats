@extends('layout')

@section('content')
    <h3>{{ str_singular($endpoint) }} Endpoints</h3>
    <br />
    <ul class="endpoint-list">
        <li class="endpoint-item"><a href="#" x-data-request="{{ strtolower($endpoint) }}/" class="btn-endpoint"><b>GET</b> {{ $endpoint }}/</a></li>
        <li class="endpoint-item"><a href="#" x-data-request="{{ $endpoint }}/1" class="btn-endpoint"><b>GET</b> {{ $endpoint }}/1</a></li>
        @if($endpoint === 'Parks')
        @else
            <li class="endpoint-item"><a href="#" x-data-request="{{ strtolower($endpoint) }}/?q=teamID:LAA" class="btn-endpoint"><b>GET</b> {{ $endpoint }}/?q=teamID:LAA</a></li>
        @endif
        <li class="endpoint-item"><a href="#" x-data-request="POST" class="btn-endpoint"><b>POST</b> {{ $endpoint }}/</a></li>
        <li class="endpoint-item"><a href="#" x-data-request="PUT" class="btn-endpoint"><b>PUT</b> {{ $endpoint }}/1</a></li>
        <li class="endpoint-item"><a href="#" x-data-request="PATCH" class="btn-endpoint"><b>PATCH</b> {{ $endpoint }}/1</a></li>
        <li class="endpoint-item"><a href="#" x-data-request="DELETE" class="btn-endpoint"><b>DELETE</b> {{ $endpoint }}/1</a></li>
    </ul>
    <hr />
    <pre id="response" class="api-response hide">
    </pre>
@stop