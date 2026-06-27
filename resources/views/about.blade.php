@extends('layouts.app')

@section('content')
<style>
/* About Hero Section */
.about-hero {
    position: relative;
    background-image: linear-gradient(to right, rgba(15, 32, 55, 0.9) 0%, rgba(15, 32, 55, 0.7) 60%, rgba(15, 32, 55, 0.3) 100%), url('{{ asset('images/about-bg.jpeg') }}');
    background-size: cover;
    background-position: center;
    padding: 120px 20px 240px 20px;
    color: white;
}
.about-hero-content {
    max-width: 1200px;
    margin: 0 auto;
}
.about-hero-text {
    max-width: 650px;
}
.about-hero-text .subtitle {
    color: #fff;
    font-size: 1rem;
    margin-bottom: 10px;
}
.about-hero-text h1 {
    color: white;
    font-size: 2.5rem;
    font-weight: 400;
    line-height: 1.3;
    margin-bottom: 20px;
}
.about-hero-text p {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.85);
    line-height: 1.6;
    margin-bottom: 30px;
}
.about-btn {
    display: inline-block;
    background: #3b71ca;
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.3s;
}
.about-btn:hover {
    background: #2b569a;
}

/* Overlapping Collage */
.about-collage {
    max-width: 1100px;
    margin: -180px auto 0 auto;
    position: relative;
    z-index: 10;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 20px;
    padding: 0 20px;
}
.collage-img {
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    object-fit: cover;
    width: 32%;
}
.collage-img.left {
    margin-top: 60px;
    height: 380px;
}
.collage-img.center {
    height: 440px;
    z-index: 2;
}
.collage-img.right {
    margin-top: 90px;
    height: 350px;
}

@media (max-width: 768px) {
    .about-hero {
        padding-bottom: 120px;
    }
    .about-collage {
        flex-direction: column;
        align-items: center;
        margin-top: -50px;
    }
    .collage-img {
        width: 90%;
        margin-top: 0 !important;
        margin-bottom: 20px;
        height: auto;
    }
}
</style>

<div class="about-hero">
    <div class="about-hero-content">
        <div class="about-hero-text">
            <div class="subtitle">Welcome to Bayan Group!</div>
            <h1>A legacy of innovation, a future of growth.</h1>
            <p>Founded in 2003, Bayan Group evolved from a specialized service provider into a diversified business solutions group that blends technology, strategy, communication, and education.<br><br>We exist to empower organizations with tools, expertise, and talent that transform potential into performance.</p>
            <a href="{{ route('services.page') }}" class="about-btn">Explore Our Services</a>
        </div>
    </div>
</div>

<div class="about-collage">
    <img src="{{ asset('images/about-img-left.jpeg') }}" class="collage-img left" alt="Business analysis">
    <img src="{{ asset('images/about-img-center.jpeg') }}" class="collage-img center" alt="Team meeting">
    <img src="{{ asset('images/about-img-right.jpeg') }}" class="collage-img right" alt="Professional consultation">
</div>


<div class="section">
    <h2>Our Team</h2>
    <div class="grid">
        @foreach($team as $member)
        <div class="card">
            @if($member->image_path)
                <img src="{{ asset('storage/' . $member->image_path) }}" alt="{{ $member->name }}" style="border-radius: 50%; max-width: 120px;">
            @else
                <div style="width: 120px; height: 120px; background: #ddd; border-radius: 50%; margin: 0 auto 20px auto;"></div>
            @endif
            <h3>{{ $member->name }}</h3>
            <p style="color: var(--primary-color); font-weight: bold;">{{ $member->position }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection