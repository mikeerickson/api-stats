@extends('layout')

@section('content')
    <h1>Cache Viewer</h1>

    <table class="table">
        <thead>
            <th>Expiration</th>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ date("Y-m-d g:i a", $item->expiration) }}</td>
                    <td>{{ $item->key }}</td>
                    <td>{{ str_replace(",", ", ", decrypt($item->value)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
