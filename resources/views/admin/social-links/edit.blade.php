@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Social Links</h1>
    <a href="{{ route('admin.social-links.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.social-links.update', $social_link) }}" method="POST" >
        @csrf @method('PUT')
            <div class="form-group">
        <label>Platform</label>
        <input type="text" name="platform" value="{{ old('platform', $social_link->platform ?? '') }}">
    </div>
    <div class="form-group">
        <label>URL</label>
        <input type="text" name="url" value="{{ old('url', $social_link->url ?? '') }}">
    </div>

        <button type="submit" class="btn">Update</button>
    </form>
</div>
@endsection