<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary Meta Tags -->
    @php
        $siteTitle = $global_settings['site_name'] ?? 'Bayan Group';
        $pageTitle = trim($__env->yieldContent('seo_title'));
        if (empty($pageTitle)) {
            $pageTitle = $current_seo->meta_title ?? ($global_seo->meta_title ?? $siteTitle);
        }

        $pageDesc = trim($__env->yieldContent('seo_description'));
        if (empty($pageDesc)) {
            $pageDesc = $current_seo->meta_description ?? ($global_seo->meta_description ?? 'Bayan Group empowers organizations with smart solutions across communication, technology, education, and digital transformation.');
        }

        $pageKeywords = trim($__env->yieldContent('seo_keywords'));
        if (empty($pageKeywords)) {
            $pageKeywords = $current_seo->meta_keywords ?? ($global_seo->meta_keywords ?? 'Bayan Group, digital innovation, business solutions, corporate communication, enterprise technology');
        }

        $pageRobots = trim($__env->yieldContent('seo_robots'));
        if (empty($pageRobots)) {
            $pageRobots = $current_seo->robots ?? 'index, follow';
        }

        $canonicalUrl = trim($__env->yieldContent('seo_canonical'));
        if (empty($canonicalUrl)) {
            $canonicalUrl = !empty($current_seo->canonical_url) ? $current_seo->canonical_url : url()->current();
        }

        $ogImage = trim($__env->yieldContent('og_image'));
        if (empty($ogImage)) {
            if (!empty($current_seo->og_image)) {
                $ogImage = asset('storage/' . $current_seo->og_image);
            } elseif (!empty($global_seo->og_image)) {
                $ogImage = asset('storage/' . $global_seo->og_image);
            } elseif (!empty($global_settings['site_logo'])) {
                $ogImage = asset('storage/' . $global_settings['site_logo']);
            } else {
                $ogImage = asset('favicon.ico');
            }
        }

        $ogTitle = trim($__env->yieldContent('og_title'));
        if (empty($ogTitle)) {
            $ogTitle = $current_seo->og_title ?: $pageTitle;
        }

        $ogDesc = trim($__env->yieldContent('og_description'));
        if (empty($ogDesc)) {
            $ogDesc = $current_seo->og_description ?: $pageDesc;
        }
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="title" content="{{ $pageTitle }}">
    <meta name="description" content="{{ $pageDesc }}">
    <meta name="keywords" content="{{ $pageKeywords }}">
    <meta name="robots" content="{{ $pageRobots }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <!-- Open Graph / Facebook / LinkedIn -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:site_name" content="{{ $siteTitle }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDesc }}">
    <meta property="og:image" content="{{ $ogImage }}">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $canonicalUrl }}">
    <meta name="twitter:title" content="@yield('twitter_title', $current_seo->twitter_title ?: $ogTitle)">
    <meta name="twitter:description" content="@yield('twitter_description', $current_seo->twitter_description ?: $ogDesc)">
    <meta name="twitter:image" content="@yield('twitter_image', $ogImage)">

    <!-- Search Engine Verification -->
    @if(!empty($global_settings['google_site_verification']))
        <meta name="google-site-verification" content="{{ $global_settings['google_site_verification'] }}">
    @endif
    @if(!empty($global_settings['bing_site_verification']))
        <meta name="msvalidate.01" content="{{ $global_settings['bing_site_verification'] }}">
    @endif

    <!-- JSON-LD Structured Data: Organization & WebSite -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": "{{ url('/#organization') }}",
                "name": "{{ $siteTitle }}",
                "url": "{{ url('/') }}",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ isset($global_settings['site_logo']) ? asset('storage/' . $global_settings['site_logo']) : asset('favicon.ico') }}"
                },
                @if(isset($social_links) && $social_links->count() > 0)
                "sameAs": [
                    @foreach($social_links as $slink)
                        "{{ $slink->url }}"{{ !$loop->last ? ',' : '' }}
                    @endforeach
                ],
                @endif
                "contactPoint": [
                    @if(!empty($global_settings['contact_phone_1']))
                    {
                        "@type": "ContactPoint",
                        "telephone": "{{ $global_settings['contact_phone_1'] }}",
                        "contactType": "customer service"
                    }
                    @endif
                ]
            },
            {
                "@type": "WebSite",
                "@id": "{{ url('/#website') }}",
                "url": "{{ url('/') }}",
                "name": "{{ $siteTitle }}",
                "publisher": {
                    "@id": "{{ url('/#organization') }}"
                }
            }
        ]
    }
    </script>

    <!-- Page Specific Structured Data -->
    @if(!empty($current_seo->schema_markup))
        {!! $current_seo->schema_markup !!}
    @endif
    @yield('schema_markup')

    @if(isset($global_settings['site_logo']))
        <link rel="icon" href="{{ asset('storage/' . $global_settings['site_logo']) }}">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}">
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ filemtime(public_path('css/layout.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}?v={{ filemtime(public_path('css/components.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}?v={{ filemtime(public_path('css/animations.css')) }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @stack('styles')
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
                    <img src="{{ asset('storage/' . $global_settings['site_logo']) }}" alt="{{ $global_settings['site_name'] ?? 'Bayan Group' }} - Digital Innovation & Business Solutions" class="logo">
                @endif
                <div style="display: flex; flex-direction: column;">
                    <h2 style="margin: 0; color: var(--primary-color); font-weight: 800; font-size: 1.6rem; letter-spacing: -0.5px; text-transform: uppercase; line-height: 1.1;">Bayan Group</h2>
                    <span style="font-size: 0.7rem; color: #666; letter-spacing: 1px; text-transform: uppercase; font-weight: 600;">Digital Innovation & Business Solutions</span>
                </div>
            </a>
        </div>
        <ul style="margin-right: 50px; align-items: center;">
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('sectors.brands') }}">Sectors & Brands</a></li>
            <li><a href="{{ route('services.page') }}">Services</a></li>
            <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li><a href="{{ route('careers') }}">Careers</a></li>
            <li><a href="{{ route('contact') }}" class="btn" style="color: white; border-radius: 30px; padding: 10px 25px;">Contact Us</a></li>
        </ul>
    </nav>

    <main style="flex: 1; display: flex; flex-direction: column;">
        @yield('content')
    </main>

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
                        <img src="{{ asset('storage/' . $global_settings['site_logo']) }}" alt="{{ $global_settings['site_name'] ?? 'Bayan Group' }} - Integrated Business Solutions" style="height: 45px;">
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
                                $platform = strtolower(trim($link->platform));
                                $iconMap = [
                                    'facebook'  => 'fa-brands fa-facebook-f',
                                    'instagram' => 'fa-brands fa-instagram',
                                    'x'         => 'fa-brands fa-x-twitter',
                                    'twitter'   => 'fa-brands fa-x-twitter',
                                    'linkedin'  => 'fa-brands fa-linkedin-in',
                                    'youtube'   => 'fa-brands fa-youtube',
                                    'tiktok'    => 'fa-brands fa-tiktok',
                                    'snapchat'  => 'fa-brands fa-snapchat',
                                    'telegram'  => 'fa-brands fa-telegram',
                                    'whatsapp'  => 'fa-brands fa-whatsapp',
                                    'github'    => 'fa-brands fa-github',
                                ];
                                $iconClass = $iconMap[$platform] ?? ('fa-brands fa-' . $platform);
                            @endphp
                            <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" title="{{ $link->platform }}"><i class="{{ $iconClass }}"></i></a>
                        @endforeach
                    @elseif(isset($global_settings))
                        @php
                            $settingsSocialMap = [
                                'Facebook'  => ['url' => $global_settings['social_facebook'] ?? $global_settings['facebook'] ?? null, 'icon' => 'fa-brands fa-facebook-f'],
                                'Instagram' => ['url' => $global_settings['social_instagram'] ?? $global_settings['instagram'] ?? null, 'icon' => 'fa-brands fa-instagram'],
                                'X'         => ['url' => $global_settings['social_x'] ?? $global_settings['x'] ?? $global_settings['social_twitter'] ?? $global_settings['twitter'] ?? null, 'icon' => 'fa-brands fa-x-twitter'],
                                'LinkedIn'  => ['url' => $global_settings['social_linkedin'] ?? $global_settings['linkedin'] ?? null, 'icon' => 'fa-brands fa-linkedin-in'],
                                'YouTube'   => ['url' => $global_settings['social_youtube'] ?? $global_settings['youtube'] ?? null, 'icon' => 'fa-brands fa-youtube'],
                                'TikTok'    => ['url' => $global_settings['social_tiktok'] ?? $global_settings['tiktok'] ?? null, 'icon' => 'fa-brands fa-tiktok'],
                                'Snapchat'  => ['url' => $global_settings['social_snapchat'] ?? $global_settings['snapchat'] ?? null, 'icon' => 'fa-brands fa-snapchat'],
                                'Telegram'  => ['url' => $global_settings['social_telegram'] ?? $global_settings['telegram'] ?? null, 'icon' => 'fa-brands fa-telegram'],
                            ];
                        @endphp
                        @foreach($settingsSocialMap as $plat => $data)
                            @if(!empty($data['url']))
                                <a href="{{ $data['url'] }}" target="_blank" rel="noopener noreferrer" title="{{ $plat }}"><i class="{{ $data['icon'] }}"></i></a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="footer-col-2">
                <h4>COMPANY</h4>
                <ul>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="#">Partnerships</a></li>
                    <li><a href="#">Our Clients</a></li>
                    <li><a href="{{ route('careers') }}">Careers</a></li>
                </ul>
            </div>

            <div class="footer-col-3">
                <h4>EXPLORE</h4>
                <ul>
                    <li><a href="{{ route('sectors.brands') }}">Sectors & Brands</a></li>
                    <li><a href="{{ route('services.page') }}">Our Services</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
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
                <a href="{{ route('privacy') }}">Privacy Policy</a>
                <a href="{{ route('terms') }}">Terms & Conditions</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
    <script src="{{ asset('js/animations.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if(session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            close: true,
            gravity: "top", 
            position: "right",
            style: {
                background: "var(--secondary-color, #2BB295)",
            }
        }).showToast();
    </script>
    @endif

    @include('partials.chatbot')
</body>
</html>