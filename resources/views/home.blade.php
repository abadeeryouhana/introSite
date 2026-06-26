@extends('layouts.app')

@section('content')
<div class="hero">
    <h1>Welcome to Bayan Group</h1>
    <p>Empowering businesses with innovative solutions and top-tier divisions.</p>
    <a href="{{ route('contact') }}" class="btn">Get in Touch</a>
</div>

<div class="section achievements-section" style="background-color: #f8f9fa; padding: 60px 0; text-align: center;">
    <h2 style="font-size: 2.2rem; margin-bottom: 40px; color: #333; font-weight: bold;">Our Achievements</h2>
    <div class="achievements-grid" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; max-width: 1200px; margin: 0 auto; padding: 0 10px;">
        
        <!-- Card 1 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #edf7f0 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca; margin-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 640 512"><path fill="currentColor" d="M544 240.2c-5.4 0-10.7-.8-15.8-2.4L373.9 184.6c-4.4-1.4-9.1-2.2-13.9-2.2H320v-48h40c8.8 0 16-7.2 16-16s-7.2-16-16-16H280c-8.8 0-16 7.2-16 16s7.2 16 16 16h40v48h-40c-4.8 0-9.5.8-13.9 2.2L111.8 237.8c-5.1 1.6-10.4 2.4-15.8 2.4H32c-17.7 0-32 14.3-32 32v192c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-16h210.8c12.3 0 24.3-3.6 34.3-10.3l57.7-38.4c6.7-4.4 15-6.8 23.4-6.8h191.8c17.7 0 32-14.3 32-32V272c0-17.7-14.3-32-32-32h-64zM240 376c0 13.3-10.7 24-24 24s-24-10.7-24-24 10.7-24 24-24 24 10.7 24 24zm128 0c0 13.3-10.7 24-24 24s-24-10.7-24-24 10.7-24 24-24 24 10.7 24 24z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">2,300+</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">Clients</p>
        </div>

        <!-- Card 2 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #eef4ff 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca; margin-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3zM504 256c0 13.3 10.7 24 24 24h40v40c0 13.3 10.7 24 24 24s24-10.7 24-24V280h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H592V192c0-13.3-10.7-24-24-24s-24 10.7-24 24v40H528c-13.3 0-24 10.7-24 24z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">480+</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">Certified Experts</p>
        </div>

        <!-- Card 3 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #fbeeee 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca; margin-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><path fill="currentColor" d="M184 48c0-26.5 21.5-48 48-48h48c26.5 0 48 21.5 48 48V96H184V48zM64 96c-35.3 0-64 28.7-64 64V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H384V48c0-53-43-96-96-96H232c-53 0-96 43-96 96V96H64zM400 256a40 40 0 1 1 -80 0 40 40 0 1 1 80 0zM192 256a40 40 0 1 1 -80 0 40 40 0 1 1 80 0zM256 384c-35.3 0-64-28.7-64-64c0-17.7 14.3-32 32-32s32 14.3 32 32c0 17.7 14.3 32 32 32s32-14.3 32-32c0-17.7 14.3-32 32-32s32 14.3 32 32c0 35.3-28.7 64-64 64z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">170+</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">Industries Served</p>
        </div>

        <!-- Card 4 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #f5f5f5 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca; margin-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 576 512"><path fill="currentColor" d="M400 0H176c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8H24C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9H192c-17.7 0-32 14.3-32 32s14.3 32 32 32H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H357.9C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24H446.4c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112h84.4c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6h84.4c-5.1 66.3-31.1 111.2-63 142.3z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">2</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">ISO Certifications</p>
        </div>

        <!-- Card 5 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #f5f5f5 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca; margin-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 384 512"><path fill="currentColor" d="M272 384c9.6-31.9 29.5-59.1 49.2-86.2l0 0c5.2-7.1 10.4-14.2 15.4-21.4c19.8-28.5 31.4-63 31.4-100.3C368 78.8 289.2 0 192 0S16 78.8 16 176c0 37.3 11.6 71.9 31.4 100.3c5 7.2 10.2 14.3 15.4 21.4l0 0c19.8 27.1 39.7 54.4 49.2 86.2H272zM192 512c44.2 0 80-35.8 80-80V416H112v16c0 44.2 35.8 80 80 80zM112 176c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16s7.2-16 16-16H96c8.8 0 16 7.2 16 16zm80-112c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V80c0-8.8 7.2-16 16-16zm80 112c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H288c-8.8 0-16-7.2-16-16z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">23+</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">Years Of Experience</p>
        </div>

    </div>
</div>

