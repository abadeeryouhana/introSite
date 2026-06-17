@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Create Services</h1>
    <a href="{{ route('admin.services.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" rows="5">{{ old('description', $service->description ?? '') }}</textarea>
    </div>
    <div class="form-group">
        <label>Order</label>
        <input type="text" name="order" value="{{ old('order', $service->order ?? '') }}">
    </div>
    <div class="form-group">
        <label>Icon Image</label>
        <input type="file" name="icon">
        @if(isset($service) && $service->icon_path)
            <br><img src="{{ asset('storage/' . $service->icon_path) }}" width="100">
        @endif
    </div>

        <button type="submit" class="btn">Save</button>
    </form>
</div>
@endsection