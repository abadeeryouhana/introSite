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