<div class="section clients-section" style="background-color: #f8f9fa; text-align: center; padding: 60px 0; overflow: hidden; position: relative;">
    <h2 style="font-weight: 300; color: #444; margin-bottom: 50px; font-size: 2.2rem;">Our Clients</h2>
    
    <!-- Swiper -->
    <div class="swiper clients-swiper" style="max-width: 1100px; margin: 0 auto; padding: 0 40px;">
        <div class="swiper-wrapper" style="align-items: center;">
            @foreach($clients as $client)
            <div class="swiper-slide" style="text-align: center; display: flex; justify-content: center; height: 100px;">
                @if($client->logo_path)
                    <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}" style="max-height: 80px; max-width: 180px; object-fit: contain;">
                @else
                    <h4 style="color: #666; align-self: center;">{{ $client->name }}</h4>
                @endif
            </div>
            @endforeach
        </div>
        
        <!-- Add Navigation -->
        <div class="swiper-button-next clients-button-next" style="color: #666; transform: scale(0.6); right: 0;"></div>
    </div>
    
    <div style="display: flex; justify-content: center; align-items: center; gap: 8px; margin-top: 40px;">
        <!-- Play/pause icon (fake for visuals) -->
        <div style="color: #b0b0b0; display: flex; align-items: center; cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination clients-pagination" style="position: static; width: auto; display: flex; align-items: center; gap: 5px;"></div>
    </div>
</div>

<div class="section divisions-section" style="background-color: white; text-align: center; padding: 60px 0; overflow: hidden; position: relative;">
    <h2 style="font-weight: 300; color: #444; margin-bottom: 50px; font-size: 2.2rem;">Our Divisions</h2>
    
    <!-- Swiper -->
    <div class="swiper divisions-swiper" style="max-width: 1100px; margin: 0 auto; padding: 0 40px;">
        <div class="swiper-wrapper" style="align-items: center;">
            @foreach($divisions as $division)
            <div class="swiper-slide" style="text-align: center; display: flex; justify-content: center; flex-direction: column; align-items: center;">
                @if($division->logo_path)
                    <img src="{{ asset('storage/' . $division->logo_path) }}" alt="{{ $division->name }}" style="max-height: 80px; max-width: 180px; object-fit: contain; margin-bottom: 15px;">
                @endif
                <h3 style="font-size: 1.2rem; color: #333; margin: 0;">{{ $division->name }}</h3>
                @if($division->url)
                    <a href="{{ $division->url }}" class="btn" style="margin-top: 15px; font-size: 0.8rem; padding: 6px 16px; border-radius: 20px; background-color: transparent; color: var(--primary-color); border: 1px solid var(--primary-color); transition: all 0.3s;">Visit Website</a>
                @endif
            </div>
            @endforeach
        </div>
        
        <!-- Add Navigation -->
        <div class="swiper-button-next divisions-button-next" style="color: #666; transform: scale(0.6); right: 0;"></div>
    </div>

    <div style="display: flex; justify-content: center; align-items: center; gap: 8px; margin-top: 40px;">
        <!-- Play/pause icon (fake for visuals) -->
        <div style="color: #b0b0b0; display: flex; align-items: center; cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination divisions-pagination" style="position: static; width: auto; display: flex; align-items: center; gap: 5px;"></div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var clientsSwiper = new Swiper('.clients-swiper', {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.clients-pagination',
                clickable: true,
                bulletClass: 'custom-bullet',
                bulletActiveClass: 'custom-bullet-active',
            },
            navigation: {
                nextEl: '.clients-button-next',
            },
            breakpoints: {
                640: { slidesPerView: 3, spaceBetween: 40 },
                768: { slidesPerView: 4, spaceBetween: 50 },
                1024: { slidesPerView: 4, spaceBetween: 60 },
            }
        });

        var divisionsSwiper = new Swiper('.divisions-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.divisions-pagination',
                clickable: true,
                bulletClass: 'custom-bullet',
                bulletActiveClass: 'custom-bullet-active',
            },
            navigation: {
                nextEl: '.divisions-button-next',
            },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 40 },
                768: { slidesPerView: 3, spaceBetween: 50 },
                1024: { slidesPerView: 4, spaceBetween: 60 },
            }
        });
    });
</script>

<style>
.custom-bullet {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    border: 1px solid #ccc;
    background: transparent;
    display: inline-block;
    cursor: pointer;
    transition: all 0.2s;
}
.custom-bullet-active {
    background: #ccc;
}
.swiper-button-prev::after, .swiper-button-next::after {
    font-size: 24px !important;
    font-weight: bold;
}
.clients-section .btn:hover, .divisions-section .btn:hover {
    background-color: var(--primary-color) !important;
    color: white !important;
}
</style>
@endsection