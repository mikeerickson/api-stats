@extends('layout')

@section('content')
    <div class="contact-request">
        <h1>Contact Requests</h1>

        <table class="table">
            <thead>
            <th>Status</th>
            <th>Date</th>
            <th>Name</th>
            <th>EMail</th>
            <th>Endpoint</th>
            <th>Comment</th>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr class="{{ getContactStatus($item->created_at, $item->replied) }}">
                    <td width="10%">{{ $item->created_at->diffForHumans() }}</td>
                    <td width="10%">{{ $item->created_at->format('Y-m-d h:i A') }}</td>
                    <td width="10%">{{ $item->name }}</td>
                    <td width="15%"><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                    <td width="10%">{{ $item->api_endpoint }}</td>
                    <td>{{ $item->comment }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
