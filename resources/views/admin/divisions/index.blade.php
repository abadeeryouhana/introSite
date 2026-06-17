@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Divisions</h1>
    <a href="{{ route('admin.divisions.create') }}" class="btn">Add New</a>
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
        @foreach($divisions as $division)
        <tr>
            <td>{{ $division->name }}</td>
<td>{{ $division->url }}</td>
<td>{{ $division->order }}</td>
<td>@if($division->logo_path) <img src="{{ asset('storage/' . $division->logo_path) }}" width="50"> @endif</td>

            <td>
                <a href="{{ route('admin.divisions.edit', $division) }}" class="btn">Edit</a>
                <form action="{{ route('admin.divisions.destroy', $division) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection