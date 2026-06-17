@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Contact Messages</h1>
</div>
<div class="card">
    <table>
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Date</th><th>Actions</th></tr>
        @foreach($messages as $message)
        <tr>
            <td>{{ $message->first_name }} {{ $message->last_name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->phone }}</td>
            <td>{{ $message->created_at }}</td>
            <td>
                <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn">View</a>
                <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection