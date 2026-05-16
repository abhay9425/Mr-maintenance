@extends('layouts.app')
@section('title', 'About Us — Mr. Maintenance Varanasi')
@section('content')

<div class="page-hero">
    <div class="container">
        <h1>About <span style="color:var(--orange)">Mr. Maintenance</span></h1>
        <p>Your one trusted partner for all home maintenance needs in Varanasi</p>
    </div>
</div>

{{-- Story --}}
<section class="section-pad">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-label">Our Story</span>
                <h2 class="section-title">One Trusted Partner for <span>All Home Needs</span></h2>
                <p class="text-muted" style="line-height:1.9;">Mr. Maintenance was founded with a simple mission: to provide reliable, affordable, and professional home maintenance services to the families of Varanasi. We believe every home deserves expert care.</p>
                <p class="text-muted" style="line-height:1.9;">From a single electrician to a full team of certified technicians across 7+ service categories, we have grown to become Varanasi's most trusted home maintenance partner.</p>
                <div class="d-flex gap-3 mt-4 flex-wrap">
                    <a href="{{ route('book') }}" class="btn-hero-primary">Book a Service</a>
                    <a href="{{ route('contact') }}" class="btn-hero-secondary" style="color:var(--navy);border-color:var(--navy);">Get in Touch</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="row g-3">
                    @php $stats = [['n'=>'500+','l'=>'Happy Customers'],['n'=>'50+','l'=>'Expert Technicians'],['n'=>'7+','l'=>'Services Offered'],['n'=>'5★','l'=>'Average Rating']]; @endphp
                    @foreach($stats as $s)
                    <div class="col-6">
                        <div class="stat-card why-card text-center">
                            <span class="stat-number">{{ $s['n'] }}</span>
                            <span class="stat-label">{{ $s['l'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mission --}}
<section class="section-pad-sm" style="background:#f8faff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="section-label">Our Mission</span>
                <h2 class="section-title">"One Trusted Partner for <span>All Home Needs</span>"</h2>
                <p class="text-muted" style="line-height:1.9;font-size:1.05rem;">We are committed to delivering high-quality home maintenance services with transparency, integrity, and professionalism. Our goal is to make home maintenance hassle-free for every family in Varanasi and beyond.</p>
                <div class="badge rounded-pill px-4 py-2 mt-2" style="background:rgba(255,107,53,0.1);color:var(--orange);font-size:0.9rem;font-weight:600;">
                    <i class="fas fa-map-marker-alt me-1"></i> Service Area: Varanasi, Uttar Pradesh
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Team --}}
@if($team->count())
<section class="section-pad">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Meet Our Team</span>
            <h2 class="section-title">Our Expert <span>Technicians</span></h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($team as $member)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="team-card">
                    <div class="team-avatar"><i class="fas fa-user-tie"></i></div>
                    <div class="team-name">{{ $member->name }}</div>
                    <div class="team-role">{{ $member->role }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="cta-banner">
    <div class="container">
        <h2>Ready to Experience the Difference?</h2>
        <p>Book your first service today and see why hundreds trust Mr. Maintenance.</p>
        <a href="{{ route('book') }}" class="btn-cta-white"><i class="fas fa-calendar-alt me-1"></i> Book a Service</a>
    </div>
</section>
@endsection
