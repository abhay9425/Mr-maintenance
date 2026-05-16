@extends('layouts.app')
@section('title', 'Our Services — Mr. Maintenance Varanasi')
@section('content')

<div class="page-hero">
    <div class="container">
        <h1>Our <span style="color:var(--orange)">Services</span></h1>
        <p>Professional home maintenance services starting from ₹249</p>
        <nav aria-label="breadcrumb" class="page-breadcrumb mt-3">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section-pad">
    <div class="container">
        {{-- Filter Tabs --}}
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <a href="{{ route('services.index') }}" class="btn {{ !$category || $category === 'all' ? 'btn-book' : 'btn-outline-secondary' }} rounded-pill">All Services</a>
                @foreach($categories as $cat)
                <a href="{{ route('services.index') }}?category={{ $cat }}" class="btn {{ $category === $cat ? 'btn-book' : 'btn-outline-secondary' }} rounded-pill text-capitalize">{{ $cat }}</a>
                @endforeach
            </div>
        </div>

        <div class="row g-4">
            @forelse($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="service-card">
                    <div class="service-icon"><i class="{{ $service->icon_class }}"></i></div>
                    <h3 class="service-name">{{ $service->name }}</h3>
                    <p class="service-desc">{{ $service->description }}</p>
                    <div class="service-price">Starting from ₹{{ number_format($service->price, 0) }} <span>/ visit</span></div>
                    <div class="d-flex gap-2 mt-2">
                        <a href="{{ route('book') }}?service_id={{ $service->id }}" class="btn-service flex-fill text-center">
                            <i class="fas fa-calendar-alt me-1"></i> Book Now
                        </a>
                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">Details</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-tools fa-3x text-muted mb-3 d-block"></i>
                <p class="text-muted">No services found in this category.</p>
                <a href="{{ route('services.index') }}" class="btn-service">View All Services</a>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="container">
        <h2>Can't Find What You Need?</h2>
        <p>Call us and we'll help you with any home maintenance requirement.</p>
        <a href="tel:+918858448111" class="btn-cta-white"><i class="fas fa-phone"></i> Call Now: +91 8858448111</a>
    </div>
</section>
@endsection
