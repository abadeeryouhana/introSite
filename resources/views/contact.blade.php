@extends('layouts.app')

@section('content')


<div class="contact-hero">
    <div class="contact-hero-content">
        <div class="breadcrumbs">
            <a href="/">HOME</a> / <span class="current">CONTACT</span>
        </div>
        <div class="section-label">CONTACT</div>
        <h1>Let's talk. <span class="highlight">Every time zone covered.</span></h1>
        <p>Three offices. One team. Get in touch — we'll route your message to the right practice lead within one business day.</p>
    </div>
    <div class="hero-waves"></div>
</div>

<div class="contact-page-content container section">


    <div class="contact-two-column">
        <!-- Left: Form -->
        <div class="contact-form-side">
            <div class="form-card-new">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    
                    <div class="form-row-new">
                        <div class="form-group-new">
                            <label>NAME *</label>
                            <input type="text" name="first_name" required>
                        </div>
                        <div class="form-group-new">
                            <label>EMAIL *</label>
                            <input type="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-row-new">
                        <div class="form-group-new">
                            <label>PHONE</label>
                            <input type="text" name="phone">
                        </div>
                        <div class="form-group-new">
                            <label>COMPANY</label>
                            <input type="text" name="company">
                        </div>
                    </div>

                    <div class="form-row-new">
                        <div class="form-group-new">
                            <label>TITLE</label>
                            <input type="text" name="title">
                        </div>
                        <div class="form-group-new">
                            <label>SERVICE</label>
                            <select name="service">
                                <option value="">Select Service...</option>
                                @foreach($services as $svc)
                                    <option value="{{ $svc->title }}">{{ $svc->title }}</option>
                                @endforeach
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group-new" style="margin-bottom: 20px;">
                        <label>MESSAGE *</label>
                        <textarea name="message" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn-submit-new">Send Message &rarr;</button>
                </form>
            </div>
        </div>

        <!-- Right: Locations -->
        <div class="contact-locations-side">
            @if(!empty($global_settings['contact_phone_1']))
            <div class="location-card">
                <div class="location-label"><span>HEADQUARTERS</span></div>
                <h3>{{ $global_settings['contact_title_1'] ?? 'Cairo' }}</h3>
                <p>{{ $global_settings['contact_phone_1'] }}</p>
            </div>
            @endif
            
            @if(!empty($global_settings['contact_phone_2']))
            <div class="location-card">
                <div class="location-label"><span>REGIONAL OFFICE</span></div>
                <h3>{{ $global_settings['contact_title_2'] ?? 'Muscat' }}</h3>
                <p>{{ $global_settings['contact_phone_2'] }}</p>
            </div>
            @endif

            @if(!empty($global_settings['contact_phone_3']))
            <div class="location-card">
                <div class="location-label"><span>AMERICAS OFFICE</span></div>
                <h3>{{ $global_settings['contact_title_3'] ?? 'Florida' }}</h3>
                <p>{{ $global_settings['contact_phone_3'] }}</p>
            </div>
            @endif

            <div class="map-placeholder" id="locations-map">
                <!-- Leaflet map will be injected here -->
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('locations-map', {
            zoomControl: false,
            scrollWheelZoom: false
        }).setView([25.0, 5.0], 2); 
        
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var bounds = [];

        @if(!empty($global_settings['contact_phone_1']))
        L.marker([30.0444, 31.2357]).addTo(map).bindPopup('<b>{{ $global_settings["contact_title_1"] ?? "Cairo" }}</b><br>Headquarters');
        bounds.push([30.0444, 31.2357]);
        @endif

        @if(!empty($global_settings['contact_phone_2']))
        L.marker([23.5859, 58.4059]).addTo(map).bindPopup('<b>{{ $global_settings["contact_title_2"] ?? "Muscat" }}</b><br>Regional Office');
        bounds.push([23.5859, 58.4059]);
        @endif

        @if(!empty($global_settings['contact_phone_3']))
        L.marker([27.9944, -81.7603]).addTo(map).bindPopup('<b>{{ $global_settings["contact_title_3"] ?? "Florida" }}</b><br>Americas Office');
        bounds.push([27.9944, -81.7603]);
        @endif

        if (bounds.length > 0) {
            map.fitBounds(bounds, {padding: [30, 30], maxZoom: 5});
        }
    });
</script>
@endsection