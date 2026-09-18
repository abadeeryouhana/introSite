@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Application Detail</h1>
    <a href="{{ route('admin.job-applications.index') }}" class="btn">Back</a>
</div>
<div class="card">
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
        <div>
            <p><strong>Full Name:</strong> {{ $job_application->full_name }}</p>
            <p><strong>Email:</strong> {{ $job_application->email }}</p>
            <p><strong>Country:</strong> {{ $job_application->country ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $job_application->country_code ? $job_application->country_code . ' ' : '' }}{{ $job_application->phone ?? 'N/A' }}</p>
        </div>
        <div>
            <p><strong>Subject:</strong> {{ $job_application->subject }}</p>
            <p><strong>Position Applied For:</strong>
                {{ $job_application->position ? $job_application->position->title : 'General Application' }}
            </p>
            <p><strong>Date Submitted:</strong> {{ $job_application->created_at->format('d M Y, H:i') }}</p>
            <p>
                <strong>CV / Resume:</strong>
                @if($job_application->cv_path)
                    <a href="{{ asset('storage/' . $job_application->cv_path) }}" target="_blank" class="btn" style="font-size:12px; padding:4px 12px; margin-left:8px;">Download CV</a>
                @else
                    Not provided
                @endif
            </p>
        </div>
    </div>
    @if($job_application->message)
    <hr style="margin:20px 0;">
    <p><strong>Message:</strong></p>
    <p style="white-space:pre-line; background:#f8fafc; padding:14px; border-radius:6px; border:1px solid #e2e8f0;">{{ $job_application->message }}</p>
    @endif
</div>
@endsection
