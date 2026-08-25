@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ filemtime(public_path('css/home.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}?v={{ filemtime(public_path('css/blog.css')) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

<div class="hero-modern">
    <div class="hero-modern-container">
        <div class="hero-content">
            <h4>Bayan Group</h4>
            <h1>Innovating Business Through People, Technology & Insight</h1>
            <p>We empower organizations with smart solutions across communication, technology, education, and digital transformation.</p>
            <a href="#brands" class="btn">Explore Our Brands</a>
        </div>
        <div class="hero-graphic">
            <div class="hero-circle">
                @if(isset($global_settings['site_logo']))
                    <img src="{{ asset('storage/' . $global_settings['site_logo']) }}" alt="Bayan Group Logo">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Statistics Numbers Section -->
<div class="section achievements-section" style="background-color: transparent; text-align: center; margin-top: -170px; position: relative; z-index: 10;">
    <div class="achievements-container" style="background: white; border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); display: flex; justify-content: center; align-items: center; width: 100%; max-width: 1100px; margin: 0 auto; padding: 40px 0;">
        
        <!-- Stat 1 -->
        <div class="achievement-item animate-fade-up delay-100" style="text-align: center; flex: 1; padding: 0 10px;">
            <h3 style="font-size: 2.5rem; font-weight: 800; color: #22456E; margin: 0 0 8px 0;" class="animate-number">23+</h3>
            <p style="color: #888; font-size: 0.9rem; margin: 0; font-weight: 600;">Years of Growth</p>
        </div>

        <div style="width: 1px; height: 70px; background-color: #eaeaea;"></div>

        <!-- Stat 2 -->
        <div class="achievement-item animate-fade-up delay-200" style="text-align: center; flex: 1; padding: 0 10px;">
            <h3 style="font-size: 2.5rem; font-weight: 800; color: #22456E; margin: 0 0 8px 0;" class="animate-number">2,300+</h3>
            <p style="color: #888; font-size: 0.9rem; margin: 0; font-weight: 600;">Clients Served</p>
        </div>

        <div style="width: 1px; height: 70px; background-color: #eaeaea;"></div>

        <!-- Stat 3 -->
        <div class="achievement-item animate-fade-up delay-300" style="text-align: center; flex: 1; padding: 0 10px;">
            <h3 style="font-size: 2.5rem; font-weight: 800; color: #22456E; margin: 0 0 8px 0;" class="animate-number">200,000+</h3>
            <p style="color: #888; font-size: 0.9rem; margin: 0; font-weight: 600;">Projects Completed</p>
        </div>

        <div style="width: 1px; height: 70px; background-color: #eaeaea;"></div>

        <!-- Stat 4 -->
        <div class="achievement-item animate-fade-up delay-400" style="text-align: center; flex: 1; padding: 0 10px;">
            <h3 style="font-size: 2.5rem; font-weight: 800; color: #22456E; margin: 0 0 8px 0;" class="animate-number">40+</h3>
            <p style="color: #888; font-size: 0.9rem; margin: 0; font-weight: 600;">Countries Reached</p>
        </div>

        <div style="width: 1px; height: 70px; background-color: #eaeaea;"></div>

        <!-- Stat 5 -->
        <div class="achievement-item animate-fade-up delay-500" style="text-align: center; flex: 1; padding: 0 10px;">
            <h3 style="font-size: 2.5rem; font-weight: 800; color: #22456E; margin: 0 0 8px 0;" class="animate-number">900+</h3>
            <p style="color: #888; font-size: 0.9rem; margin: 0; font-weight: 600;">Experts & Vendors</p>
        </div>

    </div>
</div>


<!-- Who we are Section  -->
<div class="section who-we-are-section" style="background-color: white; padding: 50px 0; position: relative; overflow: hidden;">
    <!-- Background subtle decorations -->
    <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(59,113,202,0.05) 0%, rgba(255,255,255,0) 70%); border-radius: 50%; pointer-events: none;"></div>
    <div style="position: absolute; bottom: -50px; left: -50px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(59,113,202,0.05) 0%, rgba(255,255,255,0) 70%); border-radius: 50%; pointer-events: none;"></div>
    
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px; display: flex; align-items: center; justify-content: space-between; gap: 60px; flex-wrap: wrap;">
        
        <div style="flex: 1; min-width: 300px; padding-right: 20px;">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                <div style="height: 3px; width: 40px; background-color: var(--primary-color, #3b71ca); border-radius: 2px;"></div>
                <h5 style="color: var(--primary-color, #3b71ca); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 1.5px; font-size: 0.95rem;">Who We Are</h5>
            </div>
            
            <h3 style="font-size: 2.8rem; font-weight: 800; color: #22456E; margin-bottom: 30px; line-height: 1.25;">An Integrated Solution Engine</h3>
            
            <p style="color: #555; font-size: 1.1rem; line-height: 1.8; margin-bottom: 20px;">
                We are a dynamic and forward-thinking organization dedicated to empowering businesses through cutting-edge technology and innovative strategies.
            </p>


        </div>

        <div style="flex: 1; min-width: 300px; display: flex; justify-content: center; position: relative;">
            <div style="position: relative; z-index: 2; width: 300px;">
                <img src="{{ asset('images/who_we_are.png') }}" alt="Who We Are" style="width: 400px; height: 300px; border-radius: 20px; box-shadow: 0 25px 50px rgba(0,0,0,0.15); object-fit: cover;">
            </div>
            <!-- Decorative Elements behind image -->
            <!-- <div style="position: absolute; width: 300px; height: 300px; border: 3px solid var(--primary-color, #3b71ca); border-radius: 20px; top: 20px; right: -20px; z-index: 1; opacity: 0.15;"></div> -->
            <!-- <div style="position: absolute; width: 100px; height: 100px; background-color: var(--primary-color, #3b71ca); border-radius: 50%; bottom: -30px; left: -30px; z-index: 3; opacity: 0.1;"></div> -->
        </div>

    </div>
</div>

<!-- How we work Section  -->
<div class="section how-we-work-section" style="background-color: #f4f7fb;  position: relative;">
    
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px;">
        
        <!-- Header Row -->
        <div style="text-align: center; ">
            <div style="display: inline-flex; align-items: center; justify-content: center; gap: 15px;">
                <div style="height: 2px; width: 40px; background-color: var(--primary-color, #3b71ca);"></div>
                <h5 style="color: var(--primary-color, #3b71ca); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">How We Work</h5>
                <div style="height: 2px; width: 40px; background-color: var(--primary-color, #3b71ca);"></div>
            </div>
            <h2 style="font-size: 1.8rem; font-weight: 800; color: #22456E; line-height: 1.25;">A Repeatable Operating Model</h2>
        </div>

        <!-- Cards Row -->
        <div style="display: flex; gap: 30px; flex-wrap: wrap; justify-content: center;">
            
            <!-- Card 1: Assess -->
            <div class="work-card">
                <div class="work-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin-bottom: 15px;">Assess</h3>
                <!-- <p style="color: #666; font-size: 1.05rem; line-height: 1.6; margin: 0;">We analyze your current state, understand your needs, and define a clear roadmap for success.</p> -->
            </div>

            <!-- Card 2: Build -->
            <div class="work-card">
                <div class="work-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin-bottom: 15px;">Build</h3>
                <!-- <p style="color: #666; font-size: 1.05rem; line-height: 1.6; margin: 0;">Our experts design and develop robust solutions tailored precisely to your strategic objectives.</p> -->
            </div>

            <!-- Card 3: Deliver -->
            <div class="work-card">
                <div class="work-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin-bottom: 15px;">Deliver</h3>
                <!-- <p style="color: #666; font-size: 1.05rem; line-height: 1.6; margin: 0;">We deploy the solution with precision, ensuring a smooth transition and immediate value realization.</p> -->
            </div>

            <!-- Card 4: Support -->
            <div class="work-card">
                <div class="work-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line></svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin-bottom: 15px;">Support</h3>
                <!-- <p style="color: #666; font-size: 1.05rem; line-height: 1.6; margin: 0;">We provide ongoing maintenance and continuous improvements to keep your business running flawlessly.</p> -->
            </div>

        </div>
    </div>
</div>

<!-- Our Brands Section -->
<div id="brands" class="section group-structure-section" style="background-color: #f8f9fa; text-align: left; padding: 60px 0; overflow: hidden; position: relative;">
    <div style="max-width: 1200px; margin: 0 auto; width: 100%; padding: 0 20px;">
    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
        <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
        <h5 style="color: var(--primary-color, #22456E); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">The Group Structure</h5>
    </div>
    <h2 style="font-weight: 800; color: #22456E; margin-bottom: 15px; font-size: 2.5rem; text-align: left;">Five Sectors. A Family of Brands.</h2>
    <p style="color: #555; font-size: 1.1rem; max-width: 600px; margin: 0 0 50px 0; text-align: left;">One group operating specialized brands across the disciplines enterprises rely on most.</p>
    
    <!-- Swiper -->
    <div class="swiper group-swiper" style="width: 100%; margin: 0 auto; padding: 0 40px;">
        <div class="swiper-wrapper" style="align-items: stretch;">
            @foreach($sectors as $sector)
            <div class="swiper-slide" style="height: auto; width: 100%;">
                <div class="sector-card" style="background: white; border-radius: 16px; padding: 25px 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); height: 100%; display: flex; flex-direction: column; width: 100%; box-sizing: border-box;">
                    <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--primary-color, #3b71ca); margin-bottom: 20px; text-transform: uppercase; word-break: break-word; overflow-wrap: break-word; line-height: 1.3;">{{ $sector->name }}</h3>
                    
                    <div class="brands-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(70px, 1fr)); gap: 10px; flex-grow: 1; align-content: start;">
                        @foreach($sector->brands as $brand)
                            <div style="display: flex; justify-content: center; align-items: center; padding: 8px; background: #fdfdfd; border: 1px solid #eee; border-radius: 8px; width: 100%; box-sizing: border-box;">
                                @if($brand->logo_path)
                                    <img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}" style="max-width: 100%; max-height: 45px; object-fit: contain;">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($brand->name) }}&color=3D81C3&background=EBF4FF&bold=true&font-size=0.33&size=128" alt="{{ $brand->name }}" style="max-width: 100%; max-height: 45px; object-fit: contain; border-radius: 4px;">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Add Navigation -->
        <div class="swiper-button-next group-button-next" style="color: #666; transform: scale(0.6); right: 0;"></div>
        <div class="swiper-button-prev group-button-prev" style="color: #666; transform: scale(0.6); left: 0;"></div>
    </div>

    <div style="display: flex; justify-content: center; align-items: center; gap: 8px; margin-top: 40px;">
        <!-- Play/pause icon (fake for visuals) -->
        <div style="color: #b0b0b0; display: flex; align-items: center; cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination group-pagination" style="position: static; width: auto; display: flex; align-items: center; gap: 5px;"></div>
    </div>
    </div>
