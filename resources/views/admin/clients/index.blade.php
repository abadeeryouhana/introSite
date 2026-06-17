@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Clients</h1>
    <a href="{{ route('admin.clients.create') }}" class="btn">Add New</a>
</div>
<div class="card">
    <table>
        <tr>
            <th>Name</th>
<th>URL</th>
<th>Order</th>
<th>Logo Image</th>

            <th>Actions</th>
        </tr>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
<td>{{ $client->url }}</td>
<td>{{ $client->order }}</td>
<td>@if($client->logo_path) <img src="{{ asset('storage/' . $client->logo_path) }}" width="50"> @endif</td>

            <td>
                <a href="{{ route('admin.clients.edit', $client) }}" class="btn">Edit</a>
                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection