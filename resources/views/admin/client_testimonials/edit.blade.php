@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Client Testimonial</h1>
    <a href="{{ route('admin.client-testimonials.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.client-testimonials.update', $clientTestimonial) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Client</label>
            <select name="client_id" required style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                <option value="">Select a Client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id', $clientTestimonial->client_id) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $clientTestimonial->title) }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" required style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">{{ old('description', $clientTestimonial->description) }}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
            @if($clientTestimonial->image)
                <br><img src="{{ asset('storage/' . $clientTestimonial->image) }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn">Update</button>
    </form>
</div>
@endsection
