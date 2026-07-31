@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Sectors</h1>
    <a href="{{ route('admin.sectors.create') }}" class="btn">Add New</a>
</div>
<div class="card">
    <table>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach($sectors as $sector)
        <tr>
            <td>{{ $sector->name }}</td>
            <td>
                <a href="{{ route('admin.sectors.edit', $sector) }}" class="btn">Edit</a>
                <form action="{{ route('admin.sectors.destroy', $sector) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
