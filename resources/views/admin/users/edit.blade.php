@extends('admin.layout')

@section('content')
<div class="header">
    <h2>Edit User</h2>
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

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        
        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
        <p style="color: #666; font-size: 14px; margin-top: 0;">Leave password fields blank if you do not want to change the password.</p>

        <div class="form-group">
            <label for="password">New Password (Optional)</label>
            <input type="password" id="password" name="password" minlength="8">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" minlength="8">
        </div>
        <button type="submit" class="btn">Update User</button>
    </form>
</div>
@endsection
