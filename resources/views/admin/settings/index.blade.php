@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Settings</h1>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Site Logo</label>
            <input type="file" name="site_logo">
            @if(isset($settings['site_logo']))
                <br><img src="{{ asset('storage/' . $settings['site_logo']) }}" width="150" style="background:#ccc;">
            @endif
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}">
        </div>
        <div class="form-group">
            <label>Contact Phone</label>
            <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}">
        </div>
        <div class="form-group">
            <label>Contact Address</label>
            <input type="text" name="contact_address" value="{{ $settings['contact_address'] ?? '' }}">
        </div>
        <div class="form-group">
            <label>Primary Color</label>
            <input type="color" name="color_primary" value="{{ $settings['color_primary'] ?? '#3D81C3' }}">
        </div>
        <div class="form-group">
            <label>Secondary Color</label>
            <input type="color" name="color_secondary" value="{{ $settings['color_secondary'] ?? '#2BB295' }}">
        </div>
        <button type="submit" class="btn">Save Settings</button>
    </form>
</div>
@endsection