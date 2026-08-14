@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
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
            @if($service->icon_path)
                <img src="{{ asset('storage/' . $service->icon_path) }}" alt="{{ $service->title }}" style="max-width: 32px; margin-bottom: 15px; object-fit: contain;">
            @else
                <div class="service-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="32" height="32"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg></div>
            @endif
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->description }}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection