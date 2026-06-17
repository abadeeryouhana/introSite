@extends('admin.layout')

@section('content')
<div class="header">
    <h1>Dashboard</h1>
</div>
<div class="card">
    <h3>Recent Contact Messages</h3>
    @if(isset($recentMessages) && $recentMessages->count())
        <table>
            <tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>
            @foreach($recentMessages as $msg)
            <tr>
                <td>{{ $msg->first_name }} {{ $msg->last_name }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ Str::limit($msg->message, 50) }}</td>
                <td>{{ $msg->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No recent messages.</p>
    @endif
</div>
@endsection