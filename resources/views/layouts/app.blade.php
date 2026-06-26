<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $global_settings['site_name'] ?? 'Bayan Group Clone' }}</title>
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
            <li><a href="{{ route('services.page') }}">Services</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
    </nav>

    @yield('content')

    <footer style="background-color: var(--primary-color); color: white; border-top: 5px solid var(--secondary-color);">
        <div class="footer-content">
            <div class="footer-col">
                <h3>About Us</h3>
                <p>Delivering high-quality services and divisions to help your business grow.</p>
            </div>
            <div class="footer-col">
                <h3>Contact</h3>
                <p>Email: {{ $global_settings['contact_email'] ?? 'info@bayangroup.test' }}</p>
                <p>Phone: {{ $global_settings['contact_phone'] ?? '+1 234 567 890' }}</p>
                <p>Address: {{ $global_settings['contact_address'] ?? '123 Business Rd, City' }}</p>
            </div>
            <div class="footer-col">
                <h3>Follow Us</h3>
                <div class="social-links" style="display: flex; gap: 15px; align-items: center; margin-top: 10px;">
                    @if(isset($social_links))
                        @foreach($social_links as $link)
                            @php
                                $platform = strtolower($link->platform);
                                $iconClass = 'fa-solid fa-link'; // default
                                $brands = ['facebook', 'twitter', 'linkedin', 'instagram', 'youtube', 'tiktok', 'github', 'whatsapp'];
                                if (in_array($platform, $brands)) {
                                    $iconClass = 'fa-brands fa-' . $platform;
                                } elseif ($platform === 'X') {
                                    $iconClass = 'fa-brands fa-x-twitter';
                                }
                            @endphp
                            <a href="{{ $link->url }}" target="_blank" title="{{ $link->platform }}" style="font-size: 1.5rem; color: rgba(255,255,255,0.8); transition: color 0.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.8)'">
                                <i class="{{ $iconClass }}"></i>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Bayan Group Clone. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>