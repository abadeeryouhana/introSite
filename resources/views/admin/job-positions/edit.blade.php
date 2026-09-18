@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit Position</h1>
    <a href="{{ route('admin.job-positions.index') }}" class="btn">Back</a>
</div>
<div class="card">
    <form action="{{ route('admin.job-positions.update', $job_position) }}" method="POST">
        @csrf @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
            <div>
                <label style="font-weight:600; display:block; margin-bottom:6px;">Job Title *</label>
                <input type="text" name="title" value="{{ old('title', $job_position->title) }}" required
                    style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:6px; font-size:14px;">
                @error('title')<p style="color:red; font-size:12px; margin-top:4px;">{{ $message }}</p>@enderror
            </div>
            <div>
                <label style="font-weight:600; display:block; margin-bottom:6px;">Sector</label>
                @php
                    $currentSector = old('sector', $job_position->sector);
                    $isKnownSector = in_array($currentSector, $sectors ?? []);
                @endphp
                <select name="sector" id="sector_select" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:6px; font-size:14px;" onchange="toggleCustomSector(this.value)">
                    <option value="">— Select Sector —</option>
                    @foreach($sectors as $sec)
                        <option value="{{ $sec }}" {{ $currentSector == $sec ? 'selected' : '' }}>{{ $sec }}</option>
                    @endforeach
                    <option value="custom" {{ ($currentSector && !$isKnownSector) ? 'selected' : '' }}>+ Other / Custom Sector...</option>
                </select>
                <div id="custom_sector_wrap" style="margin-top:8px; display:{{ ($currentSector && !$isKnownSector) ? 'block' : 'none' }};">
                    <input type="text" name="custom_sector" id="custom_sector" value="{{ old('custom_sector', (!$isKnownSector ? $currentSector : '')) }}" placeholder="Enter custom sector name..."
                        style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:6px; font-size:14px;">
                </div>
                <small style="color:#888;">Used for the role filter pills on the careers page</small>
            </div>
            <div>
                <label style="font-weight:600; display:block; margin-bottom:6px;">Company</label>
                <input type="text" name="company" value="{{ old('company', $job_position->company) }}"
                    style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label style="font-weight:600; display:block; margin-bottom:6px;">Location</label>
                <input type="text" name="location" value="{{ old('location', $job_position->location) }}"
                    style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label style="font-weight:600; display:block; margin-bottom:6px;">Type</label>
                <select name="type" style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:6px; font-size:14px;">
                    <option value="">— Select Type —</option>
                    @foreach(['Full-time','Part-time','Freelance','Contract','Remote'] as $t)
                        <option value="{{ $t }}" {{ old('type', $job_position->type) == $t ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label style="font-weight:600; display:block; margin-bottom:6px;">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $job_position->order) }}" min="0"
                    style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:6px; font-size:14px;">
            </div>
        </div>

        <div style="margin-bottom:20px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">Description</label>
            <textarea name="description" rows="4"
                style="width:100%; padding:10px; border:1px solid #e2e8f0; border-radius:6px; font-size:14px;">{{ old('description', $job_position->description) }}</textarea>
        </div>

        <div style="margin-bottom:24px;">
            <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $job_position->is_active) ? 'checked' : '' }}
                    style="width:18px; height:18px;">
                <span style="font-weight:600;">Active (visible on website)</span>
            </label>
        </div>

        <button type="submit" class="btn">Update Position</button>
    </form>
</div>
<script>
function toggleCustomSector(val) {
    var wrap = document.getElementById('custom_sector_wrap');
    if (wrap) {
        wrap.style.display = (val === 'custom') ? 'block' : 'none';
        if (val === 'custom') {
            document.getElementById('custom_sector').focus();
        }
    }
}
</script>
@endsection