</div>

<!-- What We Do Section -->
<div class="section services-section" style="background-color: white; padding: 80px 0; text-align: left;">
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
        <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
        <h5 style="color: var(--primary-color, #22456E); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">What We Do</h5>
    </div>

        <h2 style="font-weight: 800; color: #22456E; margin-bottom: 15px; font-size: 2.5rem; text-align: left;">Smart Business Solutions</h2>
    <p style="color: #555; font-size: 1.1rem; max-width: 600px; margin: 0 0 50px 0; text-align: left;">Ten services. One integrated engine.</p>

        <div style="height: 1px; width: 100%; background-color: #eee; margin-bottom: 20px; max-width: 250px;"></div>
        
        <div class="services-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px;">
            @foreach($services as $service)
            <div class="service-card" style="background: white; border: 1px solid #eaeaea; border-radius: 12px; padding: 25px 20px; display: flex; flex-direction: column; transition: transform 0.3s, box-shadow 0.3s;">
                @if($service->icon_path)
                    <img src="{{ asset('storage/' . $service->icon_path) }}" alt="{{ $service->title }}" style="width: 32px; height: 32px; object-fit: contain; margin-bottom: 15px;">
                @else
                    <div style="width: 32px; height: 32px; margin-bottom: 15px; color: var(--primary-color);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                @endif
                <h4 style="font-size: 1.05rem; font-weight: 700; color: #22456E; margin: 0; line-height: 1.4;">{{ $service->title }}</h4>
            </div>
            @endforeach
        </div>
    </div>


<!-- Partners Section -->
<div class="section partners-section" style="background-color: #e2ebf3; padding: 60px 0; margin: 80px 0; font-family: 'Inter', sans-serif;">
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px; display: flex; flex-wrap: wrap; align-items: flex-start; justify-content: space-between; gap: 40px; text-align: left;">
        <!-- Left Content -->
        <div style="flex: 1; min-width: 300px; max-width: 550px;">
            <div style="display: inline-block; border-top: 1px solid #3b71ca; border-bottom: 1px solid #3b71ca; padding: 5px 0; margin-bottom: 25px;">
                <h5 style="color: #3b71ca; font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem;">CERTIFIED PARTNERS</h5>
            </div>
            
            <h2 style="font-size: 3.2rem; font-weight: 800; color: #22456E; margin-bottom: 25px; line-height: 1.15; letter-spacing: -1px;">Powered by Zoho &<br>Odoo.</h2>
            
            <p style="color: #66768f; font-size: 1.15rem; line-height: 1.6; margin-bottom: 40px;">Bayan Technology is a certified partner for the world's two leading business platforms &mdash; delivering implementation, customization, support, and training end-to-end.</p>
            
            <a href="#" style="background-color: #4b85c1; color: white; padding: 14px 35px; border-radius: 30px; font-weight: 600; text-decoration: none; display: inline-block; transition: background 0.3s; font-size: 1.05rem; box-shadow: 0 4px 15px rgba(75, 133, 193, 0.3);" onmouseover="this.style.backgroundColor='#3b71ca'" onmouseout="this.style.backgroundColor='#4b85c1'">Our Partnerships &rarr;</a>
        </div>
        
        <!-- Right Content (Logos) -->
        <div style="flex: 1; min-width: 300px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
            <div style="background: white; border-radius: 12px; height: 140px; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="{{ asset('images/zoho-logo.svg') }}" alt="Zoho" style="max-width: 70%; max-height: 60px; object-fit: contain;">
            </div>
            <div style="background: white; border-radius: 12px; height: 140px; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="{{ asset('images/odoo-logo.webp') }}" alt="Odoo" style="max-width: 70%; max-height: 60px; object-fit: contain;">
            </div>
            <div style="background: white; border-radius: 12px; height: 140px; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="{{ asset('images/partner-3.png') }}" alt="Partner 3" style="max-width: 70%; max-height: 60px; object-fit: contain;">
            </div>
            <div style="background: white; border-radius: 12px; height: 140px; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="{{ asset('images/partner-4.png') }}" alt="Partner 4" style="max-width: 70%; max-height: 60px; object-fit: contain;">
            </div>
        </div>
    </div>
