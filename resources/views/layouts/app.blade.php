<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $global_settings['site_name'] ?? 'Bayan Group' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        :root {
            --primary-color: {{ $global_settings['color_primary'] ?? '#3D81C3' }};
            --secondary-color: {{ $global_settings['color_secondary'] ?? '#2BB295' }};
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 12px;">
                @if(isset($global_settings['site_logo']))
                    <img src="{{ asset('storage/' . $global_settings['site_logo']) }}" alt="Logo" class="logo">
                    <h2 style="margin: 0; color: var(--primary-color); font-weight: 400; font-size: 1.6rem; letter-spacing: -0.5px;">Bayan Group</h2>
                @else
                    <h2 style="margin: 0; color: var(--primary-color); font-weight: 400; font-size: 1.6rem; letter-spacing: -0.5px;">Bayan Group</h2>
                @endif
            </a>
        </div>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('sectors.brands') }}">Sectors & Brands</a></li>
            <li><a href="{{ route('services.page') }}">Services</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
    </nav>

    @yield('content')

    <style>
        .footer-cta {
            background: linear-gradient(110deg, #102640 0%, #30659b 100%);
            text-align: center;
            padding: 80px 20px;
            position: relative;
            overflow: hidden;
        }
        .footer-cta h2 {
            color: #fce268;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }
        .footer-cta .btn-cta {
            background-color: #5591cd;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            font-size: 1.1rem;
            position: relative;
            z-index: 2;
            transition: background 0.3s;
            display: inline-block;
        }
        .footer-cta .btn-cta:hover {
            background-color: #3b71ca;
        }
        .footer-cta .cta-waves {
            position: absolute;
            right: -5%;
            top: 0;
            height: 100%;
            width: 50%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
            z-index: 1;
            opacity: 0.15;
        }
        .footer-cta .cta-wave {
            width: 40px;
            height: 120%;
            background-color: rgba(255,255,255,0.8);
            border-radius: 50px;
            transform: rotate(5deg);
        }
        .footer-cta .cta-wave:nth-child(even) { height: 110%; transform: rotate(-2deg); }
        .footer-cta .cta-wave:nth-child(3) { height: 130%; transform: rotate(3deg); }

        .site-footer {
            background-color: #0c1b2a;
            color: #a0aec0;
            padding: 70px 20px 30px;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
        }
        .site-footer .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 50px;
        }
        .site-footer h4 {
            color: #fce268;
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }
        .site-footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .site-footer ul li {
            margin-bottom: 12px;
        }
        .site-footer ul li a {
            color: #a0aec0;
            text-decoration: none;
            transition: color 0.3s;
        }
        .site-footer ul li a:hover {
            color: white;
        }
        .footer-contact-item {
            margin-bottom: 20px;
        }
        .footer-contact-item span {
            display: block;
            color: #a0aec0;
            font-size: 0.85rem;
            text-transform: uppercase;
            margin-bottom: 3px;
        }
        .footer-contact-item p {
            color: white;
            margin: 0;
        }
        .footer-contact-item a {
            color: #fce268;
            text-decoration: none;
        }
        .social-icons-footer {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }
        .social-icons-footer a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        .social-icons-footer a:hover {
            background: white;
            color: #0c1b2a;
        }
        .footer-bottom-bar {
            max-width: 1200px;
            margin: 0 auto;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 25px;
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
        }
        .footer-bottom-links a {
            color: #a0aec0;
            margin-left: 20px;
            text-decoration: none;
        }
        .footer-bottom-links a:hover {
            color: white;
        }
        @media (max-width: 900px) {
            .site-footer .footer-inner {
                grid-template-columns: 1fr 1fr;
            }
        }
        @media (max-width: 600px) {
            .site-footer .footer-inner {
                grid-template-columns: 1fr;
            }
            .footer-bottom-bar {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
        }
    </style>

    <div class="footer-cta">
        <div class="cta-waves">
            <div class="cta-wave"></div>
            <div class="cta-wave"></div>
            <div class="cta-wave"></div>
            <div class="cta-wave"></div>
            <div class="cta-wave"></div>
        </div>
        <h2>Let's Build Something Exceptional<br>Together</h2>
        <a href="{{ route('contact') }}" class="btn-cta">Start a Conversation &rarr;</a>
    </div>

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-col-1">
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                    @if(isset($global_settings['site_logo']))
                        <img src="{{ asset('storage/' . $global_settings['site_logo']) }}" alt="Logo" style="height: 45px;">
                    @else
                        <!-- fallback logo -->
                        <div style="width: 45px; height: 45px; background: #3b71ca; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1.2rem;">BG</div>
                    @endif
                    <div>
                        <h3 style="color: white; margin: 0; font-size: 1.2rem; font-weight: 800; letter-spacing: 0.5px;">BAYAN GROUP</h3>
                        <p style="color: #a0aec0; margin: 0; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">DIGITAL INNOVATION & BUSINESS<br>SOLUTIONS</p>
                    </div>
                </div>
                <p style="margin-bottom: 5px; line-height: 1.6;">Communicate. Empower. Transform.</p>
                <p style="line-height: 1.6;">An integrated business solutions group &mdash; since 2003.</p>
                
                <div class="social-icons-footer">
                    @if(isset($social_links) && $social_links->count() > 0)
                        @foreach($social_links as $link)
                            @php
                                $platform = strtolower($link->platform);
                                $iconClass = 'fa-solid fa-link';
                                $brands = ['facebook', 'twitter', 'linkedin', 'instagram', 'youtube', 'tiktok', 'github', 'whatsapp'];
                                if (in_array($platform, $brands)) {
                                    $iconClass = 'fa-brands fa-' . $platform;
                                } elseif ($platform === 'X') {
                                    $iconClass = 'fa-brands fa-x-twitter';
                                }
                            @endphp
                            <a href="{{ $link->url }}" target="_blank" title="{{ $link->platform }}"><i class="{{ $iconClass }}"></i></a>
                        @endforeach
                    @else
                        <a href="#">L</a>
                        <a href="#">F</a>
                        <a href="#">Y</a>
                        <a href="#">I</a>
                        <a href="#">X</a>
                    @endif
                </div>
            </div>

            <div class="footer-col-2">
                <h4>COMPANY</h4>
                <ul>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="#">Partnerships</a></li>
                    <li><a href="#">Our Clients</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>

            <div class="footer-col-3">
                <h4>EXPLORE</h4>
                <ul>
                    <li><a href="{{ route('sectors.brands') }}">Sectors & Brands</a></li>
                    <li><a href="{{ route('services.page') }}">Our Services</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <div class="footer-col-4">
                <h4>CONTACT</h4>
                @if(!empty($global_settings['contact_phone_1']))
                <div class="footer-contact-item">
                    <span>{{ $global_settings['contact_title_1'] ?? 'CAIRO HQ' }}</span>
                    <p>{{ $global_settings['contact_phone_1'] }}</p>
                </div>
                @endif
                @if(!empty($global_settings['contact_phone_2']))
                <div class="footer-contact-item">
                    <span>{{ $global_settings['contact_title_2'] ?? 'MUSCAT' }}</span>
                    <p>{{ $global_settings['contact_phone_2'] }}</p>
                </div>
                @endif
                @if(!empty($global_settings['contact_phone_3']))
                <div class="footer-contact-item">
                    <span>{{ $global_settings['contact_title_3'] ?? 'FLORIDA' }}</span>
                    <p>{{ $global_settings['contact_phone_3'] }}</p>
                </div>
                @endif
                <div class="footer-contact-item" style="margin-top: 10px;">
                    <a href="mailto:{{ $global_settings['contact_email'] ?? 'info@bayangroup.net' }}">{{ $global_settings['contact_email'] ?? 'info@bayangroup.net' }}</a>
                </div>
            </div>
        </div>

        <div class="footer-bottom-bar">
            <div>&copy; {{ date('Y') }} Bayan Group. All rights reserved.</div>
            <div class="footer-bottom-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
            </div>
        </div>
    </footer>
</body>
</html>