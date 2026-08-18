@extends('layouts.app')

@section('title', 'Careers')

@section('content')
<!-- Careers Hero Section -->
<section class="careers-hero">
    <div class="careers-hero-content">
        <div class="breadcrumbs">
            <a href="{{ route('home') }}">HOME</a> / <span class="current">CAREERS</span>
        </div>
        <div class="section-label">
            CAREERS
        </div>
        <h1>Build your future <span class="highlight">with Bayan.</span></h1>
        <p>We hire specialists who want to do their best work inside an integrated group &mdash;<br>where sectors compound, and careers do too.</p>
    </div>
    <div class="hero-waves"></div>
</section>

<!-- Values Section -->
<section class="careers-values section">
    <div class="container">
        <div class="grid careers-grid">
            <div class="value-card">
                <h3>Global Environment</h3>
                <p>Work with colleagues across Cairo, Muscat, Florida, and remote hubs.</p>
            </div>
            <div class="value-card">
                <h3>Real Growth</h3>
                <p>Structured progression, sponsored certifications, and cross-sector mobility.</p>
            </div>
            <div class="value-card">
                <h3>Meaningful Impact</h3>
                <p>Projects that shape enterprises, governments, and industries.</p>
            </div>
            <div class="value-card">
                <h3>Diverse & United</h3>
                <p>Experts from 69 nationalities. One team. One standard.</p>
            </div>
        </div>
    </div>
</section>
@endsection
