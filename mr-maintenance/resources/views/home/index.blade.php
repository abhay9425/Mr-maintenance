@extends('layouts.app')

@section('title', 'Mr. Maintenance — Your Trusted Home Maintenance Partner in Varanasi')

@section('content')

{{-- HERO --}}
<section class="hero-section" id="hero">
    <div class="container position-relative" style="z-index:2;">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-badge">
                    <i class="fas fa-shield-alt"></i> Trusted Home Services in Varanasi
                </div>
                <h1 class="hero-title">
                    Your Trusted <span>Home Maintenance</span> Partner
                </h1>
                <p class="hero-subtitle">Complete home maintenance solutions at your doorstep. Verified technicians, transparent pricing, same-day service across Varanasi.</p>
                <div class="hero-btns">
                    <a href="{{ route('book') }}" class="btn-hero-primary">
                        <i class="fas fa-calendar-alt"></i> Book a Service
                    </a>
                    <a href="{{ $whatsappLink }}" target="_blank" class="btn-hero-secondary">
                        <i class="fab fa-whatsapp"></i> WhatsApp Us
                    </a>
                </div>
                @if($lastService)
                <div class="mb-3">
                    <a href="{{ route('book') }}?service_id={{ $lastService->id }}" class="text-warning small">
                        <i class="fas fa-history me-1"></i> Continue with {{ $lastService->name }} →
                    </a>
                </div>
                @endif
                <div class="hero-stats">
                    <div class="hero-stat"><span class="hero-stat-number">500+</span><span class="hero-stat-label">Happy Customers</span></div>
                    <div class="hero-stat"><span class="hero-stat-number">50+</span><span class="hero-stat-label">Expert Technicians</span></div>
                    <div class="hero-stat"><span class="hero-stat-number">7+</span><span class="hero-stat-label">Services</span></div>
                    <div class="hero-stat"><span class="hero-stat-number">5★</span><span class="hero-stat-label">Avg Rating</span></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
                <div class="row g-3">
                    @foreach($services->take(4) as $service)
                    <div class="col-6">
                        <div class="hero-card text-center">
                            <div class="hero-card-icon mx-auto"><i class="{{ $service->icon_class }}"></i></div>
                            <div class="fw-600">{{ $service->name }}</div>
                            <small class="text-warning">Starting ₹{{ number_format($service->price, 0) }}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SERVICES --}}
<section class="section-pad" id="services">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">What We Offer</span>
            <h2 class="section-title">Our <span>Services</span></h2>
            <p class="section-desc mx-auto">Professional home maintenance services by verified technicians. Starting from just ₹249.</p>
        </div>
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="service-card">
                    <div class="service-icon"><i class="{{ $service->icon_class }}"></i></div>
                    <h3 class="service-name">{{ $service->name }}</h3>
                    <p class="service-desc">{{ $service->description }}</p>
                    <div class="service-price">
                        Starting from ₹{{ number_format($service->price, 0) }}
                        <span>/ visit</span>
                    </div>
                    <a href="{{ route('book') }}?service_id={{ $service->id }}" class="btn-service">
                        <i class="fas fa-calendar-alt me-1"></i> Book Now
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('services.index') }}" class="btn-hero-primary">
                View All Services <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

{{-- WHY CHOOSE US --}}
<section class="section-pad why-section" id="why">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Why Us</span>
            <h2 class="section-title">Why Choose <span>Mr. Maintenance?</span></h2>
        </div>
        <div class="row g-4">
            @php $why = [
                ['icon'=>'fas fa-user-check','class'=>'orange','title'=>'Verified Technicians','desc'=>'All our technicians are background-verified, trained, and certified to handle your home safely.'],
                ['icon'=>'fas fa-tags','class'=>'navy','title'=>'Transparent Pricing','desc'=>'No hidden charges. You get a detailed quote upfront before any work begins.'],
                ['icon'=>'fas fa-bolt','class'=>'orange','title'=>'Same-Day Service','desc'=>'Book before noon and get service the same day. Fast, reliable, and on-time every time.'],
                ['icon'=>'fas fa-star','class'=>'navy','title'=>'Quality Materials','desc'=>'We use only genuine, high-quality parts and materials to ensure lasting repairs.'],
            ]; @endphp
            @foreach($why as $item)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="why-card">
                    <div class="why-icon {{ $item['class'] }}"><i class="{{ $item['icon'] }}"></i></div>
                    <h4 class="why-title">{{ $item['title'] }}</h4>
                    <p class="why-desc">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section class="section-pad" id="how">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Simple Process</span>
            <h2 class="section-title">How It <span>Works</span></h2>
        </div>
        <div class="row g-4">
            @php $steps = [
                ['n'=>'1','icon'=>'fas fa-phone-alt','title'=>'Book via Call/App','desc'=>'Call us at +91 8858448111 or book online through our easy booking form.'],
                ['n'=>'2','icon'=>'fas fa-user-cog','title'=>'Technician Assigned','desc'=>'A verified technician is assigned to your booking and will arrive at the scheduled time.'],
                ['n'=>'3','icon'=>'fas fa-tools','title'=>'Job Done with Quality Check','desc'=>'The technician completes the work professionally and performs a quality check.'],
                ['n'=>'4','icon'=>'fas fa-star','title'=>'Feedback','desc'=>'Share your experience and help us serve you better every time.'],
            ]; @endphp
            @foreach($steps as $step)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="step-card">
                    <div class="step-number">{{ $step['n'] }}</div>
                    <div class="step-icon"><i class="{{ $step['icon'] }}"></i></div>
                    <h4 class="step-title">{{ $step['title'] }}</h4>
                    <p class="step-desc">{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- AMC PRICING --}}
