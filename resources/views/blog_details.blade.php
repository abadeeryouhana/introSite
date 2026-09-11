@extends('layouts.app')

@section('seo_title', $blog->title . ' | ' . ($global_settings['site_name'] ?? 'Bayan Group'))
@section('seo_description', Str::limit(strip_tags($blog->sub_title ?: $blog->content), 155))
@section('seo_keywords', ($blog->category ? $blog->category->name . ', ' : '') . 'Bayan Group, business insights, ' . strtolower($blog->title))
@section('og_type', 'article')
@if($blog->image)
    @section('og_image', asset('storage/' . $blog->image))
    @section('twitter_image', asset('storage/' . $blog->image))
@endif

@section('schema_markup')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "{{ addslashes($blog->title) }}",
    "description": "{{ addslashes(Str::limit(strip_tags($blog->sub_title ?: $blog->content), 155)) }}",
    @if($blog->image)
    "image": "{{ asset('storage/' . $blog->image) }}",
    @endif
    "datePublished": "{{ $blog->created_at->toIso8601String() }}",
    "dateModified": "{{ $blog->updated_at->toIso8601String() }}",
    "author": {
        "@type": "Organization",
        "name": "{{ $global_settings['site_name'] ?? 'Bayan Group' }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ $global_settings['site_name'] ?? 'Bayan Group' }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ isset($global_settings['site_logo']) ? asset('storage/' . $global_settings['site_logo']) : asset('favicon.ico') }}"
        }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ route('blog.details', $blog->id) }}"
    }
}
</script>
@endsection

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
