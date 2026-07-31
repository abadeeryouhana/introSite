@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Case Study</h1>
    <a href="{{ route('admin.case-studies.index') }}" class="btn" style="background:#555;">Back to List</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red; margin-bottom: 15px;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.case-studies.update', $caseStudy) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Sector</label>
            <select name="sector_id" required style="width: 100%; padding: 8px;">
                <option value="">Select Sector</option>
                @foreach($sectors as $sector)
                    <option value="{{ $sector->id }}" {{ old('sector_id', $caseStudy->sector_id) == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $caseStudy->title) }}" required>
        </div>
        <div class="form-group">
            <label>Sub Title</label>
            <input type="text" name="sub_title" value="{{ old('sub_title', $caseStudy->sub_title) }}">
        </div>
        <div class="form-group">
            <label>Challenge</label>
            <textarea name="challenge" rows="3">{{ old('challenge', $caseStudy->challenge) }}</textarea>
        </div>
        <div class="form-group">
            <label>Solution</label>
            <textarea name="solution" rows="3">{{ old('solution', $caseStudy->solution) }}</textarea>
        </div>
        <div class="form-group">
            <label>Delivered</label>
            <textarea name="delivered" rows="3">{{ old('delivered', $caseStudy->delivered) }}</textarea>
        </div>
        <div class="form-group">
            <label>Tools</label>
            <textarea name="tools" rows="3">{{ old('tools', $caseStudy->tools) }}</textarea>
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" value="{{ old('order', $caseStudy->order) }}">
        </div>
        <div class="form-group">
            <label>Background Image</label>
            <input type="file" name="image">
            @if($caseStudy->image)
                <br><img src="{{ asset('storage/' . $caseStudy->image) }}" width="150" style="margin-top:10px; border-radius: 4px;">
            @endif
        </div>
        <button type="submit" class="btn">Update Case Study</button>
    </form>
</div>
@endsection