<section class="section-pad" style="background:#f8faff;" id="amc">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Annual Maintenance</span>
            <h2 class="section-title">AMC <span>Plans</span></h2>
            <p class="section-desc mx-auto">Choose a plan that suits your home. Save more with annual maintenance contracts.</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($amcPlans as $plan)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="pricing-card {{ $plan->is_popular ? 'popular' : '' }}">
                    @if($plan->is_popular)<div class="popular-badge">⭐ Most Popular</div>@endif
                    <div class="pricing-name">{{ $plan->name }}</div>
                    @if($plan->discount_percent > 0)
                        <div class="badge bg-success mb-2">{{ $plan->discount_percent }}% Discount Included</div>
                    @endif
                    <div class="pricing-price">
                        <sup>₹</sup>{{ number_format($plan->price, 0) }}<span>/year</span>
                    </div>
                    <ul class="pricing-features">
                        @foreach($plan->features as $feature)
                        <li><i class="fas fa-check"></i> {{ $feature }}</li>
                        @endforeach
                        <li><i class="fas fa-clock"></i> {{ $plan->response_time }} Response</li>
                    </ul>
                    <a href="{{ route('book') }}" class="btn-plan {{ $plan->is_popular ? 'btn-plan-primary' : 'btn-plan-outline' }}">
                        Subscribe / Enquire
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('amc') }}" class="btn-service">View Full AMC Details →</a>
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="section-pad testimonials-section" id="testimonials">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Customer Reviews</span>
            <h2 class="section-title">What Our <span style="color:var(--orange)">Customers Say</span></h2>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" data-aos="fade-up">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if($testimonials->count())
        <div class="row g-4">
            @foreach($testimonials as $t)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        @for($i=0;$i<$t->rating;$i++)<i class="fas fa-star"></i>@endfor
                    </div>
                    <p class="testimonial-text">"{{ $t->review }}"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">{{ strtoupper(substr($t->name,0,1)) }}</div>
                        <div>
                            <div class="testimonial-name">{{ $t->name }}</div>
                            <div class="testimonial-city"><i class="fas fa-map-marker-alt me-1"></i>{{ $t->city }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-muted">No reviews yet. Be the first to share your experience!</p>
        @endif

        {{-- REVIEW FORM --}}
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="form-card">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="service-icon" style="width:52px;height:52px;font-size:1.4rem;"><i class="fas fa-star"></i></div>
                        <div>
                            <h3 class="mb-0" style="font-size:1.3rem;font-weight:800;">Share Your Experience</h3>
                            <p class="mb-0 text-muted small">Your feedback helps us improve and helps others choose confidently.</p>
                        </div>
                    </div>

                    <form action="{{ route('review.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="review_name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="review_name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Your Name" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="review_city" class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" name="city" id="review_city" class="form-control @error('city') is-invalid @enderror"
                                    value="{{ old('city', 'Varanasi') }}" placeholder="Varanasi" required>
                                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Rating <span class="text-danger">*</span></label>
                                <div class="star-rating-input d-flex gap-2 align-items-center">
                                    @for($i = 5; $i >= 1; $i--)
                                    <div class="form-check form-check-inline mb-0">
                                        <input type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}" class="form-check-input"
                                            {{ old('rating', 5) == $i ? 'checked' : '' }}>
                                        <label for="rating{{ $i }}" class="form-check-label" style="color:#FFB800;font-size:1.1rem;cursor:pointer;">
                                            @for($j=0;$j<$i;$j++)★@endfor
                                        </label>
                                    </div>
                                    @endfor
                                </div>
                                @error('rating')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label for="review_text" class="form-label">Your Review <span class="text-danger">*</span></label>
                                <textarea name="review" id="review_text" rows="4" class="form-control @error('review') is-invalid @enderror"
                                    placeholder="Tell us about your experience with Mr. Maintenance..." required>{{ old('review') }}</textarea>
                                @error('review')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit" class="btn-submit" id="submit-review-btn">
                                <i class="fas fa-paper-plane me-2"></i> Submit Review
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA BANNER --}}
<section class="cta-banner" data-aos="fade-up">
    <div class="container">
        <h2>Ready to Book? We're Just a Call Away!</h2>
        <p>Call us or WhatsApp for fast, professional home maintenance service in Varanasi.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="tel:+918858448111" class="btn-cta-white">
                <i class="fas fa-phone"></i> +91 8858448111
            </a>
            <a href="{{ $whatsappLink }}" target="_blank" class="btn-cta-outline-white">
                <i class="fab fa-whatsapp"></i> WhatsApp Us
            </a>
        </div>
    </div>
</section>

@endsection
