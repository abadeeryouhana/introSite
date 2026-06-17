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