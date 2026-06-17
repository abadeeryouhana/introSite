@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Services</h1>
    <a href="{{ route('admin.services.create') }}" class="btn">Add New</a>
</div>
<div class="card">
    <table>
        <tr>
            <th>Title</th>
<th>Description</th>
<th>Order</th>
<th>Icon Image</th>

            <th>Actions</th>
        </tr>
        @foreach($services as $service)
        <tr>
            <td>{{ $service->title }}</td>
<td>{{ $service->description }}</td>
<td>{{ $service->order }}</td>
<td>@if($service->icon_path) <img src="{{ asset('storage/' . $service->icon_path) }}" width="50"> @endif</td>

            <td>
                <a href="{{ route('admin.services.edit', $service) }}" class="btn">Edit</a>
                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection