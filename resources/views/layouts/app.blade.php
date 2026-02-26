<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Blessed CJ Automobile')</title>
    <meta name="description" content="Blessed CJ Automobile — original spare parts, accessories and upgrades from Ladipo Market, Lagos.">
    <meta name="theme-color" content="#f4f1ec" id="meta-theme-color">
    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('brand-logo.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('icon-192.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site.css') }}">
    {{-- No-flash: apply saved theme before first paint --}}
    <script>
        (function(){
            var t = localStorage.getItem('theme');
            if (t === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
                var m = document.getElementById('meta-theme-color');
                if (m) m.content = '#0b0f19';
            }
        })();
    </script>
    <script defer src="{{ asset('site.js') }}"></script>
</head>
<body>
<header class="header">
    <div class="container nav-wrap">
        <a href="{{ route('home') }}" class="brand" aria-label="Blessed CJ homepage">
            <img src="{{ asset('brand-logo.svg') }}" alt="Blessed CJ Auto Parts logo" class="brand-logo">
            <span class="brand-title">Blessed CJ Auto</span>
        </a>

        <button class="nav-toggle" aria-label="Toggle menu" data-nav-toggle>☰</button>

        <nav class="main-nav" aria-label="Main navigation" data-main-nav>
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'active' : '' }}">Products</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            <a href="{{ route('privacy') }}" class="{{ request()->routeIs('privacy') ? 'active' : '' }}">Privacy</a>
        </nav>

        <div class="nav-actions">
            <button class="theme-toggle" data-theme-toggle aria-label="Toggle theme">
                <span class="theme-icon-light" aria-hidden="true">☀️</span>
                <span class="theme-icon-dark" aria-hidden="true">🌙</span>
            </button>
            <a href="https://www.instagram.com/blessed_cj_automobile/?hl=en" target="_blank" rel="noopener" class="btn btn-ghost btn-sm">IG</a>
            <a href="https://wa.me/2348160101258" target="_blank" rel="noopener" class="btn btn-primary btn-sm">WhatsApp</a>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="footer-rich">
    <div class="container footer-grid">
        <section>
            <h4>Blessed CJ Automobile</h4>
            <p>Trusted source for original spare parts, accessories and performance upgrades — Ladipo Market, Mushin, Lagos.</p>
            <div class="footer-social">
                <a href="https://www.instagram.com/blessed_cj_automobile/?hl=en" target="_blank" rel="noopener">Instagram</a>
                <a href="https://wa.me/2348160101258" target="_blank" rel="noopener">WhatsApp</a>
            </div>
        </section>

        <section>
            <h4>Pages</h4>
            <ul>
                <li><a href="{{ route('home') }}">Homepage</a></li>
                <li><a href="{{ route('products.index') }}">Product Catalog</a></li>
                <li><a href="{{ route('contact') }}">Contact &amp; Support</a></li>
                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
            </ul>
        </section>

        <section>
            <h4>Reach Us</h4>
            <ul>
                <li><a href="tel:+2348160101258">+234 816 010 1258</a></li>
                <li><a href="tel:+2349076449922">+234 907 644 9922</a></li>
                <li>24 Olapeju Street, Ladipo Market, Mushin, Lagos</li>
                <li><a href="https://maps.google.com/?q=24+Olapeju+Street,+Ladipo+Market,+Mushin,+Lagos,+Nigeria" target="_blank" rel="noopener">View on Google Maps →</a></li>
            </ul>
        </section>

        <section>
            <h4>Quick Order</h4>
            <p>Send the part name, car make &amp; model year on WhatsApp — get a quote in minutes.</p>
            <a href="https://wa.me/2348160101258" target="_blank" rel="noopener" class="btn btn-outline btn-sm">Chat on WhatsApp</a>
        </section>
    </div>

    <div class="container footer-bottom">
        <p>&copy; {{ date('Y') }} Blessed CJ Automobile. All rights reserved.</p>
        <p>Lagos, Nigeria — Auto spare parts &amp; accessories</p>
    </div>
</footer>
</body>
</html>
