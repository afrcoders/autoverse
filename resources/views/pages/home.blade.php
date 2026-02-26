@extends('layouts.app')

@section('title', 'Blessed CJ Automobile — Original Car Parts in Lagos')

@section('content')
{{-- ===== HERO ===== --}}
<section class="hero-banner">
    <div class="container hero-banner-grid">
        <div class="hero-copy">
            <span class="pill">Ladipo Market, Lagos</span>
            <h1>Original Spare Parts for Every Vehicle Model</h1>
            <p>Engine parts, AC components, suspension, electrical fittings and accessories — sourced and supplied with trusted support from our Lagos store.</p>
            <div class="cta-row">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Browse Catalog</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">Get in Touch</a>
            </div>
        </div>

        <div class="hero-slider" data-slider>
            <div class="hero-slider-track" data-slider-track>
                @forelse($featuredSlides as $slide)
                    <article class="hero-slide" data-slide>
                        @if(!empty($slide['video']))
                            <video class="hero-slide-media" autoplay muted loop playsinline preload="metadata">
                                <source src="{{ $slide['video'] }}" type="video/mp4">
                            </video>
                        @elseif(!empty($slide['image']))
                            <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}" class="hero-slide-media">
                        @endif
                        <div class="hero-slide-caption">
                            <h3>{{ $slide['title'] }}</h3>
                            <p>{{ $slide['subtitle'] }}</p>
                        </div>
                    </article>
                @empty
                    <article class="hero-slide" data-slide>
                        <div class="hero-slide-media hero-slide-empty">Upload media to public/assets/instagram</div>
                        <div class="hero-slide-caption">
                            <h3>No media yet</h3>
                            <p>Add product images or videos to populate the slider.</p>
                        </div>
                    </article>
                @endforelse
            </div>
            <button class="slider-btn prev" data-slider-prev aria-label="Previous slide">‹</button>
            <button class="slider-btn next" data-slider-next aria-label="Next slide">›</button>
            <div class="slider-dots" data-slider-dots></div>
        </div>
    </div>
</section>

{{-- ===== FEATURED + SIDEBAR ===== --}}
<section class="section">
    <div class="container home-split">
        <div>
            <div class="section-head">
                <h2 class="section-title">Featured Products</h2>
                <a href="{{ route('products.index') }}" class="product-link">View all</a>
            </div>

            <div class="products-grid">
                @foreach($latestProducts as $product)
                    <article class="product-card">
                        <a href="{{ $product['link'] }}" target="_blank" rel="noopener" class="product-thumb-wrap">
                            @if(!empty($product['image']))
                                <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="product-thumb" loading="lazy">
                            @else
                                <div class="product-thumb product-thumb--placeholder"><span>{{ $product['title'] }}</span></div>
                            @endif
                        </a>
                        <div class="product-body">
                            <span class="badge">{{ $product['category'] }}</span>
                            <h3>{{ $product['title'] }}</h3>
                            <p>{{ $product['subtitle'] }}</p>
                            <a href="{{ $product['link'] }}" target="_blank" rel="noopener" class="product-link">Order via WhatsApp</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <aside class="card sidebar-feed">
            <h3 class="section-title" style="font-size:var(--fs-md)">Instagram Feed</h3>
            <p class="muted mt-4">Recent media from our uploaded content.</p>
            <div class="sidebar-grid">
                @foreach($sidebarItems as $item)
                    <a href="{{ $item['link'] }}" target="_blank" rel="noopener" class="sidebar-tile" title="{{ $item['title'] }}">
                        @if(!empty($item['image']))
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" loading="lazy">
                        @else
                            <span>{{ $item['type'] }}</span>
                        @endif
                    </a>
                @endforeach
            </div>
            <a href="https://www.instagram.com/blessed_cj_automobile/?hl=en" target="_blank" rel="noopener" class="btn btn-ghost btn-sm feed-btn">View Instagram →</a>
        </aside>
    </div>
</section>

{{-- ===== CTA CARDS ===== --}}
<section class="section section-alt">
    <div class="container quick-links">
        <article class="card">
            <h3>Looking for a specific part?</h3>
            <p>Send the car make, model year, and part name — we'll respond with availability and pricing.</p>
            <a href="https://wa.me/2348160101258" class="btn btn-primary btn-sm" target="_blank" rel="noopener">Chat on WhatsApp</a>
        </article>
        <article class="card">
            <h3>Business &amp; Support Info</h3>
            <p>Address, phone numbers, opening hours, and ordering process are available on our contact page.</p>
            <a href="{{ route('contact') }}" class="btn btn-outline btn-sm">Go to Contact</a>
        </article>
    </div>
</section>
@endsection
