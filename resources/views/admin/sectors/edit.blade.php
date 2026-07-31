@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Sector</h1>
    <a href="{{ route('admin.sectors.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.sectors.update', $sector) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $sector->name) }}">
        </div>
        <button type="submit" class="btn">Update</button>
    </form>
</div>
@endsection
