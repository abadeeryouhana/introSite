@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Create Sector</h1>
    <a href="{{ route('admin.sectors.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.sectors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn">Save</button>
    </form>
</div>
@endsection
