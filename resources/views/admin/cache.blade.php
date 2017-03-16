@extends('layout')

@section('content')
    <table class="table table-stripped table-bordered table-hover table-condensed">
        <thead>
            <th>&nbsp;</th>
            <th>Expiration</th>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr class="{{ $item->key === 'laravelteam_ids' ? 'success' : '' }}">
                    <td><i @click="deleteCacheItem($event)" data-key="{{ $item->key}}" class="glyphicon glyphicon-trash"></i></td>
                    <td width="10%">{{ date("Y-m-d g:i A", $item->expiration) }}</td>
                    <td>{{ $item->key }}</td>
                    <td>{{ str_replace(",", ", ", decrypt($item->value)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop


