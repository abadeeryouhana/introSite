@extends('layouts.app')
@section('content')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/sectors-brands.css') }}">
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
        <div class="sb-breadcrumb">HOME / <span>SECTORS & BRANDS</span></div>
        <div class="sb-subtitle">SECTORS & BRANDS</div>
        <h1 class="sb-title">One Group. Five Sectors. <span>A family of brands.</span></h1>
        <p class="sb-desc">Specialized brands, one operating platform &mdash; so every engagement benefits from shared insight, systems, and quality standards.</p>
    </div>
</div>

<div class="sb-nav-bar">
    <div class="sb-nav-container">
        <a href="#all" class="sb-nav-pill active" onclick="setActiveSector(event, 'all', this)">
            All Brands
        </a>
        @foreach($sectors as $sector)
            <a href="#sector-{{ $sector->id }}" class="sb-nav-pill" onclick="setActiveSector(event, 'sector-{{ $sector->id }}', this)">
                {{ $sector->name }}
            </a>
        @endforeach
    </div>
</div>

<div class="sb-content">
    @foreach($sectors as $sector)
        <div id="sector-{{ $sector->id }}" class="sb-sector-section" style="display: block;">
            <h2 class="sb-sector-title">{{ $sector->name }}</h2>
            
            @if($sector->brands->count() > 0)
                <div class="sb-brands-grid">
                    @foreach($sector->brands as $brand)
                        @if($brand->url)
                            <a href="{{ $brand->url }}" target="_blank" class="sb-brand-card" style="text-decoration: none;">
                        @else
                            <div class="sb-brand-card">
                        @endif
                            @if($brand->status)
                                <div class="sb-status-badge {{ $brand->status == 'Live' ? 'sb-status-live' : 'sb-status-soon' }}">
                                    {{ $brand->status }}
                                </div>
                            @endif
                            @if($brand->logo_path)
                                <img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}">
                            @endif
                            <h4>{{ $brand->name }}</h4>
                            @if($brand->description)
                                <p class="sb-brand-desc">{{ $brand->description }}</p>
                            @endif
                        @if($brand->url)
                            </a>
                        @else
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p style="color: #777; font-size: 1.1rem;">No brands available in this sector yet.</p>
            @endif
        </div>
    @endforeach
</div>

@push('scripts')
    <script src="{{ asset('js/sectors-brands.js') }}"></script>
@endpush

@endsection
