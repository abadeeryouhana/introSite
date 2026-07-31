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
            <label>Site Name</label>
            <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'Bayan Group' }}">
        </div>
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
        <div class="form-group" style="display: flex; gap: 15px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label>Location 1 Title (e.g. CAIRO HQ)</label>
                <input type="text" name="contact_title_1" value="{{ $settings['contact_title_1'] ?? 'CAIRO HQ' }}">
            </div>
            <div style="flex: 1;">
                <label>Location 1 Phone</label>
                <input type="text" name="contact_phone_1" value="{{ $settings['contact_phone_1'] ?? '(+20) 127 0432 222' }}">
            </div>
        </div>
        <div class="form-group" style="display: flex; gap: 15px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label>Location 2 Title (e.g. MUSCAT)</label>
                <input type="text" name="contact_title_2" value="{{ $settings['contact_title_2'] ?? 'MUSCAT' }}">
            </div>
            <div style="flex: 1;">
                <label>Location 2 Phone</label>
                <input type="text" name="contact_phone_2" value="{{ $settings['contact_phone_2'] ?? '(+968) 9141 2315' }}">
            </div>
        </div>
        <div class="form-group" style="display: flex; gap: 15px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label>Location 3 Title (e.g. FLORIDA)</label>
                <input type="text" name="contact_title_3" value="{{ $settings['contact_title_3'] ?? 'FLORIDA' }}">
            </div>
            <div style="flex: 1;">
                <label>Location 3 Phone</label>
                <input type="text" name="contact_phone_3" value="{{ $settings['contact_phone_3'] ?? '(+1) 727 371 4121' }}">
            </div>
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