@extends('layouts.app')

@section('title', 'Contact — Blessed CJ Automobile')

@section('content')
{{-- ===== HERO ===== --}}
<section class="contact-hero">
    <div class="container">
        <span class="pill">Get in Touch</span>
        <h1>We'd Love to Hear From You</h1>
        <p class="muted">Send us a message and we'll respond on WhatsApp within minutes during business hours.</p>
    </div>
</section>

{{-- ===== MAIN CONTENT ===== --}}
<section class="section">
    <div class="container contact-layout">

        {{-- LEFT: Form --}}
        <div class="contact-form-wrap card">
            <h2>Send a Message</h2>
            <p class="muted">Fill in the form below. It opens a pre-filled WhatsApp message so you can send it directly.</p>

            <form id="waForm" class="wa-form" data-wa-form>
                <div class="form-row">
                    <label class="form-group">
                        <span class="form-label">Your Name</span>
                        <input type="text" name="name" placeholder="e.g. John Doe" required>
                    </label>
                    <label class="form-group">
                        <span class="form-label">Phone Number</span>
                        <input type="tel" name="phone" placeholder="e.g. 0816 010 1258">
                    </label>
                </div>

                <label class="form-group">
                    <span class="form-label">Car Make &amp; Model</span>
                    <input type="text" name="car" placeholder="e.g. Toyota Camry 2020">
                </label>

                <label class="form-group">
                    <span class="form-label">Part / Service Needed</span>
                    <input type="text" name="part" placeholder="e.g. AC compressor, brake pad" required>
                </label>

                <label class="form-group">
                    <span class="form-label">Additional Details</span>
                    <textarea name="details" rows="4" placeholder="Anything else we should know — photos can be shared on WhatsApp after."></textarea>
                </label>

                <button type="submit" class="btn btn-primary btn-lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12.05 21.785c-1.86 0-3.68-.5-5.27-1.447l-.378-.224-3.918 1.027 1.046-3.822-.247-.393A9.71 9.71 0 012.24 12.04c0-5.39 4.384-9.775 9.775-9.775a9.72 9.72 0 016.912 2.864 9.72 9.72 0 012.864 6.912c-.004 5.39-4.388 9.775-9.78 9.775zm0-21.56C5.438.225.225 5.438.225 12.04c0 2.084.544 4.12 1.58 5.92L.05 24l6.2-1.625A11.8 11.8 0 0012.05 24c6.6 0 11.975-5.375 11.975-11.975S18.65.225 12.05.225z"/></svg>
                    Send via WhatsApp
                </button>
            </form>
        </div>

        {{-- RIGHT: Info + Map --}}
        <div class="contact-info-col">
            {{-- Map --}}
            <div class="contact-map-wrap card">
                <iframe
                    class="contact-map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.612!2d3.3556!3d6.5339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8d7b1d370a4d%3A0x6a3c9e7e82e0b7a!2sLadipo%20Market%2C%20Mushin%2C%20Lagos!5e0!3m2!1sen!2sng!4v1"
                    width="100%"
                    height="260"
                    style="border:0; border-radius: var(--radius-md);"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Blessed CJ Automobile location">
                </iframe>
                <div class="map-overlay-info">
                    <strong>24 Olapeju Street</strong>
                    <span>Ladipo Market, Mushin, Lagos</span>
                </div>
            </div>

            {{-- Info Cards --}}
            <div class="contact-info-grid">
                <article class="contact-info-card card">
                    <div class="info-icon">📞</div>
                    <div>
                        <h4>Call Us</h4>
                        <a href="tel:+2348160101258">+234 816 010 1258</a>
                        <a href="tel:+2349076449922">+234 907 644 9922</a>
                    </div>
                </article>

                <article class="contact-info-card card">
                    <div class="info-icon">💬</div>
                    <div>
                        <h4>WhatsApp</h4>
                        <a href="https://wa.me/2348160101258" target="_blank" rel="noopener">Chat now →</a>
                    </div>
                </article>

                <article class="contact-info-card card">
                    <div class="info-icon">📸</div>
                    <div>
                        <h4>Instagram</h4>
                        <a href="https://www.instagram.com/blessed_cj_automobile/?hl=en" target="_blank" rel="noopener">@blessed_cj_automobile</a>
                    </div>
                </article>

                <article class="contact-info-card card">
                    <div class="info-icon">🕐</div>
                    <div>
                        <h4>Business Hours</h4>
                        <span>Mon – Sat: 8 AM – 6 PM</span>
                    </div>
                </article>
            </div>
        </div>

    </div>
</section>

{{-- ===== HOW TO ORDER ===== --}}
<section class="section section-alt">
    <div class="container">
        <h2 class="section-title text-center" style="margin-bottom:var(--sp-8)">How to Order</h2>
        <div class="order-steps">
            <div class="step-card">
                <div class="step-num">1</div>
                <h4>Tell Us What You Need</h4>
                <p>Use the form above or send a WhatsApp message with the part name, car make, and model year.</p>
            </div>
            <div class="step-card">
                <div class="step-num">2</div>
                <h4>Get Confirmation</h4>
                <p>We check availability and send you pricing and delivery options within minutes.</p>
            </div>
            <div class="step-card">
                <div class="step-num">3</div>
                <h4>Pay &amp; Receive</h4>
                <p>Complete payment and we arrange pickup or delivery to your location.</p>
            </div>
        </div>
    </div>
</section>
@endsection
