@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Job Applications</h1>
</div>
<div class="card">
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Position Applied For</th>
            <th>CV</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        @forelse($applications as $app)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $app->full_name }}</td>
            <td>{{ $app->email }}</td>
            <td>{{ $app->subject }}</td>
            <td>{{ $app->position ? $app->position->title : '—' }}</td>
            <td>
                @if($app->cv_path)
                    <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank" class="btn" style="font-size:12px; padding:4px 10px;">Download</a>
                @else
                    <span style="color:#aaa;">None</span>
                @endif
            </td>
            <td>{{ $app->created_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('admin.job-applications.show', $app) }}" class="btn">View</a>
                <form action="{{ route('admin.job-applications.destroy', $app) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this application?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align:center; color:#888;">No applications yet.</td>
        </tr>
        @endforelse
    </table>
</div>
@endsection
