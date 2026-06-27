@extends('layouts.app')

@section('content')
<style>
.services-hero {
    position: relative;
    background-image: linear-gradient(rgba(10, 25, 47, 0.6), rgba(10, 25, 47, 0.7)), url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop');
    background-size: cover;
    background-position: center;
    padding: 140px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    min-height: 400px;
}
.services-hero h1 {
    color: white;
    font-size: 2.8rem;
    font-weight: 400;
    line-height: 1.4;
    max-width: 900px;
    margin: 0 auto 20px auto;
}
.services-hero .down-arrow {
    color: white;
    font-size: 28px;
    margin-top: 20px;
    font-weight: 300;
}
.intro-section {
    position: relative;
    background-color: #ffffff;
    padding: 60px 20px 100px 20px;
    text-align: left;
    overflow: hidden;
}
.intro-section::before {
    content: "";
    position: absolute;
    bottom: 0;
    right: 0;
    width: 60%;
    height: 100%;
    background-color: #eaf1fa;
    border-top-left-radius: 100%;
    z-index: 0;
    opacity: 0.6;
}
.intro-container {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}
.intro-section h2 {
    color: #4b7bb3;
    font-size: 2.2rem;
    font-weight: 300;
    margin-bottom: 25px;
}
.intro-section p {
    color: #444;
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 15px;
    max-width: 900px;
}
.services-frame {
    background-image: url('{{ asset('images/services-bg.jpeg') }}');
    background-size: cover;
    background-position: center;
    border-top-left-radius: 40px;
    border-top-right-radius: 40px;
    padding: 60px 40px 80px 40px;
    margin: -60px auto 0 auto;
    max-width: 1300px;
    position: relative;
    z-index: 2;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}
.service-card {
    background: white;
    border-radius: 12px;
    padding: 40px 20px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.service-card:hover {
    transform: translateY(-10px);
}
.service-icon {
    font-size: 3rem;
    color: #3b71ca;
    margin-bottom: 25px;
}
.service-card h3 {
    font-size: 1.2rem;
    color: #222;
    margin-bottom: 15px;
    font-weight: 700;
}
.service-card p {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.6;
}
.cta-section {
    background: linear-gradient(135deg, #4b7bb3 0%, #3a5c9a 100%);
    position: relative;
    padding: 80px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    margin-top: 60px;
}
.cta-section::before {
    content: "";
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.05" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
    background-size: cover;
    background-position: bottom;
    z-index: 0;
}
.cta-container {
    max-width: 1200px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    z-index: 1;
    gap: 40px;
}
.cta-content {
    flex: 1;
    max-width: 600px;
}
.cta-content h2 {
    color: white;
    font-size: 2.5rem;
    font-weight: 400;
    margin-bottom: 20px;
    line-height: 1.2;
}
.cta-content p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 30px;
}
.cta-content .btn-cta {
    background: white;
    color: #4b7bb3;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.cta-content .btn-cta:hover {
    background: #f0f0f0;
    transform: translateY(-2px);
}
.cta-image {
    flex: 1;
    position: relative;
    display: flex;
    justify-content: flex-end;
}
.cta-image-circle {
    width: 300px;
    height: 300px;
    background-color: #ff8a4c;
    border-radius: 50%;
    position: absolute;
    right: 50px;
    top: 50px;
    z-index: 0;
}
.cta-image img {
    position: relative;
    z-index: 1;
    max-height: 450px;
    object-fit: contain;
}
@media (max-width: 768px) {
    .cta-container {
        flex-direction: column;
        text-align: center;
    }
    .cta-image {
        justify-content: center;
        margin-top: 40px;
    }
    .cta-image-circle {
        right: auto;
    }
}
</style>

<div class="services-hero">
    <h1>Empowering Enterprises Through Strategy,<br>Technology & Insight.</h1>
    <div class="down-arrow">↓</div>
</div>

<div class="intro-section">
    <div class="intro-container">
        <h2>Smart Business Solutions for Modern Enterprises</h2>
        <p>Bayan Group delivers end-to-end business, technology, and training solutions designed to help organizations grow, perform, and transform.</p>
        <p>From ERP systems and AI tools to strategic consulting and corporate training, we combine innovation, expertise, and human insight to drive measurable impact.</p>
        
        <ul style="list-style: none; padding: 0; margin: 30px 0 0 0;">
            <li style="margin-bottom: 12px; color: #444; font-size: 1.1rem; display: flex; align-items: center; gap: 12px;">
                <i class="fa-solid fa-check" style="color: #3b71ca; font-size: 1.2rem;"></i> Comprehensive Solutions
            </li>
            <li style="margin-bottom: 12px; color: #444; font-size: 1.1rem; display: flex; align-items: center; gap: 12px;">
                <i class="fa-solid fa-check" style="color: #3b71ca; font-size: 1.2rem;"></i> Customized Approach
            </li>
            <li style="margin-bottom: 12px; color: #444; font-size: 1.1rem; display: flex; align-items: center; gap: 12px;">
                <i class="fa-solid fa-check" style="color: #3b71ca; font-size: 1.2rem;"></i> Expert Guidance
            </li>
        </ul>
    </div>
</div>

<div class="services-frame">
    <div class="services-grid">
        @foreach($services as $service)
        <div class="service-card">
            @if($service->icon_path)
                <img src="{{ asset('storage/' . $service->icon_path) }}" alt="{{ $service->title }}" style="max-width: 60px; margin-bottom: 25px;">
            @else
                <div class="service-icon"><i class="fa-solid fa-cogs"></i></div>
            @endif
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->description }}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <h2>Let's build something exceptional together.</h2>
            <p>Share your goals, and our experts will design a solution tailored to your business model, market, and timeline, turning your vision into measurable, lasting results.</p>
            <a href="{{ route('contact') }}" class="btn-cta">Request a Consultation</a>
        </div>
        <div class="cta-image">
            <div class="cta-image-circle"></div>
            <!-- Decorative stars to match the image -->
            <svg style="position: absolute; left: 40px; bottom: 80px; width: 30px; height: 30px; stroke: #ff8a4c; fill: none; stroke-width: 1.5; z-index: 1;" viewBox="0 0 24 24">
                <path d="M12 2 L14.5 9.5 L22 12 L14.5 14.5 L12 22 L9.5 14.5 L2 12 L9.5 9.5 Z"/>
            </svg>
            <svg style="position: absolute; right: 0; top: 100px; width: 40px; height: 40px; stroke: #ff8a4c; fill: none; stroke-width: 1.5; z-index: 1;" viewBox="0 0 24 24">
                <path d="M12 2 L14.5 9.5 L22 12 L14.5 14.5 L12 22 L9.5 14.5 L2 12 L9.5 9.5 Z"/>
            </svg>
            <!-- <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600&auto=format&fit=crop" style="border-radius: 10px; max-height: 400px; object-fit: cover;" alt="Consultation"> -->
        </div>
    </div>
</div>
@endsection