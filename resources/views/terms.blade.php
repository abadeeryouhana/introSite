@extends('layouts.app')

@section('seo_title', 'Terms & Conditions | ' . ($global_settings['site_name'] ?? 'Bayan Group'))
@section('seo_description', 'Terms and conditions governing the use of the Bayan Group website and its digital services.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/legal.css') }}?v={{ filemtime(public_path('css/legal.css')) }}">
@endpush

@section('content')
<!-- Terms & Conditions Hero Section -->
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
        <div class="sb-breadcrumb">HOME / <span>TERMS &AMP; CONDITIONS</span></div>
        <div class="sb-subtitle">TERMS &AMP; CONDITIONS</div>
        <h1 class="sb-title">Terms &amp; Conditions</h1>
    </div>
</div>

<!-- Terms & Conditions Content -->
<section class="legal-content-section">
    <div class="legal-container">
        <div class="legal-last-updated">Last updated: March 2026</div>

        <article class="legal-section">
            <h2>Acceptance of Terms</h2>
            <p>Placeholder terms content. Final terms will be reviewed and issued by Bayan Group's legal team prior to publication.</p>
        </article>

        <article class="legal-section">
            <h2>Use of the Site</h2>
            <p>Placeholder terms content. Final terms will be reviewed and issued by Bayan Group's legal team prior to publication.</p>
        </article>

        <article class="legal-section">
            <h2>Intellectual Property</h2>
            <p>Placeholder terms content. Final terms will be reviewed and issued by Bayan Group's legal team prior to publication.</p>
        </article>

        <article class="legal-section">
            <h2>Disclaimers</h2>
            <p>Placeholder terms content. Final terms will be reviewed and issued by Bayan Group's legal team prior to publication.</p>
        </article>

        <article class="legal-section">
            <h2>Limitation of Liability</h2>
            <p>Placeholder terms content. Final terms will be reviewed and issued by Bayan Group's legal team prior to publication.</p>
        </article>

        <article class="legal-section">
            <h2>Governing Law</h2>
            <p>Placeholder terms content. Final terms will be reviewed and issued by Bayan Group's legal team prior to publication.</p>
        </article>

        <article class="legal-section">
            <h2>Changes</h2>
            <p>Placeholder terms content. Final terms will be reviewed and issued by Bayan Group's legal team prior to publication.</p>
        </article>

        <article class="legal-section">
            <h2>Contact</h2>
            <p>Placeholder terms content. Final terms will be reviewed and issued by Bayan Group's legal team prior to publication.</p>
        </article>
    </div>
</section>
@endsection