</div>


<!-- Case Studies / Portfolio Section -->
<div class="section portfolio-section" style="background-color: white; padding: 80px 0; font-family: 'Inter', sans-serif;">
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
            <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
            <h5 style="color: var(--primary-color, #22456E); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">PORTFOLIO</h5>
        </div>
        <h2 style="font-size: 3.2rem; font-weight: 800; color: #22456E; margin-bottom: 50px; line-height: 1.15; letter-spacing: -1px; text-align: left;">A powerful portfolio.</h2>

        <div class="portfolio-grid">
            @foreach($caseStudies as $caseStudy)
            <div class="portfolio-card" onclick="openModal({{ $caseStudy->id }})" style="cursor: pointer;">
                <div class="portfolio-image" style="background-image: url('{{ $caseStudy->image ? asset('storage/' . $caseStudy->image) : '' }}');">
                    <!-- Blur Overlay -->
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

        <div style="text-align: center; margin-top: 60px;">
            <a href="{{ route('portfolio') }}" style="background-color: #3b71ca; color: white; padding: 14px 40px; border-radius: 30px; font-weight: 600; text-decoration: none; display: inline-block; transition: background 0.3s, transform 0.3s; font-size: 1.05rem; box-shadow: 0 8px 20px rgba(59, 113, 202, 0.25);" onmouseover="this.style.backgroundColor='#285ba3'; this.style.transform='translateY(-3px)'" onmouseout="this.style.backgroundColor='#3b71ca'; this.style.transform='translateY(0)'">View Full Portfolio &rarr;</a>
        </div>
    </div>
</div>

<!-- Case Study Modal -->
@include('partials.case_study_modal')

