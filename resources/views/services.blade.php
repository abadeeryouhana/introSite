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