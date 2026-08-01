@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Add New Blog</h1>
    <a href="{{ route('admin.blogs.index') }}" class="btn" style="background:#555;">Back to List</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red; margin-bottom: 15px;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Category</label>
            <select name="blog_category_id" required style="width: 100%; padding: 8px;">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('blog_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label>Sub Title</label>
            <input type="text" name="sub_title" value="{{ old('sub_title') }}">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" id="editor" rows="10">{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn">Save Blog</button>
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
