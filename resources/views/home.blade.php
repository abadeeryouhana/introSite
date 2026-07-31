@extends('layouts.app')

@section('content')
<style>
.hero-modern {
    position: relative;
    background-color: #e6f0fa;
    background-image: linear-gradient(135deg, rgba(230,240,250,0.92) 0%, rgba(200,225,250,0.85) 100%), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 140px 20px 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 85vh;
    overflow: hidden;
}

.hero-modern::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background-image: radial-gradient(var(--primary-color) 1px, transparent 1px);
    background-size: 30px 30px;
    opacity: 0.15;
    z-index: 1;
}

.hero-modern-container {
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 50px;
    position: relative;
    z-index: 2;
}

.hero-content {
    flex: 1.2;
    text-align: left;
}

.hero-content h4 {
    color: var(--primary-color);
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 15px;
    text-transform: none;
}

.hero-content h1 {
    color: #1a1a1a;
    font-size: 3.5rem;
    line-height: 1.2;
    font-weight: 800;
    margin-bottom: 25px;
}

.hero-content p {
    color: #444;
    font-size: 1.2rem;
    margin-bottom: 40px;
    line-height: 1.6;
    max-width: 90%;
}

.hero-content .btn {
    background: var(--primary-color);
    color: white;
    padding: 14px 35px;
    font-size: 1.15rem;
    border-radius: 30px;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(61, 129, 195, 0.3);
}
.hero-content .btn:hover {
    background: var(--secondary-color);
    box-shadow: 0 6px 20px rgba(43, 178, 149, 0.4);
}

