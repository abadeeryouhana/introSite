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