<!-- Clients Section -->
<div class="section clients-section" style="background-color: #f0f4f8; padding: 80px 0 100px; overflow: hidden; text-align: left; font-family: 'Inter', sans-serif;">
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px; margin-bottom: 50px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
            <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
            <h5 style="color: var(--primary-color, #22456E); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">OUR CLIENTS</h5>
        </div>
        <h2 style="font-size: 2.8rem; font-weight: 800; color: #22456E; margin-bottom: 20px; letter-spacing: -0.5px; text-align: left;">Trusted by 2,300+ organizations in 40+ countries.</h2>
    </div>

    <!-- Animated Slider Marquee -->
    <div class="clients-marquee-container">
        <!-- Row 1 -->
        <div class="clients-marquee-row row-1">
            <div class="clients-marquee-content">
                @foreach($clients as $client)
                <a href="{{ $client->url ?? '#' }}" class="client-pill" style="text-decoration: none;" {!! $client->url ? 'target="_blank" rel="noopener noreferrer"' : '' !!}>
                    @if($client->logo_path)
                        <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}">
                    @else
                        <span>{{ $client->name }}</span>
                    @endif
                </a>
                @endforeach
                <!-- Duplicate for seamless loop -->
                @foreach($clients as $client)
                <a href="{{ $client->url ?? '#' }}" class="client-pill" style="text-decoration: none;" {!! $client->url ? 'target="_blank" rel="noopener noreferrer"' : '' !!}>
                    @if($client->logo_path)
                        <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}">
                    @else
                        <span>{{ $client->name }}</span>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
        
        <!-- Row 2 (Reverse direction) -->
        <div class="clients-marquee-row row-2">
            <div class="clients-marquee-content reverse">
                @foreach($clients->reverse() as $client)
                <a href="{{ $client->url ?? '#' }}" class="client-pill" style="text-decoration: none;" {!! $client->url ? 'target="_blank" rel="noopener noreferrer"' : '' !!}>
                    @if($client->logo_path)
                        <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}">
                    @else
                        <span>{{ $client->name }}</span>
                    @endif
                </a>
                @endforeach
                <!-- Duplicate for seamless loop -->
                @foreach($clients->reverse() as $client)
                <a href="{{ $client->url ?? '#' }}" class="client-pill" style="text-decoration: none;" {!! $client->url ? 'target="_blank" rel="noopener noreferrer"' : '' !!}>
                    @if($client->logo_path)
                        <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}">
                    @else
                        <span>{{ $client->name }}</span>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="section testimonials-section" style="background-color: white; padding: 80px 0; text-align: left; font-family: 'Inter', sans-serif;">
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px; margin-bottom: 50px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
            <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
            <h5 style="color: var(--primary-color, #22456E); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">IN THEIR WORDS</h5>
        </div>
        <h2 style="font-size: 2.8rem; font-weight: 800; color: #22456E; margin-bottom: 20px; letter-spacing: -0.5px; text-align: left;">Some Of Our Clients' Testimonials</h2>
        <p style="color: #66768f; font-size: 1.15rem; line-height: 1.6; text-align: left;">Why organizations across 40+ countries keep choosing Bayan Group</p>
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
        <!-- Pagination -->
        <div class="swiper-pagination testimonials-pagination"></div>
    </div>
</div>


<!-- Blog Section -->
<div class="blog-section">
    <div style="max-width: 1200px; width: 100%; margin: 0 auto; padding: 0 20px; text-align: left;">
    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
        <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
        <h5 style="color: var(--primary-color, #22456E); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">INSIGHTS</h5>
    </div>
    <div class="blog-section-header">
        <h2 class="blog-section-title" style="text-align: left;">Ideas from our practice.</h2>
    </div>
    
    @if(isset($latestBlogs) && $latestBlogs->count() > 0)
    <div class="blog-grid">
        @foreach($latestBlogs as $blog)
        <a href="{{ route('blog.details', $blog->id) }}" class="blog-card">
            <div class="blog-image" style="background-image: url('{{ $blog->image ? asset('storage/' . $blog->image) : '' }}');"></div>
            <div class="blog-content">
                <div class="blog-category-tag">{{ $blog->category ? $blog->category->name : 'Uncategorized' }}</div>
                <h3 class="blog-card-title">{{ $blog->title }}</h3>
                <div class="blog-date">{{ $blog->created_at->format('M d, Y') }}</div>
            </div>
        </a>
        @endforeach
    </div>
    @else
        <p style="color: #666;">No blogs published yet.</p>
    @endif
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
@endpush

@endsection