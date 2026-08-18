@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}?v={{ filemtime(public_path('css/blog.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}?v={{ filemtime(public_path('css/components.css')) }}">
@endpush

@section('content')
<div class="sb-hero">
    <div class="sb-waves">
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
        <div class="sb-wave"></div>
    </div>
    
    <div class="sb-hero-content">
        <div class="sb-breadcrumb">HOME / <span>BLOG</span></div>
        <div class="sb-subtitle">BLOG</div>
        <h1 class="sb-title">Insights and <span>Perspectives.</span></h1>
        <p class="sb-desc">Thoughts, strategies, and updates from the Bayan Group team.</p>
    </div>
</div>

<div class="sb-nav-bar">
    <div class="sb-nav-container">
        <button class="sb-nav-pill active" data-filter="all" onclick="filterBlog(event, 'all', this)">
            All Posts
        </button>
        @foreach($categories as $category)
            <button class="sb-nav-pill" data-filter="{{ $category->id }}" onclick="filterBlog(event, '{{ $category->id }}', this)">
                {{ $category->name }}
            </button>
        @endforeach
    </div>
</div>

<div class="blog-section" style="background-color: #f8f9fa;">
    @if($blogs->count() > 0)
        <div class="blog-grid">
            @foreach($blogs as $blog)
                <a href="{{ route('blog.details', $blog->id) }}" class="blog-card blog-item animate-fade-up" data-category-id="{{ $blog->category ? $blog->category->id : 'none' }}">
                    <div class="blog-image" style="background-image: url('{{ $blog->image ? asset('storage/' . $blog->image) : '' }}');"></div>
                    <div class="blog-content">
                        <div class="blog-category-tag">{{ $blog->category ? $blog->category->name : 'Uncategorized' }}</div>
                        <h3 class="blog-card-title">{{ $blog->title }}</h3>
                        <div class="blog-date">{{ $blog->created_at->format('M d, Y') }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div style="text-align: center; padding: 50px;">
            <h3 style="color: #555; font-weight: 600;">No blogs available yet.</h3>
        </div>
    @endif
</div>

@push('scripts')
<script>
    function filterBlog(event, categoryId, element) {
        event.preventDefault();
        
        // Update pills
        document.querySelectorAll('.sb-nav-pill').forEach(pill => pill.classList.remove('active'));
        element.classList.add('active');
        
        // Update cards visibility
        const cards = document.querySelectorAll('.blog-item');
        cards.forEach(card => {
            if (categoryId === 'all') {
                card.style.display = 'flex';
            } else {
                if (card.dataset.categoryId === categoryId) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    }
</script>
@endpush
@endsection
