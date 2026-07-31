@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Case Studies</h1>
    <a href="{{ route('admin.case-studies.create') }}" class="btn">Add New Case Study</a>
</div>
<div class="card">
    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Image</th>
                <th>Sector</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($caseStudies as $cs)
            <tr>
                <td>{{ $cs->order }}</td>
                <td>
                    @if($cs->image)
                        <img src="{{ asset('storage/' . $cs->image) }}" width="50" height="50" style="object-fit: cover; border-radius: 4px;">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $cs->sector->name ?? 'N/A' }}</td>
                <td>{{ $cs->title }}</td>
                <td>{{ $cs->sub_title }}</td>
                <td>
                    <a href="{{ route('admin.case-studies.edit', $cs) }}" class="btn" style="padding: 4px 8px; font-size: 12px;">Edit</a>
                    <form action="{{ route('admin.case-studies.destroy', $cs) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
