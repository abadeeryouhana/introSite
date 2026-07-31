@extends('layouts.app')
@section('content')

<style>
    .sb-hero {
        background: linear-gradient(110deg, #102640 0%, #30659b 100%);
        color: white;
        padding: 100px 20px 80px;
        position: relative;
        overflow: hidden;
    }
    .sb-hero-content {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .sb-breadcrumb {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        margin-bottom: 30px;
        color: rgba(255,255,255,0.8);
    }
    .sb-breadcrumb span {
        color: white;
    }
    .sb-subtitle {
        display: inline-flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .sb-subtitle::before, .sb-subtitle::after {
        content: '';
        display: block;
        height: 2px;
        width: 40px;
        background-color: white;
    }
    .sb-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 25px;
        max-width: 800px;
        color: white;
    }
    .sb-title span {
        color: #8cb6d8;
    }
    .sb-desc {
        font-size: 1.2rem;
        line-height: 1.6;
        color: rgba(255,255,255,0.9);
        max-width: 600px;
    }
    
    /* Decorative waves */
    .sb-waves {
        position: absolute;
        right: -5%;
        top: 0;
        height: 100%;
        width: 50%;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 20px;
        z-index: 1;
        opacity: 0.2;
    }
    .sb-wave {
        width: 30px;
        height: 120%;
        background-color: rgba(255,255,255,0.6);
        border-radius: 50px;
        transform: rotate(5deg);
        /* A simple wave effect using border-radius and multiple elements */
    }
    .sb-wave:nth-child(even) { height: 110%; transform: rotate(-2deg); }
    .sb-wave:nth-child(3) { height: 130%; transform: rotate(3deg); }
    
    .sb-nav-bar {
        background: white;
        border-bottom: 1px solid #eaeaea;
        position: sticky;
        top: 80px;
        z-index: 10;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }
    .sb-nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        padding: 15px 20px;
        gap: 10px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none; /* Firefox */
    }
    .sb-nav-container::-webkit-scrollbar { display: none; /* Chrome */ }
    
    .sb-nav-pill {
        white-space: nowrap;
        padding: 10px 20px;
        border-radius: 30px;
        border: 1px solid #e0e0e0;
        color: #555;
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .sb-nav-pill:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }
    .sb-nav-pill.active {
        background-color: var(--primary-color, #4388cc);
        color: white;
        border-color: var(--primary-color, #4388cc);
    }
    
    .sb-content {
        background-color: #f8f9fa;
        padding: 60px 20px;
        min-height: 50vh;
    }
    .sb-sector-section {
        max-width: 1200px;
        margin: 0 auto 80px auto;
        padding-top: 40px; /* Offset for sticky header */
    }
    .sb-sector-title {
        font-size: 2rem;
        font-weight: 800;
        color: #22456E;
        margin-bottom: 30px;
        border-bottom: 2px solid #eaeaea;
        padding-bottom: 15px;
    }
    
    .sb-brands-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 25px;
    }
    
    .sb-brand-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        transition: transform 0.3s;
        height: auto;
        min-height: 180px;
        position: relative;
    }
    .sb-status-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .sb-status-live {
        background-color: #e0f7e9;
        color: #28a745;
    }
    .sb-status-soon {
        background-color: #fef0d6;
        color: #f59e0b;
    }
    .sb-brand-desc {
        color: #666;
        font-size: 0.9rem;
        margin-top: 10px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .sb-brand-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
    .sb-brand-card img {
        max-width: 100%;
        max-height: 80px;
        object-fit: contain;
    }
    .sb-brand-card h4 {
        margin-top: 15px;
        color: #333;
        font-size: 1.1rem;
        font-weight: 600;
    }
</style>

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

<script>
    function setActiveSector(event, sectorId, element) {
        event.preventDefault();
        
        // Update pills
        document.querySelectorAll('.sb-nav-pill').forEach(pill => pill.classList.remove('active'));
        element.classList.add('active');
        
        // Update content visibility
        document.querySelectorAll('.sb-sector-section').forEach(section => {
            if (sectorId === 'all') {
                section.style.display = 'block';
            } else {
                if (section.id === sectorId) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            }
        });
    }
</script>

@endsection
