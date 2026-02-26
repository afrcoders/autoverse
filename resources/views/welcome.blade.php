<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blessed CJ Automobile | Original Car Parts in Lagos</title>
    <meta name="description" content="Blessed CJ Automobile deals in quality motor spare parts, accessories and upgrades from Ladipo Market, Lagos.">
    <meta name="theme-color" content="#0b1220">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Blessed CJ">
    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('brand-logo.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('icon-192.svg') }}">
    @if (file_exists(public_path('hot')) || file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('site.css') }}">
        <script defer src="{{ asset('site.js') }}"></script>
    @endif
</head>
<body>
    <header class="header">
        <div class="container nav-wrap">
            <a href="#top" class="brand" aria-label="Blessed CJ homepage">
                <img src="{{ asset('brand-logo.svg') }}" alt="Blessed CJ Auto Parts logo" class="brand-logo">
                <span class="brand-title">Blessed CJ Automobile</span>
            </a>
            <nav class="nav-actions">
                <a href="https://www.instagram.com/blessed_cj_automobile/?hl=en" target="_blank" rel="noopener" class="btn btn-ghost">Instagram</a>
                <a href="https://wa.me/2348160101258" target="_blank" rel="noopener" class="btn btn-primary">WhatsApp</a>
            </nav>
        </div>
    </header>

    <main id="top">
        <section class="hero">
            <div class="container hero-grid">
                <div>
                    <p class="pill">Original Car Parts Seller in Ladipo</p>
                    <h1>Quality Auto Parts, Accessories &amp; Upgrades</h1>
                    <p class="lead">
                        Trusted business service for all kinds of motor spare parts in Lagos. Quick responses on WhatsApp and delivery support available.
                    </p>
                    <div class="cta-row">
                        <a href="tel:+2348160101258" class="btn btn-primary">Call Now</a>
                        <a href="https://wa.me/2348160101258" target="_blank" rel="noopener" class="btn btn-outline">Chat on WhatsApp</a>
                    </div>
                    <p class="meta">Instagram: <a href="https://www.instagram.com/blessed_cj_automobile/?hl=en" target="_blank" rel="noopener">@blessed_cj_automobile</a></p>
                </div>
                <aside class="card profile-card">
                    <img src="{{ asset('brand-logo.svg') }}" alt="Blessed CJ emblem" class="profile-logo">
                    <h2>Blessed CJ Auto Parts</h2>
                    <p>Dealers in all kinds of motor spare parts, accessories and upgrades.</p>
                    <ul>
                        <li><strong>Phone 1:</strong> <a href="tel:+2348160101258">+234 816 010 1258</a></li>
                        <li><strong>Phone 2:</strong> <a href="tel:+2349076449922">+234 907 644 9922</a></li>
                        <li><strong>Address:</strong> 24 Olapeju Str, Ladipo Market, Mushin, Lagos, Nigeria</li>
                    </ul>
                </aside>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h2 class="section-title">What We Sell</h2>
                <div class="grid-3">
                    <article class="card">
                        <h3>Motor Spare Parts</h3>
                        <p>Original and reliable parts for different vehicle brands and models.</p>
                    </article>
                    <article class="card">
                        <h3>AC Components</h3>
                        <p>Car AC parts and related fittings for comfort and performance.</p>
                    </article>
                    <article class="card">
                        <h3>Accessories &amp; Upgrades</h3>
                        <p>Useful accessories including handles, catches and other auto fittings.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title">Products</h2>
                    <p>{{ $productSourceLabel }}</p>
                </div>
                <div class="products-grid">
                    @foreach ($products as $product)
                        <article class="product-card">
                            <a href="{{ $product['link'] }}" target="_blank" rel="noopener" class="product-thumb-wrap">
                                @if (!empty($product['video']))
                                    <video class="product-thumb" controls preload="metadata" playsinline muted>
                                        <source src="{{ $product['video'] }}" type="video/mp4">
                                        Your browser does not support video playback.
                                    </video>
                                @elseif (!empty($product['image']))
                                    <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="product-thumb">
                                @else
                                    <div class="product-thumb product-thumb--placeholder">
                                        <span>{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::limit($product['title'], 24, '')) }}</span>
                                    </div>
                                @endif
                            </a>
                            <div class="product-body">
                                <h3>{{ $product['title'] }}</h3>
                                <p>{{ $product['subtitle'] }}</p>
                                <a href="{{ $product['link'] }}" target="_blank" rel="noopener" class="product-link">Order on WhatsApp</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section alt">
            <div class="container contact-grid">
                <div>
                    <h2 class="section-title">Visit or Contact</h2>
                    <p>Ready to place an order? Reach out directly through any channel below.</p>
                    <div class="contact-list">
                        <a href="https://wa.me/2348160101258" target="_blank" rel="noopener" class="contact-item">WhatsApp: +234 816 010 1258</a>
                        <a href="tel:+2348160101258" class="contact-item">Call: +234 816 010 1258</a>
                        <a href="tel:+2349076449922" class="contact-item">Call: +234 907 644 9922</a>
                        <a href="https://maps.google.com/?q=24+Olapeju+Street,+Ladipo+Market,+Mushin,+Lagos,+Nigeria" target="_blank" rel="noopener" class="contact-item">24 Olapeju Str, Ladipo Market, Mushin, Lagos, Nigeria</a>
                        <a href="https://www.instagram.com/blessed_cj_automobile/?hl=en" target="_blank" rel="noopener" class="contact-item">Instagram Profile</a>
                    </div>
                </div>
                <aside class="card install-card">
                    <h3>Install as an App</h3>
                    <p>This website works as a PWA. On supported devices, use your browser menu and tap <strong>Add to Home Screen</strong>.</p>
                </aside>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-wrap">
            <p>&copy; {{ date('Y') }} Blessed CJ Automobile. All rights reserved.</p>
            <a href="https://www.instagram.com/blessed_cj_automobile/?hl=en" target="_blank" rel="noopener">Follow on Instagram</a>
        </div>
    </footer>
</body>
</html>
