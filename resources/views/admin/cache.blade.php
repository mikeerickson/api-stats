@extends('layout')

@section('content')
    <h1>Cache Viewer</h1>

    <table id="cache-viewer" class="table table-stripped table-bordered table-hover table-condensed">
        <thead>
            <th>Expiration</th>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr class="{{ $item->key === 'laravelteam_ids' ? 'success' : '' }}">
                    <td>{{ date("Y-m-d g:i A", $item->expiration) }}</td>
                    <td>{{ $item->key }}</td>
                    <td>{{ str_replace(",", ", ", decrypt($item->value)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
