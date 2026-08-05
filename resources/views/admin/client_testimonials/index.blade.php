@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Client Testimonials</h1>
    <a href="{{ route('admin.client-testimonials.create') }}" class="btn">Add New</a>
</div>
<div class="card">
    <table>
        <tr>
            <th>Client</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach($testimonials as $testimonial)
        <tr>
            <td>{{ $testimonial->client->name ?? 'N/A' }}</td>
            <td>{{ $testimonial->title }}</td>
            <td>{{ Str::limit($testimonial->description, 50) }}</td>
            <td>@if($testimonial->image) <img src="{{ asset('storage/' . $testimonial->image) }}" width="50"> @endif</td>
            <td>
                <a href="{{ route('admin.client-testimonials.edit', $testimonial) }}" class="btn">Edit</a>
                <form action="{{ route('admin.client-testimonials.destroy', $testimonial) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