.hero-graphic {
    flex: 0.8;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

.hero-circle {
    width: 420px;
    height: 420px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 20px 50px rgba(61, 129, 195, 0.4);
    position: relative;
    z-index: 2;
}

.hero-circle::before {
    content: '';
    position: absolute;
    width: 550px;
    height: 550px;
    background: rgba(61, 129, 195, 0.1);
    border-radius: 50%;
    z-index: -1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.hero-circle::after {
    content: '';
    position: absolute;
    width: 700px;
    height: 700px;
    background: rgba(61, 129, 195, 0.05);
    border-radius: 50%;
    z-index: -2;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.hero-circle img {
    max-width: 100%;
    max-height: 100%;
   /* filter: brightness(0) invert(1);*/
}

@media (max-width: 992px) {
    .hero-modern-container {
        flex-direction: column-reverse;
        text-align: center;
        gap: 60px;
    }
    .hero-content {
        text-align: center;
    }
    .hero-content p {
        margin: 0 auto 40px auto;
    }
    .hero-circle {
        width: 320px;
        height: 320px;
    }
    .hero-circle::before { width: 420px; height: 420px; }
    .hero-circle::after { width: 520px; height: 520px; }
}
</style>

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
<div class="section achievements-section" style="background-color: #f8f9fa;text-align: center;">
    <div class="achievements-grid" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; max-width: 1200px;">
        
        <!-- Card 1 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #edf7f0 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 640 512"><path fill="currentColor" d="M544 240.2c-5.4 0-10.7-.8-15.8-2.4L373.9 184.6c-4.4-1.4-9.1-2.2-13.9-2.2H320v-48h40c8.8 0 16-7.2 16-16s-7.2-16-16-16H280c-8.8 0-16 7.2-16 16s7.2 16 16 16h40v48h-40c-4.8 0-9.5.8-13.9 2.2L111.8 237.8c-5.1 1.6-10.4 2.4-15.8 2.4H32c-17.7 0-32 14.3-32 32v192c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32v-16h210.8c12.3 0 24.3-3.6 34.3-10.3l57.7-38.4c6.7-4.4 15-6.8 23.4-6.8h191.8c17.7 0 32-14.3 32-32V272c0-17.7-14.3-32-32-32h-64zM240 376c0 13.3-10.7 24-24 24s-24-10.7-24-24 10.7-24 24-24 24 10.7 24 24zm128 0c0 13.3-10.7 24-24 24s-24-10.7-24-24 10.7-24 24-24 24 10.7 24 24z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">2,300+</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">Clients</p>
        </div>

        <!-- Card 2 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #eef4ff 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca; ">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3zM504 256c0 13.3 10.7 24 24 24h40v40c0 13.3 10.7 24 24 24s24-10.7 24-24V280h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H592V192c0-13.3-10.7-24-24-24s-24 10.7-24 24v40H528c-13.3 0-24 10.7-24 24z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">480+</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">Certified Experts</p>
        </div>

        <!-- Card 3 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #fbeeee 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca; ">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><path fill="currentColor" d="M184 48c0-26.5 21.5-48 48-48h48c26.5 0 48 21.5 48 48V96H184V48zM64 96c-35.3 0-64 28.7-64 64V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H384V48c0-53-43-96-96-96H232c-53 0-96 43-96 96V96H64zM400 256a40 40 0 1 1 -80 0 40 40 0 1 1 80 0zM192 256a40 40 0 1 1 -80 0 40 40 0 1 1 80 0zM256 384c-35.3 0-64-28.7-64-64c0-17.7 14.3-32 32-32s32 14.3 32 32c0 17.7 14.3 32 32 32s32-14.3 32-32c0-17.7 14.3-32 32-32s32 14.3 32 32c0 35.3-28.7 64-64 64z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">170+</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">Industries Served</p>
        </div>

        <!-- Card 4 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #f5f5f5 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 576 512"><path fill="currentColor" d="M400 0H176c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8H24C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9H192c-17.7 0-32 14.3-32 32s14.3 32 32 32H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H357.9C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24H446.4c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112h84.4c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6h84.4c-5.1 66.3-31.1 111.2-63 142.3z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">2</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">ISO Certifications</p>
        </div>

        <!-- Card 5 -->
        <div class="achievement-card" style="background: linear-gradient(180deg, #f5f5f5 0%, #ffffff 30%); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px 20px 30px; width: 190px; text-align: center;">
            <div style="color: #3b71ca; ">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 384 512"><path fill="currentColor" d="M272 384c9.6-31.9 29.5-59.1 49.2-86.2l0 0c5.2-7.1 10.4-14.2 15.4-21.4c19.8-28.5 31.4-63 31.4-100.3C368 78.8 289.2 0 192 0S16 78.8 16 176c0 37.3 11.6 71.9 31.4 100.3c5 7.2 10.2 14.3 15.4 21.4l0 0c19.8 27.1 39.7 54.4 49.2 86.2H272zM192 512c44.2 0 80-35.8 80-80V416H112v16c0 44.2 35.8 80 80 80zM112 176c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16s7.2-16 16-16H96c8.8 0 16 7.2 16 16zm80-112c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V80c0-8.8 7.2-16 16-16zm80 112c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H288c-8.8 0-16-7.2-16-16z"/></svg>
            </div>
            <h3 style="font-size: 1.8rem; font-weight: 600; color: #222; margin: 10px 0;">23+</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">Years Of Experience</p>
        </div>

    </div>
</div>


<!-- Who we are Section  -->
<div class="section who-we-are-section" style="background-color: white; padding: 50px 0; position: relative; overflow: hidden;">
    <!-- Background subtle decorations -->
    <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(59,113,202,0.05) 0%, rgba(255,255,255,0) 70%); border-radius: 50%; pointer-events: none;"></div>
    <div style="position: absolute; bottom: -50px; left: -50px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(59,113,202,0.05) 0%, rgba(255,255,255,0) 70%); border-radius: 50%; pointer-events: none;"></div>
    
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; align-items: center; justify-content: space-between; gap: 60px; flex-wrap: wrap;">
        
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
    <style>
        .work-card {
            flex: 1;
            min-width: 240px;
            background: white;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            text-align: center;
            transition: all 0.3s ease;
            border-bottom: 4px solid transparent;
            position: relative;
            top: 0;
        }
        .work-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            border-bottom: 4px solid var(--primary-color, #3b71ca);
        }
        .work-card-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(59,113,202,0.08);
            color: var(--primary-color, #3b71ca);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px auto;
            transition: all 0.3s ease;
        }
        .work-card:hover .work-card-icon {
            background-color: var(--primary-color, #3b71ca);
            color: white;
            transform: scale(1.1);
        }
    </style>
    
    <div style="max-width: 1200px;">
        
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
    <div style="display: inline-flex; align-items: center; justify-content: center; gap: 15px;">
        <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
        <h5 style="color: var(--primary-color, #22456E); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">The Group Structure</h5>
        <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
    </div>
    <h2 style="font-weight: 800; color: #22456E; margin-bottom: 15px; font-size: 2.5rem;">Five Sectors. A Family of Brands.</h2>
    <p style="color: #555; font-size: 1.1rem; max-width: 600px; margin: 0 0 50px 0;">One group operating specialized brands across the disciplines enterprises rely on most.</p>
    
    <!-- Swiper -->
    <div class="swiper group-swiper" style="max-width: 1200px; margin: 0 auto; padding: 0 40px;">
        <div class="swiper-wrapper" style="align-items: stretch;">
            @foreach($sectors as $sector)
            <div class="swiper-slide" style="height: auto;">
                <div class="sector-card" style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); height: 100%; display: flex; flex-direction: column;">
                    <h3 style="font-size: 1.3rem; font-weight: 700; color: var(--primary-color, #3b71ca); margin-bottom: 25px; text-transform: uppercase;">{{ $sector->name }}</h3>
                    
                    <div class="brands-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; flex-grow: 1; align-content: start;">
                        @foreach($sector->brands as $brand)
                            @if($brand->logo_path)
                                <div style="display: flex; justify-content: center; align-items: center; padding: 10px; background: #fdfdfd; border: 1px solid #eee; border-radius: 8px;">
                                    <img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}" style="max-width: 100%; max-height: 50px; object-fit: contain;">
                                </div>
                            @endif
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

<!-- What We Do Section -->
<div class="section services-section" style="background-color: white; padding: 80px 0; text-align: left;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div style="display: inline-flex; align-items: center; justify-content: center; gap: 15px;">
        <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
        <h5 style="color: var(--primary-color, #22456E); font-weight: 700; margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">What We Do</h5>
        <div style="height: 2px; width: 40px; background-color: var(--primary-color, #22456E);"></div>
    </div>

        <h2 style="font-weight: 800; color: #22456E; margin-bottom: 15px; font-size: 2.5rem;">    <h2 style="font-weight: 800; color: #22456E; margin-bottom: 15px; font-size: 2.5rem;">Smart Business Solutions</h2>
    <p style="color: #555; font-size: 1.1rem; max-width: 600px; margin: 0 0 50px 0;">Ten services. One integrated engine.</p>

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
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; flex-wrap: wrap; align-items: flex-start; justify-content: space-between; gap: 40px; text-align: left;">
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

<style>
    @media (max-width: 1024px) {
        .services-grid { grid-template-columns: repeat(3, 1fr) !important; }
    }
    @media (max-width: 768px) {
        .services-grid { grid-template-columns: repeat(2, 1fr) !important; }
    }
    @media (max-width: 480px) {
        .services-grid { grid-template-columns: 1fr !important; }
    }
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border-color: transparent;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var groupSwiper = new Swiper('.group-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.group-pagination',
                clickable: true,
                bulletClass: 'custom-bullet',
                bulletActiveClass: 'custom-bullet-active',
            },
            navigation: {
                nextEl: '.group-button-next',
                prevEl: '.group-button-prev',
            },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 30 },
                1024: { slidesPerView: 3, spaceBetween: 40 },
                1280: { slidesPerView: 4, spaceBetween: 40 },
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
.group-structure-section .btn:hover {
    background-color: var(--primary-color) !important;
    color: white !important;
}
.sector-card { transition: transform 0.3s ease; }
.sector-card:hover { transform: translateY(-5px); }
</style>
@endsection