@extends('layouts.app')
@section('title', 'Contact Us — Mr. Maintenance Varanasi')
@section('content')

<div class="page-hero">
    <div class="container">
        <h1>Contact <span style="color:var(--orange)">Us</span></h1>
        <p>We're always here to help. Reach out anytime.</p>
    </div>
</div>

<section class="section-pad">
    <div class="container">
        <div class="row g-5">
            {{-- Contact Info --}}
            <div class="col-lg-4" data-aos="fade-right">
                <div class="contact-info-card">
                    <h3 style="color:#fff;font-weight:700;margin-bottom:2rem;">Get In Touch</h3>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <div class="contact-info-label">Address</div>
                            <div class="contact-info-value">SA 4/4-3 Pandeypur Daulatpur, Varanasi, UP 221002</div>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <div class="contact-info-label">Phone</div>
                            <a href="tel:+918858448111" class="contact-info-value">+91 8858448111</a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <div class="contact-info-label">Email</div>
                            <a href="mailto:{{ $siteEmail }}" class="contact-info-value">{{ $siteEmail }}</a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fab fa-whatsapp"></i></div>
                        <div>
                            <div class="contact-info-label">WhatsApp</div>
                            <a href="{{ $whatsappLink }}" target="_blank" class="contact-info-value">Chat on WhatsApp</a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fab fa-facebook-f"></i></div>
                        <div>
                            <div class="contact-info-label">Facebook</div>
                            <a href="{{ $facebookLink }}" target="_blank" class="contact-info-value">Follow Us</a>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Contact Form --}}
            <div class="col-lg-8" data-aos="fade-left">
                <div class="form-card">
                    <h3 style="font-weight:800;margin-bottom:1.5rem;">Send Us a Message</h3>
                    <form action="{{ route('contact.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="contact_name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="contact_name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Full Name" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="contact_email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="contact_email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="your@email.com" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label for="contact_phone" class="form-label">Phone Number</label>
                                <input type="tel" name="phone" id="contact_phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" placeholder="10-digit mobile number">
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label for="contact_message" class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea name="message" id="contact_message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                    placeholder="How can we help you?..." required>{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <button type="submit" class="btn-submit mt-4" id="submit-contact-btn">
                            <i class="fas fa-paper-plane me-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Google Maps --}}
        <div class="mt-5 map-container" data-aos="fade-up">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.2!2d82.9739!3d25.3176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2db76febcf4b%3A0x85b0f5542af9c3c3!2sPandeypur%2C%20Varanasi%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1600000000000"
                width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" title="Mr. Maintenance Location">
            </iframe>
        </div>
    </div>
</section>
@endsection
