@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Blogs</h1>
    <a href="{{ route('admin.blogs.create') }}" class="btn">Add New</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Category</th>
            <th>Title</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->id }}</td>
            <td>
                @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="50">
                @else
                    N/A
                @endif
            </td>
            <td>{{ $blog->category ? $blog->category->name : 'N/A' }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->created_at->format('M d, Y') }}</td>
            <td>
                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn" style="background:#ffc107; color:#333;">Edit</a>
                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
