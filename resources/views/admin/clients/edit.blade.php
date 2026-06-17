@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Clients</h1>
    <a href="{{ route('admin.clients.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.clients.update', $client) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
            <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $client->name ?? '') }}">
    </div>
    <div class="form-group">
        <label>URL</label>
        <input type="text" name="url" value="{{ old('url', $client->url ?? '') }}">
    </div>
    <div class="form-group">
        <label>Order</label>
        <input type="text" name="order" value="{{ old('order', $client->order ?? '') }}">
    </div>
    <div class="form-group">
        <label>Logo Image</label>
        <input type="file" name="logo">
        @if(isset($client) && $client->logo_path)
            <br><img src="{{ asset('storage/' . $client->logo_path) }}" width="100">
        @endif
    </div>

        <button type="submit" class="btn">Update</button>
    </form>
</div>
@endsection