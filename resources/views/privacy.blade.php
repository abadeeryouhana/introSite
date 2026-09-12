@extends('layouts.app')

@section('seo_title', 'Privacy Policy | ' . ($global_settings['site_name'] ?? 'Bayan Group'))
@section('seo_description', 'Privacy policy explaining how Bayan Group collects, protects, and processes personal information.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/legal.css') }}?v={{ filemtime(public_path('css/legal.css')) }}">
@endpush

@section('content')
<!-- Privacy Policy Hero Section -->
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
        <div class="sb-breadcrumb">HOME / <span>PRIVACY POLICY</span></div>
        <div class="sb-subtitle">PRIVACY POLICY</div>
        <h1 class="sb-title">Privacy Policy</h1>
    </div>
</div>

<!-- Privacy Policy Content -->
<section class="legal-content-section">
    <div class="legal-container">
        <div class="legal-last-updated">Last updated: March 2026</div>

        <article class="legal-section">
            <h2>Introduction</h2>
            <p>Placeholder policy content. Full policy language will be provided by legal counsel prior to launch. This document will describe how Bayan Group processes personal data across its offices in Cairo, Muscat, and Florida in compliance with applicable regulations.</p>
        </article>

        <article class="legal-section">
            <h2>Information We Collect</h2>
            <p>Placeholder policy content. Full policy language will be provided by legal counsel prior to launch. This document will describe how Bayan Group processes personal data across its offices in Cairo, Muscat, and Florida in compliance with applicable regulations.</p>
        </article>

        <article class="legal-section">
            <h2>How We Use Information</h2>
            <p>Placeholder policy content. Full policy language will be provided by legal counsel prior to launch. This document will describe how Bayan Group processes personal data across its offices in Cairo, Muscat, and Florida in compliance with applicable regulations.</p>
        </article>

        <article class="legal-section">
            <h2>Data Sharing</h2>
            <p>Placeholder policy content. Full policy language will be provided by legal counsel prior to launch. This document will describe how Bayan Group processes personal data across its offices in Cairo, Muscat, and Florida in compliance with applicable regulations.</p>
        </article>

        <article class="legal-section">
            <h2>Data Retention</h2>
            <p>Placeholder policy content. Full policy language will be provided by legal counsel prior to launch. This document will describe how Bayan Group processes personal data across its offices in Cairo, Muscat, and Florida in compliance with applicable regulations.</p>
        </article>

        <article class="legal-section">
            <h2>Your Rights</h2>
            <p>Placeholder policy content. Full policy language will be provided by legal counsel prior to launch. This document will describe how Bayan Group processes personal data across its offices in Cairo, Muscat, and Florida in compliance with applicable regulations.</p>
        </article>

        <article class="legal-section">
            <h2>Cookies</h2>
            <p>Placeholder policy content. Full policy language will be provided by legal counsel prior to launch. This document will describe how Bayan Group processes personal data across its offices in Cairo, Muscat, and Florida in compliance with applicable regulations.</p>
        </article>

        <article class="legal-section">
            <h2>Contact</h2>
            <p>Placeholder policy content. Full policy language will be provided by legal counsel prior to launch. This document will describe how Bayan Group processes personal data across its offices in Cairo, Muscat, and Florida in compliance with applicable regulations.</p>
        </article>
    </div>
</section>
@endsection
