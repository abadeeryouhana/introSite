<?php

$basePath = 'd:/Projects Template/introSite/resources/views';
if (!is_dir($basePath . '/layouts')) {
    mkdir($basePath . '/layouts', 0777, true);
}

// public/css/style.css
$css = <<<EOT
:root {
    --primary-color: #3D81C3; /* Default, overridden by blade inline style */
    --secondary-color: #2BB295;
    --dark-bg: #25231E;
    --light-bg: #F5F7FA;
    --text-dark: #333333;
    --text-light: #FFFFFF;
}

* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: 'Inter', sans-serif; line-height: 1.6; color: var(--text-dark); background: var(--light-bg); }

/* Typography */
h1, h2, h3 { color: var(--dark-bg); margin-bottom: 1rem; }
a { text-decoration: none; color: var(--primary-color); transition: color 0.3s; }
a:hover { color: var(--secondary-color); }

/* Navigation */
nav { background: rgba(255, 255, 255, 0.9); padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.1); backdrop-filter: blur(10px); }
nav img.logo { height: 50px; }
nav ul { list-style: none; display: flex; gap: 20px; }
nav ul li a { color: var(--text-dark); font-weight: 600; text-transform: uppercase; font-size: 0.9rem; }
nav ul li a:hover { color: var(--primary-color); }

/* Buttons */
.btn { display: inline-block; padding: 10px 25px; background: var(--primary-color); color: var(--text-light); border-radius: 5px; font-weight: bold; transition: background 0.3s, transform 0.2s; border: none; cursor: pointer; }
.btn:hover { background: var(--secondary-color); transform: translateY(-2px); color: white;}

/* Hero Section */
.hero { background: var(--dark-bg); color: var(--text-light); text-align: center; padding: 100px 20px; }
.hero h1 { color: var(--text-light); font-size: 3rem; margin-bottom: 20px; }
.hero p { font-size: 1.2rem; max-width: 600px; margin: 0 auto 30px auto; opacity: 0.8; }

/* Sections */
.section { padding: 80px 20px; max-width: 1200px; margin: 0 auto; text-align: center; }
.section h2 { font-size: 2.5rem; color: var(--primary-color); margin-bottom: 40px; }

/* Grid / Cards */
.grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
.card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: transform 0.3s, box-shadow 0.3s; }
.card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
.card img { max-width: 100px; margin-bottom: 20px; }
.card h3 { color: var(--dark-bg); margin-bottom: 15px; }

/* Contact Form */
.contact-form { max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); text-align: left; }
.form-group { margin-bottom: 20px; }
.form-group label { display: block; margin-bottom: 8px; font-weight: bold; }
.form-group input, .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; }
.form-group input:focus, .form-group textarea:focus { outline: none; border-color: var(--primary-color); box-shadow: 0 0 5px rgba(61, 129, 195, 0.3); }

/* Footer */
footer { background: var(--dark-bg); color: #ccc; padding: 50px 20px; text-align: center; }
.footer-content { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 30px; text-align: left;}
.footer-col { flex: 1; min-width: 250px; }
.footer-col h3 { color: white; margin-bottom: 20px; }
.footer-col ul { list-style: none; }
.footer-col ul li { margin-bottom: 10px; }
.social-links a { color: white; margin-right: 15px; font-size: 1.2rem; }
.social-links a:hover { color: var(--secondary-color); }
.footer-bottom { border-top: 1px solid #444; margin-top: 30px; padding-top: 20px; }

.alert { padding: 15px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 20px; text-align: center; }
EOT;
if (!is_dir('d:/Projects Template/introSite/public/css')) mkdir('d:/Projects Template/introSite/public/css', 0777, true);
file_put_contents('d:/Projects Template/introSite/public/css/style.css', $css);

// layouts/app.blade.php
$layout = <<<'EOT'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $global_settings['site_name'] ?? 'Bayan Group' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
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
            <a href="{{ route('home') }}">
                @if(isset($global_settings['site_logo']))
                    <img src="{{ asset('storage/' . $global_settings['site_logo']) }}" alt="Logo" class="logo">
                @else
                    <h2>BAYAN GROUP</h2>
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

    <footer>
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
                <div class="social-links">
                    @if(isset($social_links))
                        @foreach($social_links as $link)
                            <a href="{{ $link->url }}" target="_blank">{{ $link->platform }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Bayan Group. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
EOT;
file_put_contents($basePath . '/layouts/app.blade.php', $layout);

// home.blade.php
$home = <<<'EOT'
@extends('layouts.app')

@section('content')
<div class="hero">
    <h1>Welcome to Bayan Group</h1>
    <p>Empowering businesses with innovative solutions and top-tier divisions.</p>
    <a href="{{ route('contact') }}" class="btn">Get in Touch</a>
</div>

<div class="section">
    <h2>Our Divisions</h2>
    <div class="grid">
        @foreach($divisions as $division)
        <div class="card">
            @if($division->logo_path)
                <img src="{{ asset('storage/' . $division->logo_path) }}" alt="{{ $division->name }}">
            @endif
            <h3>{{ $division->name }}</h3>
            @if($division->url)
                <a href="{{ $division->url }}" class="btn" style="margin-top: 10px; font-size: 0.8rem; padding: 5px 10px;">Visit Website</a>
            @endif
        </div>
        @endforeach
    </div>
</div>

<div class="section" style="background: white;">
    <h2>Our Clients</h2>
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));">
        @foreach($clients as $client)
        <div class="card" style="padding: 15px;">
            @if($client->logo_path)
                <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}" style="max-width: 100%; margin: 0;">
            @endif
            <h4 style="margin-top:10px;">{{ $client->name }}</h4>
        </div>
        @endforeach
    </div>
</div>
@endsection
EOT;
file_put_contents($basePath . '/home.blade.php', $home);

// about.blade.php
$about = <<<'EOT'
@extends('layouts.app')

@section('content')
<div class="hero" style="background: var(--primary-color);">
    <h1>About Us</h1>
    <p>Discover our journey, our mission, and the team that drives our success.</p>
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
EOT;
file_put_contents($basePath . '/about.blade.php', $about);

// services.blade.php
$services = <<<'EOT'
@extends('layouts.app')

@section('content')
<div class="hero" style="background: var(--secondary-color);">
    <h1>Our Services</h1>
    <p>Comprehensive solutions tailored to meet your unique business needs.</p>
</div>

<div class="section">
    <div class="grid">
        @foreach($services as $service)
        <div class="card">
            @if($service->icon_path)
                <img src="{{ asset('storage/' . $service->icon_path) }}" alt="{{ $service->title }}" style="max-width: 80px;">
            @endif
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->description }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
EOT;
file_put_contents($basePath . '/services.blade.php', $services);

// contact.blade.php
$contact = <<<'EOT'
@extends('layouts.app')

@section('content')
<div class="hero">
    <h1>Contact Us</h1>
    <p>We would love to hear from you. Reach out to us for any inquiries.</p>
</div>

<div class="section">
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif
    
    <div class="contact-form">
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name">
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone">
            </div>
            <div class="form-group">
                <label>Message *</label>
                <textarea name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn" style="width: 100%;">Send Message</button>
        </form>
    </div>
</div>
@endsection
EOT;
file_put_contents($basePath . '/contact.blade.php', $contact);

echo "Frontend views generated successfully.";
