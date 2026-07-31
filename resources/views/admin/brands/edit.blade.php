@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Brand</h1>
    <a href="{{ route('admin.brands.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $brand->name) }}">
        </div>
        <div class="form-group">
            <label>Sector</label>
            <select name="sector_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">Select a Sector</option>
                @foreach($sectors as $sector)
                    <option value="{{ $sector->id }}" {{ old('sector_id', $brand->sector_id) == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" rows="4">{{ old('description', $brand->description) }}</textarea>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="Soon" {{ old('status', $brand->status) == 'Soon' ? 'selected' : '' }}>Soon</option>
                <option value="Live" {{ old('status', $brand->status) == 'Live' ? 'selected' : '' }}>Live</option>
            </select>
        </div>
        <div class="form-group">
            <label>URL</label>
            <input type="text" name="url" value="{{ old('url', $brand->url) }}">
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="text" name="order" value="{{ old('order', $brand->order) }}">
        </div>
        <div class="form-group">
            <label>Logo Image</label>
            <input type="file" name="logo">
            @if($brand->logo_path)
                <br><img src="{{ asset('storage/' . $brand->logo_path) }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn">Update</button>
    </form>
</div>
@endsection
