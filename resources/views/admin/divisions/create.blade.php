@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Create Divisions</h1>
    <a href="{{ route('admin.divisions.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.divisions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $division->name ?? '') }}">
    </div>
    <div class="form-group">
        <label>URL</label>
        <input type="text" name="url" value="{{ old('url', $division->url ?? '') }}">
    </div>
    <div class="form-group">
        <label>Order</label>
        <input type="text" name="order" value="{{ old('order', $division->order ?? '') }}">
    </div>
    <div class="form-group">
        <label>Logo Image</label>
        <input type="file" name="logo">
        @if(isset($division) && $division->logo_path)
            <br><img src="{{ asset('storage/' . $division->logo_path) }}" width="100">
        @endif
    </div>

        <button type="submit" class="btn">Save</button>
    </form>
</div>
@endsection