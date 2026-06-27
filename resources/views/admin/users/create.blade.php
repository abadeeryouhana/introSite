@extends('admin.layout')

@section('content')
<div class="header">
    <h2>Add New User</h2>
    <a href="{{ route('admin.users.index') }}" class="btn">Back to Users</a>
</div>

<div class="card" style="max-width: 600px;">
    @if($errors->any())
        <div class="alert" style="background: #f8d7da; color: #721c24;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required minlength="8">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8">
        </div>
        <button type="submit" class="btn">Create User</button>
    </form>
</div>
@endsection
