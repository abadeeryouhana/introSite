@extends('layouts.app')
@section('content')

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
        <div class="sb-breadcrumb">HOME / <span>PORTFOLIO</span></div>
        <div class="sb-subtitle">PORTFOLIO</div>
        <h1 class="sb-title">Our work speaks every <span>language of business.</span></h1>
        <p class="sb-desc">A selection of projects across sectors &mdash; from enterprise ERP rollouts to executive academies and market-entry localization.</p>
    </div>
</div>

<div class="sb-nav-bar">
    <div class="sb-nav-container">
        <button class="sb-nav-pill active" data-filter="all" onclick="filterPortfolio(event, 'all', this)">
            All
        </button>
        @foreach($sectors as $sector)
            <button class="sb-nav-pill" data-filter="{{ $sector->id }}" onclick="filterPortfolio(event, '{{ $sector->id }}', this)">
                {{ $sector->name }}
            </button>
        @endforeach
    </div>
</div>

<div class="sb-content">
    @if($caseStudies->count() > 0)
        <div class="portfolio-grid">
            @foreach($caseStudies as $caseStudy)
                <!-- Portfolio Card -->
                <div class="portfolio-card animate-fade-up" data-sector-id="{{ $caseStudy->sector_id ?? 'none' }}" onclick="openModal({{ $caseStudy->id }})">
                    <div class="portfolio-image" style="background-image: url('{{ $caseStudy->image ? asset('storage/' . $caseStudy->image) : '' }}');">
                        <div class="portfolio-blur-overlay"></div>
                        <div style="position: relative; z-index: 2; display: flex; justify-content: space-between; align-items: center; padding: 20px;">
                            @if($caseStudy->sector)
                                <div class="portfolio-sector-pill" style="margin: 0;">{{ $caseStudy->sector->name }}</div>
                            @else
                                <div></div>
                            @endif
                            <div class="portfolio-date-pill">
                                {{ $caseStudy->created_at->format('M d') }}
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <h4>{{ $caseStudy->title }}</h4>
                        <p>{{ $caseStudy->sub_title }}</p>
                    </div>
                </div>

                <!-- Hidden Data for Modal -->
                <div id="cs-data-{{ $caseStudy->id }}" style="display: none;">
                    <div class="data-title">{{ $caseStudy->title }}</div>
                    <div class="data-subtitle">{{ $caseStudy->sub_title }}</div>
                    <div class="data-date">{{ $caseStudy->created_at->format('M d, Y') }}</div>
                    <div class="data-image">{{ $caseStudy->image ? asset('storage/' . $caseStudy->image) : '' }}</div>
                    <div class="data-challenge">{!! nl2br(e($caseStudy->challenge)) !!}</div>
                    <div class="data-solution">{!! nl2br(e($caseStudy->solution)) !!}</div>
                    <div class="data-delivered">{!! nl2br(e($caseStudy->delivered)) !!}</div>
                    <div class="data-tools">{{ $caseStudy->tools }}</div>
                </div>
            @endforeach
        </div>
    @else
        <div style="text-align: center; padding: 50px;">
            <h3 style="color: #555; font-weight: 600;">No case studies available yet.</h3>
        </div>
    @endif
</div>

<!-- Case Study Modal -->
@include('partials.case_study_modal')

@push('scripts')
    <script src="{{ asset('js/portfolio.js') }}"></script>
@endpush

@endsection
