@extends('admin.layout')
@section('content')
<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1>Settings</h1>
    <a href="{{ route('admin.seo.index') }}" class="btn" style="background: var(--admin-primary); color: white; display: inline-flex; align-items: center; gap: 8px;">
        <i class="fa-solid fa-magnifying-glass-chart"></i> Manage Page SEO
    </a>
</div>
<div style="background: linear-gradient(135deg, #3D81C3 0%, #2BB295 100%); color: white; border-radius: 8px; padding: 20px 25px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <h3 style="margin: 0 0 6px 0; font-size: 1.2rem; font-weight: 700;">Looking for Page SEO & Keywords?</h3>
        <p style="margin: 0; opacity: 0.9; font-size: 0.9rem;">Manage Meta Titles, Descriptions, Keywords, Open Graph tags and Google SERP previews per page.</p>
    </div>
    <a href="{{ route('admin.seo.index') }}" style="background: white; color: #1e1e2d; font-weight: 700; text-decoration: none; padding: 10px 20px; border-radius: 6px; font-size: 0.9rem; box-shadow: 0 4px 10px rgba(0,0,0,0.1); white-space: nowrap;">
        Open SEO Settings &rarr;
    </a>
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
        <!-- Location 1 -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 18px; margin-bottom: 20px;">
            <h4 style="margin: 0 0 15px 0; color: #1e293b; font-size: 1rem; font-weight: 700;">Location 1 (Cairo)</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 12px;">
                <div class="form-group" style="margin: 0;">
                    <label>Title</label>
                    <input type="text" name="contact_title_1" value="{{ $settings['contact_title_1'] ?? 'Cairo Office' }}">
                </div>
                <div class="form-group" style="margin: 0;">
                    <label>Phone</label>
                    <input type="text" name="contact_phone_1" value="{{ $settings['contact_phone_1'] ?? '(+20) 127 043 2222' }}">
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 15px;">
                <div class="form-group" style="margin: 0;">
                    <label>Address</label>
                    <input type="text" name="contact_address_1" value="{{ $settings['contact_address_1'] ?? '81 Mustafa El Nahas St., Nasr City, Cairo, Egypt' }}">
                </div>
                <div class="form-group" style="margin: 0;">
                    <label>Email</label>
                    <input type="email" name="contact_email_1" value="{{ $settings['contact_email_1'] ?? ($settings['contact_email'] ?? 'info@bayantranslation.com') }}">
                </div>
            </div>
        </div>

        <!-- Location 2 -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 18px; margin-bottom: 20px;">
            <h4 style="margin: 0 0 15px 0; color: #1e293b; font-size: 1rem; font-weight: 700;">Location 2 (Muscat)</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 12px;">
                <div class="form-group" style="margin: 0;">
                    <label>Title</label>
                    <input type="text" name="contact_title_2" value="{{ $settings['contact_title_2'] ?? 'Muscat Office' }}">
                </div>
                <div class="form-group" style="margin: 0;">
                    <label>Phone</label>
                    <input type="text" name="contact_phone_2" value="{{ $settings['contact_phone_2'] ?? '(+968) 766 11537' }}">
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 15px;">
                <div class="form-group" style="margin: 0;">
                    <label>Address</label>
                    <input type="text" name="contact_address_2" value="{{ $settings['contact_address_2'] ?? 'Office 301, Globex Business Center, Panorama Mall, Ghoubra, Muscat, Oman' }}">
                </div>
                <div class="form-group" style="margin: 0;">
                    <label>Email</label>
                    <input type="email" name="contact_email_2" value="{{ $settings['contact_email_2'] ?? ($settings['contact_email'] ?? 'info@bayantranslation.com') }}">
                </div>
            </div>
        </div>

        <!-- Location 3 -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 18px; margin-bottom: 20px;">
            <h4 style="margin: 0 0 15px 0; color: #1e293b; font-size: 1rem; font-weight: 700;">Location 3 (Florida)</h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 12px;">
                <div class="form-group" style="margin: 0;">
                    <label>Title</label>
                    <input type="text" name="contact_title_3" value="{{ $settings['contact_title_3'] ?? 'Florida Office' }}">
                </div>
                <div class="form-group" style="margin: 0;">
                    <label>Phone</label>
                    <input type="text" name="contact_phone_3" value="{{ $settings['contact_phone_3'] ?? '(+1) 727 371 4121' }}">
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 15px;">
                <div class="form-group" style="margin: 0;">
                    <label>Address</label>
                    <input type="text" name="contact_address_3" value="{{ $settings['contact_address_3'] ?? 'Tampa Bay, Florida, United States' }}">
                </div>
                <div class="form-group" style="margin: 0;">
                    <label>Email</label>
                    <input type="email" name="contact_email_3" value="{{ $settings['contact_email_3'] ?? ($settings['contact_email'] ?? 'info@bayantranslation.com') }}">
                </div>
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