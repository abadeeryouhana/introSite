@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Create Team Members</h1>
    <a href="{{ route('admin.team-members.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $team_member->name ?? '') }}">
    </div>
    <div class="form-group">
        <label>Position</label>
        <input type="text" name="position" value="{{ old('position', $team_member->position ?? '') }}">
    </div>
    <div class="form-group">
        <label>Order</label>
        <input type="text" name="order" value="{{ old('order', $team_member->order ?? '') }}">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image">
        @if(isset($team_member) && $team_member->image_path)
            <br><img src="{{ asset('storage/' . $team_member->image_path) }}" width="100">
        @endif
    </div>

        <button type="submit" class="btn">Save</button>
    </form>
</div>
@endsection