@extends('layouts.app')

@section('content')
<style>
/* Hero Section */
.contact-hero {
    background: linear-gradient(rgba(15, 32, 55, 0.85), rgba(15, 32, 55, 0.9)), url('https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?q=80&w=2069&auto=format&fit=crop');
    background-size: cover;
    background-position: center;
    padding: 140px 20px;
    text-align: center;
    color: white;
}
.contact-hero h1 {
    font-size: 2.8rem;
    font-weight: 400;
    margin-bottom: 20px;
    color: white;
}
.contact-hero p {
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
    color: rgba(255,255,255,0.9);
    line-height: 1.6;
}

/* Info Cards */
.contact-info-section {
    padding: 80px 20px;
    background: white;
    max-width: 1200px;
    margin: 0 auto;
}
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    text-align: center;
    position: relative;
}
.info-card {
    padding: 20px;
    position: relative;
}
.info-icon {
    font-size: 2.5rem;
    color: #3b71ca;
    margin-bottom: 20px;
}
.info-card h4 {
    font-size: 1.1rem;
    color: #444;
    margin-bottom: 15px;
    font-weight: 400;
}
.info-card p {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.8;
}

/* Form Section */
.form-section {
    padding: 60px 20px 40px 20px;
    background-color: #ffffff;
    text-align: center;
}
.form-header {
    margin-bottom: 0;
}
.form-header h2 {
    color: #4b7bb3;
    font-size: 2.2rem;
    font-weight: 300;
    margin-bottom: 20px;
}
.form-header p {
    color: #555;
    font-size: 1.05rem;
    max-width: 900px;
    margin: 0 auto;
    line-height: 1.7;
}

.contact-form-wrapper {
    background-color: #eef1f6;
    padding: 60px 20px 80px 20px;
}
.form-card {
    background: white;
    max-width: 800px;
    margin: 0 auto;
    padding: 50px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    text-align: left;
}
.form-card h3 {
    text-align: center;
    font-size: 2.2rem;
    font-family: serif;
    color: #333;
    margin-bottom: 40px;
    padding-bottom: 25px;
    border-bottom: 1px solid #eaeaea;
}

.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 0;
}
.form-col {
    flex: 1;
}
.form-group-custom {
    margin-bottom: 25px;
}
.form-group-custom label {
    display: block;
    margin-bottom: 10px;
    color: #222;
    font-weight: 600;
    font-size: 0.95rem;
}
.input-with-icon {
    position: relative;
}
.input-with-icon i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
}
.input-with-icon input {
    padding-left: 45px !important;
}
.form-control {
    width: 100%;
    padding: 14px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box;
    transition: border-color 0.3s;
    color: #333;
}
.form-control:focus {
    outline: none;
    border-color: #3b71ca;
}
textarea.form-control {
    resize: vertical;
}
.form-control::placeholder {
    color: #aaa;
    font-size: 0.9rem;
}

.phone-input-wrapper {
    display: flex;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
    background: white;
}
.phone-input-wrapper:focus-within {
    border-color: #3b71ca;
}
.phone-input-wrapper .country-code {
    background: #f8f9fa;
    padding: 14px 15px;
    border-right: 1px solid #ddd;
    display: flex;
    align-items: center;
    gap: 10px;
    color: #333;
    font-size: 0.95rem;
}
.phone-input-wrapper input {
    border: none;
    flex: 1;
    border-radius: 0;
}
.phone-input-wrapper input:focus {
    border: none;
    box-shadow: none;
}

.submit-btn {
    background: #f5f5f5;
    color: #666;
    border: 1px solid #ddd;
    padding: 16px 30px;
    font-size: 1.1rem;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-weight: 600;
    transition: all 0.3s;
    margin-top: 10px;
}
.submit-btn:hover {
    background: #3b71ca;
    color: white;
    border-color: #3b71ca;
}
</style>

<div class="contact-hero">
    <h1>Connect with Bayan Group</h1>
    <p>Whether you're exploring partnership, training, or technology solutions — we're here to help.</p>
</div>

<div class="contact-info-section">
    <div class="info-grid">
        <!-- Card 1 -->
        <div class="info-card">
            <div class="info-icon"><i class="fa-regular fa-envelope"></i></div>
            <h4>{{ $global_settings['contact_email'] ?? 'info@bayangroup.net' }}</h4>
            <p>Have a project or idea you'd like to explore?<br>Reach out to our team and let's discuss how Bayan Group can help turn your vision into measurable growth.</p>
        </div>
        
        <!-- Card 2 -->
        <div class="info-card">
            <div class="info-icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
            <h4>{{ $global_settings['contact_phone'] ?? '(+20) 1270432222' }}</h4>
            <p>Prefer to speak directly?<br>Call us to connect with our specialists and discover how Bayan Group can support your next step forward.</p>
        </div>
        
        <!-- Card 3 -->
        <div class="info-card">
            <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
            <h4>{{ $global_settings['contact_address'] ?? '81 Mustafa El Nahas St., Nasr City, Cairo - Egypt' }}</h4>
            <p>Visit us at our headquarters, where ideas, strategy, and innovation come together to drive meaningful impact.</p>
        </div>
    </div>
</div>

<div class="form-section">
    <div class="form-header">
        <h2>Need Professional Help? We've Got You Covered!</h2>
        <p>We're here to help you move your business forward. Tell us what you're working on or what you need support with — and our specialists will get back to you within one business day.</p>
    </div>
</div>

<div class="contact-form-wrapper">
    <div class="form-card">
        <h3>Contact Us</h3>
        
        @if(session('success'))
            <div style="padding: 15px; background: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            
            <div class="form-group-custom">
                <label>Name</label>
                <div class="form-row">
                    <div class="form-col">
                        <div class="input-with-icon">
                            <i class="fa-regular fa-user"></i>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="form-col">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                    </div>
                </div>
            </div>
            
            <div class="form-group-custom">
                <label>Email</label>
                <div class="input-with-icon">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group-custom">
                <label>Phone</label>
                <div class="phone-input-wrapper">
                    <div class="country-code">
                        <img src="https://flagcdn.com/w20/eg.png" alt="Egypt Flag" style="width: 20px; box-shadow: 0 0 2px rgba(0,0,0,0.2);"> +20 <i class="fa-solid fa-caret-down" style="font-size: 0.8rem; margin-left: 5px;"></i>
                    </div>
                    <input type="text" name="phone" class="form-control" style="border: none;">
                </div>
            </div>
            
            <div class="form-group-custom">
                <label>Your Message</label>
                <textarea name="message" class="form-control" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
</div>
@endsection