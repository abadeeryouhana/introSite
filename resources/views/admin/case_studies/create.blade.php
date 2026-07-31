@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Add New Case Study</h1>
    <a href="{{ route('admin.case-studies.index') }}" class="btn" style="background:#555;">Back to List</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red; margin-bottom: 15px;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.case-studies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Sector</label>
            <select name="sector_id" required style="width: 100%; padding: 8px;">
                <option value="">Select Sector</option>
                @foreach($sectors as $sector)
                    <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
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
            <label>Challenge</label>
            <textarea name="challenge" rows="3">{{ old('challenge') }}</textarea>
        </div>
        <div class="form-group">
            <label>Solution</label>
            <textarea name="solution" rows="3">{{ old('solution') }}</textarea>
        </div>
        <div class="form-group">
            <label>Delivered</label>
            <textarea name="delivered" rows="3">{{ old('delivered') }}</textarea>
        </div>
        <div class="form-group">
            <label>Tools</label>
            <textarea name="tools" rows="3">{{ old('tools') }}</textarea>
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" value="{{ old('order', 0) }}">
        </div>
        <div class="form-group">
            <label>Background Image</label>
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn">Save Case Study</button>
    </form>
</div>
@endsection
