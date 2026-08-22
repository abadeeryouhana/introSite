@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Chatbot FAQs</h1>
    <a href="{{ route('admin.chatbot-questions.create') }}" class="btn">Add New Question</a>
</div>
<div class="card">
    <table>
        <tr>
            <th style="width: 60px;">Order</th>
            <th>Question</th>
            <th>Answer</th>
            <th style="width: 100px;">Status</th>
            <th style="width: 180px;">Actions</th>
        </tr>
        @forelse($questions as $item)
        <tr>
            <td>{{ $item->order }}</td>
            <td style="font-weight: 600;">{{ $item->question }}</td>
            <td style="color: var(--admin-text-muted);">{{ Str::limit($item->answer, 80) }}</td>
            <td>
                @if($item->is_active)
                    <span style="display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; background: rgba(80, 205, 137, 0.15); color: #50cd89; font-weight: 600;">Active</span>
                @else
                    <span style="display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; background: rgba(241, 65, 108, 0.15); color: #f1416c; font-weight: 600;">Inactive</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.chatbot-questions.edit', $item) }}" class="btn">Edit</a>
                <form action="{{ route('admin.chatbot-questions.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align: center; color: var(--admin-text-muted); padding: 30px;">No chatbot questions found. Click "Add New Question" to create one.</td>
        </tr>
        @endforelse
    </table>
</div>
@endsection
