@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}?v={{ filemtime(public_path('css/about.css')) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
        <div class="sb-breadcrumb">HOME / <span>ABOUT US</span></div>
        <div class="sb-subtitle">ABOUT US</div>
        <h1 class="sb-title">A legacy of innovation, a future of <span>growth.</span></h1>
        <p class="sb-desc">Founded in 2003, Bayan Group evolved from a specialized service provider into a diversified business solutions group that blends technology, strategy, communication, and education.</p>
    </div>
</div>

<!-- OUR STORY -->
<div class="our-story-section">
    <div class="our-story-left animate-fade-up">
        <div class="our-story-subtitle">OUR STORY</div>
        <h2 class="our-story-title">From a Cairo studio to a global group.</h2>
        <p class="our-story-text">Bayan started in 2003 as a translation studio in Cairo. Over two decades, we've grown into an integrated solutions group operating across five sectors &mdash; because our clients kept asking us to solve the problem after the problem after the problem.</p>
        
        <div class="our-story-highlights">
            <h4>Highlights</h4>
            <ul>
                <li>HQ Cairo &mdash; offices in Muscat &amp; Florida</li>
                <li>40+ countries served</li>
                <li>70+ industries covered</li>
                <li>6+ brands across 5 sectors</li>
            </ul>
        </div>
    </div>
    <div class="our-story-right animate-fade-up" style="animation-delay: 0.2s;">
        <img src="{{ asset('images/about-img-left.jpeg') }}" class="our-story-img" alt="Our Story">
    </div>
</div>

<!-- CHAIRMAN'S WORD -->
<div class="chairman-section">
    <div class="chairman-left animate-fade-up">
        <img src="{{ asset('images/fadel.png') }}" class="chairman-img" alt="Chairman">
    </div>
    <div class="chairman-right animate-fade-up" style="animation-delay: 0.2s;">
        <div class="chairman-subtitle">CHAIRMAN'S WORD</div>
        <div class="chairman-quote">"Building a legacy of excellence through innovation and dedicated partnership."</div>
        <p class="chairman-text">Since our inception, Bayan Group has been driven by a singular vision: to empower organizations with the tools, strategies, and talent they need to thrive in a dynamic world. Our journey from a local studio to a global group is a testament to the trust our clients place in us.</p>
        <div class="chairman-name"> Dr. Muhammad Fadel</div>
        <div class="chairman-title">Chairman & Managing Director</div>
    </div>
</div>


<!-- OUR VISION & MISSION -->
<div class="vm-section">
    <div class="vm-card animate-fade-up">
        <div class="vm-subtitle">OUR VISION</div>
        <h3 class="vm-title">Vision</h3>
        <p class="vm-text">To be the region's most trusted hub for integrated business & technology solutions.</p>
    </div>
    <div class="vm-card animate-fade-up" style="animation-delay: 0.2s;">
        <div class="vm-subtitle">OUR MISSION</div>
        <h3 class="vm-title">Mission</h3>
        <p class="vm-text">Connect strategy, systems, and people to create measurable, compounding impact for the organizations we serve.</p>
    </div>
</div>

<!-- WHAT DRIVES US -->
<div class="values-section">
    <div class="values-header animate-fade-up">
        <div class="values-subtitle">WHAT DRIVES US</div>
        <h2 class="values-title">Our Core Values</h2>
    </div>
    
    <div class="values-grid">
        <div class="value-card animate-fade-up">
            <div class="value-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <h4>Integrity</h4>
            <p>We do what's right, even when no one is watching.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.1s;">
            <div class="value-icon"><i class="fa-regular fa-lightbulb"></i></div>
            <h4>Innovation</h4>
            <p>We turn complexity into smart, scalable solutions.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.2s;">
            <div class="value-icon"><i class="fa-solid fa-handshake-angle"></i></div>
            <h4>Partnership</h4>
            <p>We win only when our clients win.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.3s;">
            <div class="value-icon"><i class="fa-solid fa-bullseye"></i></div>
            <h4>Excellence</h4>
            <p>ISO-certified standards in everything we deliver.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.4s;">
            <div class="value-icon"><i class="fa-solid fa-globe"></i></div>
            <h4>Diversity</h4>
            <p>69 nationalities, one shared standard of quality.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.5s;">
            <div class="value-icon"><i class="fa-solid fa-arrow-trend-up"></i></div>
            <h4>Impact</h4>
            <p>We measure success by the outcomes we create.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.6s;">
            <div class="value-icon"><i class="fa-solid fa-bolt"></i></div>
            <h4>Agility</h4>
            <p>We move fast to embrace change and new opportunities.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.7s;">
            <div class="value-icon"><i class="fa-solid fa-clipboard-check"></i></div>
            <h4>Accountability</h4>
            <p>We take full ownership of our actions and outcomes.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.8s;">
            <div class="value-icon"><i class="fa-regular fa-heart"></i></div>
            <h4>Customer Focus</h4>
            <p>Putting the needs of our clients at the center of all we do.</p>
        </div>
        <div class="value-card animate-fade-up" style="animation-delay: 0.9s;">
            <div class="value-icon"><i class="fa-solid fa-book-open-reader"></i></div>
            <h4>Continuous Learning</h4>
            <p>We never stop growing, exploring, and adapting to the future.</p>
        </div>
    </div>
</div>

<!-- BY THE NUMBERS -->
<div class="numbers-section">
    <div class="numbers-container">
        <div class="numbers-header animate-fade-up">
            <div class="numbers-subtitle">BY THE NUMBERS</div>
            <h2 class="numbers-title">Excellence in numbers.</h2>
        </div>
        
        <div class="numbers-grid">
            <div class="number-item animate-fade-up">
                <div class="number-value animate-number">23+</div>
                <div class="number-label">Years</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.1s;">
                <div class="number-value animate-number">200,000+</div>
                <div class="number-label">Projects</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.2s;">
                <div class="number-value animate-number">70+</div>
                <div class="number-label">Industries</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.3s;">
                <div class="number-value animate-number">2,300+</div>
                <div class="number-label">Clients</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.4s;">
                <div class="number-value animate-number">40+</div>
                <div class="number-label">Countries</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.1s;">
                <div class="number-value animate-number">98%</div>
                <div class="number-label">Satisfaction</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.2s;">
                <div class="number-value animate-number">900+</div>
                <div class="number-label">Staff & Vendors</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.3s;">
                <div class="number-value animate-number">480+</div>
                <div class="number-label">Certified Experts</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.4s;">
                <div class="number-value animate-number">100+</div>
                <div class="number-label">Scholars</div>
            </div>
            <div class="number-item animate-fade-up" style="animation-delay: 0.5s;">
                <div class="number-value animate-number">10+</div>
                <div class="number-label">CSR Projects</div>
            </div>
        </div>
    </div>
</div>

<!-- How we work Section  -->
<div class="section how-we-work-section" style="background-color: #f4f7fb;  position: relative; padding: 80px 0;">
    
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px;">
        
        <!-- Header Row -->
        <div style="text-align: center; margin-bottom: 50px;">
            <div style="display: inline-flex; align-items: center; justify-content: center; gap: 15px;">
                <div style="height: 2px; width: 40px; background-color: var(--primary-color, #3b71ca);"></div>
                <h5 style="color: var(--primary-color, #3b71ca); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">How We Work</h5>
                <div style="height: 2px; width: 40px; background-color: var(--primary-color, #3b71ca);"></div>
            </div>
            <h2 style="font-size: 2.8rem; font-weight: 800; color: #22456E; line-height: 1.25; margin-top: 15px;">A Repeatable Operating Model</h2>
        </div>

        <!-- Cards Row -->
        <div style="display: flex; gap: 30px; flex-wrap: wrap; justify-content: center; max-width: 1200px; margin: 0 auto;">
            
            <!-- Card 1: Assess -->
            <div class="work-card animate-fade-up">
                <div class="work-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin-bottom: 15px;">Assess</h3>
                <!-- <p style="color: #666; font-size: 1.05rem; line-height: 1.6; margin: 0;">We analyze your current state, understand your needs, and define a clear roadmap for success.</p> -->
            </div>

            <!-- Card 2: Build -->
            <div class="work-card animate-fade-up" style="animation-delay: 0.1s;">
                <div class="work-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin-bottom: 15px;">Build</h3>
                <!-- <p style="color: #666; font-size: 1.05rem; line-height: 1.6; margin: 0;">Our experts design and develop robust solutions tailored precisely to your strategic objectives.</p> -->
            </div>

            <!-- Card 3: Deliver -->
            <div class="work-card animate-fade-up" style="animation-delay: 0.2s;">
                <div class="work-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin-bottom: 15px;">Deliver</h3>
                <!-- <p style="color: #666; font-size: 1.05rem; line-height: 1.6; margin: 0;">We deploy the solution with precision, ensuring a smooth transition and immediate value realization.</p> -->
            </div>

            <!-- Card 4: Support -->
            <div class="work-card animate-fade-up" style="animation-delay: 0.3s;">
                <div class="work-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line></svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin-bottom: 15px;">Support</h3>
                <!-- <p style="color: #666; font-size: 1.05rem; line-height: 1.6; margin: 0;">We provide ongoing maintenance and continuous improvements to keep your business running flawlessly.</p> -->
            </div>

        </div>
    </div>
</div>

<!-- Partners Section -->
<div class="about-partners-section">
    <div class="about-partners-header animate-fade-up">
        <div class="about-partners-subtitle">CERTIFIED PARTNERS</div>
        <h2 class="about-partners-title">Powered by Zoho & Odoo.</h2>
    </div>

    <div class="partner-row animate-fade-up">
        <div class="partner-logo-wrapper">
            <img src="{{ asset('images/zoho-logo.svg') }}" alt="Zoho">
        </div>
        <div class="partner-info">
            <div class="partner-tag">CERTIFIED PARTNER</div>
            <h3 class="partner-name">Zoho</h3>
            <p class="partner-desc">As a certified partner, Bayan Group transforms Zoho's unified suite into a customized, high-performance operating system that automates your workflows and delivers instant, data-driven clarity.</p>
        </div>
    </div>

    <div class="partner-row animate-fade-up" style="animation-delay: 0.1s;">
        <div class="partner-logo-wrapper">
            <img src="{{ asset('images/odoo-logo.webp') }}" alt="Odoo">
        </div>
        <div class="partner-info">
            <div class="partner-tag">CERTIFIED PARTNER</div>
            <h3 class="partner-name">Odoo</h3>
            <p class="partner-desc">Through our partnership, we leverage Odoo's open architecture to engineer bespoke, enterprise-grade ERP solutions that mirror your business strategy and evolve alongside your ambition.</p>
        </div>
    </div>

        <div class="partner-row animate-fade-up" style="animation-delay: 0.1s;">
        <div class="partner-logo-wrapper">
            <img src="{{ asset('images/odoo-logo.webp') }}" alt="Odoo">
        </div>
        <div class="partner-info">
            <div class="partner-tag">CERTIFIED PARTNER</div>
            <h3 class="partner-name">ISO 17100</h3>
            <p class="partner-desc">Through our partnership, we leverage Odoo's open architecture to engineer bespoke, enterprise-grade ERP solutions that mirror your business strategy and evolve alongside your ambition.</p>
        </div>
    </div>

        <div class="partner-row animate-fade-up" style="animation-delay: 0.1s;">
        <div class="partner-logo-wrapper">
            <img src="{{ asset('images/odoo-logo.webp') }}" alt="Odoo">
        </div>
        <div class="partner-info">
            <div class="partner-tag">CERTIFIED PARTNER</div>
            <h3 class="partner-name">ISO 9001</h3>
            <p class="partner-desc">Through our partnership, we leverage Odoo's open architecture to engineer bespoke, enterprise-grade ERP solutions that mirror your business strategy and evolve alongside your ambition.</p>
        </div>
    </div>
</div>


<!-- LEADERSHIP TEAM -->
<div class="leadership-section">
    <div class="leadership-container">
        <div class="leadership-header animate-fade-up">
            <div class="leadership-subtitle">LEADERSHIP</div>
            <h2 class="leadership-title">The people behind the group.</h2>
        </div>
        
        <div class="leadership-grid">
            @foreach($team as $member)
            <div class="leadership-card animate-fade-up" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                <div class="leadership-avatar">
                    @if($member->image_path)
                        <img src="{{ asset('storage/' . $member->image_path) }}" alt="{{ $member->name }}">
                    @else
                        @php 
                            $initials = collect(explode(' ', $member->name))
                                ->map(function($segment) { return strtoupper(substr($segment, 0, 1)); })
                                ->take(2)
                                ->join(''); 
                        @endphp
                        {{ $initials }}
                    @endif
                </div>
                <h3 class="leadership-name">{{ $member->name }}</h3>
                <p class="leadership-position">{{ $member->position }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>


<!-- OUR CLIENTS -->
<div class="about-clients-section">
    <div class="about-clients-container">
        <div class="about-clients-header animate-fade-up">
            <div class="about-clients-subtitle">OUR CLIENTS</div>
            <h2 class="about-clients-title">Trusted by organizations worldwide.</h2>
        </div>
        
        <div class="about-clients-grid">
            @foreach($clients as $client)
            <a href="{{ $client->url ?? '#' }}" class="about-client-card animate-fade-up" style="animation-delay: {{ ($loop->index % 10) * 0.1 }}s;" {!! $client->url ? 'target="_blank" rel="noopener noreferrer"' : '' !!}>
                @if($client->logo_path)
                    <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}">
                @else
                    <span class="about-client-name">{{ $client->name }}</span>
                @endif
            </a>
            @endforeach
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="section testimonials-section" style="background-color: white; padding: 80px 0; font-family: 'Inter', sans-serif;">
    <div style="width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 20px; margin-bottom: 50px; text-align: left;">
        <div style="display: inline-block; border-top: 1px solid #3b71ca; border-bottom: 1px solid #3b71ca; padding: 5px 0; margin-bottom: 25px;">
            <h5 style="color: #3b71ca; font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem;">IN THEIR WORDS</h5>
        </div>
        <h2 style="font-size: 2.8rem; font-weight: 800; color: #22456E; margin-bottom: 20px; letter-spacing: -0.5px;">Some Of Our Clients' Testimonials</h2>
        <p style="color: #66768f; font-size: 1.15rem; line-height: 1.6;">Why organizations across 40+ countries keep choosing Bayan Group</p>
    </div>

    <!-- Swiper for Testimonials -->
    <div class="swiper testimonials-swiper" style="width: 100%; max-width: 1200px; margin: 0 auto; padding: 20px 20px 60px;">
        <div class="swiper-wrapper">
            @foreach($testimonials as $testimonial)
            <div class="swiper-slide">
                <div class="testimonial-card" style="background: #f8f9fa; border-radius: 16px; padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: left; position: relative;">
                    <div style="color: #3b71ca; margin-bottom: 20px;">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"/></svg>
                    </div>
                    @if($testimonial->title)
                        <h4 style="font-size: 1.25rem; font-weight: 700; color: #22456E; margin-bottom: 15px;">{{ $testimonial->title }}</h4>
                    @endif
                    <p style="color: #555; font-size: 1.1rem; line-height: 1.8; margin-bottom: 30px; font-style: italic;">"{{ $testimonial->description }}"</p>
                    <div style="display: flex; align-items: center; gap: 15px;">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Testimonial Image" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                        @endif
                        <div>
                            <h5 style="margin: 0; font-size: 1.1rem; font-weight: 700; color: #22456E;">{{ $testimonial->client->name ?? 'Client' }}</h5>
                            @if(isset($testimonial->client->url))
                                <a href="{{ $testimonial->client->url }}" target="_blank" style="color: #3b71ca; font-size: 0.9rem; text-decoration: none;">Visit Website</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination & Navigation -->
        <div class="swiper-pagination testimonials-pagination"></div>
        <div class="swiper-button-next testimonials-button-next" style="color: #3b71ca; transform: scale(0.7); right: 10px;"></div>
        <div class="swiper-button-prev testimonials-button-prev" style="color: #3b71ca; transform: scale(0.7); left: 10px;"></div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(document.querySelector('.testimonials-swiper')) {
                new Swiper('.testimonials-swiper', {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.testimonials-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.testimonials-button-next',
                        prevEl: '.testimonials-button-prev',
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        }
                    }
                });
            }
        });
    </script>
@endpush
@endsection