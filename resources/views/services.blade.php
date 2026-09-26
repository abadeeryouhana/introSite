@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/services.css') }}?v={{ filemtime(public_path('css/services.css')) }}">
@endpush

<div class="sb-hero">
    <div class="sb-waves">
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
    </div>
    
    <div class="sb-hero-content">
        <div class="sb-breadcrumb">HOME / <span>SERVICES</span></div>
        <div class="sb-subtitle">SERVICES</div>
        <h1 class="sb-title"><span>Ten services.</span> One integrated engine.</h1>
        <p class="sb-desc">Every service is engineered to compose with the others &mdash; so strategy, systems, language, and learning move together, not in silos.</p>
    </div>
</div>

<div class="services-frame">
    <div class="services-grid">
        @foreach($services as $service)
        <div class="service-card animate-fade-up">
            <div class="service-card-icon">
                @if($service->icon_path)
                    <img src="{{ asset('storage/' . $service->icon_path) }}" alt="{{ $service->title }}" class="service-card-icon-img">
                @else
                    <div class="service-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="28" height="28"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg></div>
                @endif
            </div>
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->description }}</p>
        </div>
        @endforeach
    </div>
</div>

<!-- INDUSTRIES SERVED BANNER -->
<div class="industries-banner">
    <div class="industries-container animate-fade-up">
        <p class="industries-text">
            <strong class="industries-highlight">Serving 70+ industries</strong>
            <span class="industries-dash">&mdash;</span>
            <span class="industry-item">Energy &amp; Oil</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">Education</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">Technology</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">Finance</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">Legal</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">Healthcare</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">Government</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">FMCG &amp; Retail</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">Media</span>
            <span class="industry-dot">&middot;</span>
            <span class="industry-item">Real Estate &amp; more</span>
        </p>
    </div>
</div>

@endsection