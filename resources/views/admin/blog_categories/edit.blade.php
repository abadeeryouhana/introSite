@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Blog Category</h1>
    <a href="{{ route('admin.blog-categories.index') }}" class="btn" style="background:#555;">Back to List</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red; margin-bottom: 15px;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.blog-categories.update', $blogCategory->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $blogCategory->name) }}" required>
        </div>
        <button type="submit" class="btn">Update Category</button>
    </form>
</div>
@endsection
