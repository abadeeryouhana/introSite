@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Brands</h1>
    <a href="{{ route('admin.brands.create') }}" class="btn">Add New</a>
</div>
<div class="card">
    <table>
        <tr>
            <th>Name</th>
            <th>Sector</th>
            <th>Status</th>
            <th>URL</th>
            <th>Order</th>
            <th>Logo Image</th>
            <th>Actions</th>
        </tr>
        @foreach($brands as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->sector ? $brand->sector->name : 'N/A' }}</td>
            <td>{{ $brand->status }}</td>
            <td>{{ $brand->url }}</td>
            <td>{{ $brand->order }}</td>
            <td>@if($brand->logo_path) <img src="{{ asset('storage/' . $brand->logo_path) }}" width="50"> @endif</td>
            <td>
                <a href="{{ route('admin.brands.edit', $brand) }}" class="btn">Edit</a>
                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
