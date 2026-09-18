@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Open Positions</h1>
    <a href="{{ route('admin.job-positions.create') }}" class="btn">Add New Position</a>
</div>
<div class="card">
    <table>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Sector</th>
            <th>Company</th>
            <th>Location</th>
            <th>Type</th>
            <th>Status</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        @forelse($positions as $position)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><strong>{{ $position->title }}</strong></td>
            <td>{{ $position->sector ?? '—' }}</td>
            <td>{{ $position->company ?? '—' }}</td>
            <td>{{ $position->location ?? '—' }}</td>
            <td>{{ $position->type ?? '—' }}</td>
            <td>
                @if($position->is_active)
                    <span style="color:#22c55e; font-weight:600;">Active</span>
                @else
                    <span style="color:#ef4444; font-weight:600;">Inactive</span>
                @endif
            </td>
            <td>{{ $position->order }}</td>
            <td>
                <a href="{{ route('admin.job-positions.edit', $position) }}" class="btn">Edit</a>
                <form action="{{ route('admin.job-positions.destroy', $position) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this position?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" style="text-align:center; color:#888;">No job positions yet.</td>
        </tr>
        @endforelse
    </table>
</div>
@endsection
