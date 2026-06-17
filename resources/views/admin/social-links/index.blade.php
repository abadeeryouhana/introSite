@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Social Links</h1>
    <a href="{{ route('admin.social-links.create') }}" class="btn">Add New</a>
</div>
<div class="card">
    <table>
        <tr>
            <th>Platform</th>
<th>URL</th>

            <th>Actions</th>
        </tr>
        @foreach($social_links as $social_link)
        <tr>
            <td>{{ $social_link->platform }}</td>
<td>{{ $social_link->url }}</td>

            <td>
                <a href="{{ route('admin.social-links.edit', $social_link) }}" class="btn">Edit</a>
                <form action="{{ route('admin.social-links.destroy', $social_link) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection