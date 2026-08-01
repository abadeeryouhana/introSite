@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endpush

@section('content')
<div class="blog-details-hero">
    <div class="category">{{ $blog->category ? $blog->category->name : 'Uncategorized' }}</div>
    <h1 style="color: white;">{{ $blog->title }}</h1>
    <div class="date"><i class="fa-regular fa-calendar"></i> {{ $blog->created_at->format('F d, Y') }}</div>
</div>

@if($blog->image)
<div class="blog-details-image" style="max-width: 700px;">
    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-height: 400px; width: 100%; object-fit: cover;">
</div>
@else
<div style="height: 50px;"></div>
@endif

<div class="blog-details-content">
    @if($blog->sub_title)
        <p style="font-size: 1.4rem; color: #555; font-weight: 300; margin-bottom: 40px; text-align: center; font-style: italic;">
            {{ $blog->sub_title }}
        </p>
    @endif
    
    <div class="ck-content">
        {!! $blog->content !!}
    </div>
</div>

<div style="text-align: center; margin-bottom: 80px;">
    <a href="{{ route('blog') }}" style="background-color: #3b71ca; color: white; padding: 14px 40px; border-radius: 30px; font-weight: 600; text-decoration: none; display: inline-block; transition: background 0.3s, transform 0.3s; font-size: 1.05rem;" onmouseover="this.style.backgroundColor='#285ba3'; this.style.transform='translateY(-3px)'" onmouseout="this.style.backgroundColor='#3b71ca'; this.style.transform='translateY(0)'">&larr; Back to Blog</a>
</div>
@endsection
