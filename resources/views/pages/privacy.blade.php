@extends('layouts.app')

@section('title', 'Privacy Policy — Blessed CJ Automobile')

@section('content')
<section class="section">
    <div class="container legal-wrap card">
        <h1 class="section-title">Privacy Policy</h1>
        <p class="muted">Last updated: {{ date('F j, Y') }}</p>

        <h3>Information We Receive</h3>
        <p>We may receive your name, phone number, and order details when you contact us through WhatsApp, phone calls, or social media.</p>

        <h3>How We Use It</h3>
        <p>We use this information to respond to inquiries, confirm product availability, process orders, and provide customer support.</p>

        <h3>Data Sharing</h3>
        <p>We do not sell personal data. Information may be shared only when required to fulfill delivery or comply with legal obligations.</p>

        <h3>Retention</h3>
        <p>Communication records may be kept for service quality, order reference, and dispute resolution.</p>

        <h3>Contact</h3>
        <p>For privacy-related questions, contact us via <a href="https://wa.me/2348160101258" target="_blank" rel="noopener" class="text-gold">WhatsApp</a>.</p>
    </div>
</section>
@endsection
