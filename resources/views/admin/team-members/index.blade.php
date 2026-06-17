@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Team Members</h1>
    <a href="{{ route('admin.team-members.create') }}" class="btn">Add New</a>
</div>
<div class="card">
    <table>
        <tr>
            <th>Name</th>
<th>Position</th>
<th>Order</th>
<th>Image</th>

            <th>Actions</th>
        </tr>
        @foreach($team_members as $team_member)
        <tr>
            <td>{{ $team_member->name }}</td>
<td>{{ $team_member->position }}</td>
<td>{{ $team_member->order }}</td>
<td>@if($team_member->image_path) <img src="{{ asset('storage/' . $team_member->image_path) }}" width="50"> @endif</td>

            <td>
                <a href="{{ route('admin.team-members.edit', $team_member) }}" class="btn">Edit</a>
                <form action="{{ route('admin.team-members.destroy', $team_member) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection