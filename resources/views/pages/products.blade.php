@extends('layouts.app')

@section('title', 'Product Catalog — Blessed CJ Automobile')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-head">
            <h1 class="section-title">Product Catalog</h1>
            <p class="muted">{{ $totalCount }} items available</p>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="filter-form card">
            <div class="filter-grid">
                <label>
                    Search
                    <input type="text" name="q" value="{{ $filters['q'] }}" placeholder="Part name, code or keyword…">
                </label>

                <label>
                    Media Type
                    <select name="type">
                        <option value="all" {{ $filters['type'] === 'all' ? 'selected' : '' }}>All Types</option>
                        <option value="image" {{ $filters['type'] === 'image' ? 'selected' : '' }}>Images</option>
                        <option value="video" {{ $filters['type'] === 'video' ? 'selected' : '' }}>Videos</option>
                    </select>
                </label>

                <label>
                    Category
                    <select name="category">
                        <option value="all" {{ $filters['category'] === 'all' ? 'selected' : '' }}>All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ $filters['category'] === $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </label>

                <div class="filter-actions">
                    <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                    <a href="{{ route('products.index') }}" class="btn btn-ghost btn-sm">Reset</a>
                </div>
            </div>
        </form>

        <div class="products-grid products-page-grid">
            @forelse($products as $product)
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
            @empty
                <div class="card" style="grid-column:1/-1">
                    <p class="text-center text-muted">No products match your current filters.</p>
                </div>
            @endforelse
        </div>

        @if($products->lastPage() > 1)
            <nav class="pager" aria-label="Product pagination">
                @if($products->onFirstPage())
                    <span class="pager-link disabled">← Prev</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="pager-link">← Prev</a>
                @endif

                @for($page = max(1, $products->currentPage() - 2); $page <= min($products->lastPage(), $products->currentPage() + 2); $page++)
                    <a href="{{ $products->url($page) }}" class="pager-link {{ $products->currentPage() === $page ? 'active' : '' }}">{{ $page }}</a>
                @endfor

                @if($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="pager-link">Next →</a>
                @else
                    <span class="pager-link disabled">Next →</span>
                @endif
            </nav>
        @endif
    </div>
</section>
@endsection
