@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Blog</h1>
    <a href="{{ route('admin.blogs.index') }}" class="btn" style="background:#555;">Back to List</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red; margin-bottom: 15px;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Category</label>
            <select name="blog_category_id" required style="width: 100%; padding: 8px;">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('blog_category_id', $blog->blog_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}" required>
        </div>
        <div class="form-group">
            <label>Sub Title</label>
            <input type="text" name="sub_title" value="{{ old('sub_title', $blog->sub_title) }}">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" id="editor" rows="10">{{ old('content', $blog->content) }}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            @if($blog->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Current Image" width="100">
                </div>
            @endif
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn">Update Blog</button>
    </form>
</div>

<!-- Include CKEditor 5 Classic -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
        })
        .catch(error => {
            console.error(error);
        });
</script>
<style>
    .ck-editor__editable { min-height: 300px; }
</style>
@endsection
