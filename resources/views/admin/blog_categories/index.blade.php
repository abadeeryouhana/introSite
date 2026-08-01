@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Blog Categories</h1>
    <a href="{{ route('admin.blog-categories.create') }}" class="btn">Add New</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('admin.blog-categories.edit', $category->id) }}" class="btn" style="background:#ffc107; color:#333;">Edit</a>
                <form action="{{ route('admin.blog-categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
