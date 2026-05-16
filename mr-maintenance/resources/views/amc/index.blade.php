@extends('layouts.app')
@section('title', 'AMC Plans — Mr. Maintenance Varanasi')
@section('content')

<section class="amc-hero">
    <div class="container">
        <span class="section-label text-center d-block">Annual Maintenance Contract</span>
        <h1 class="text-white text-center mb-3">Choose Your <span style="color:var(--orange)">AMC Plan</span></h1>
        <p class="text-center" style="color:rgba(255,255,255,0.7);max-width:560px;margin:0 auto;">Protect your home with a comprehensive annual maintenance plan. Priority service, guaranteed visits, and huge savings.</p>
    </div>
</section>

<section class="section-pad">
    <div class="container">
        <div class="row g-4 justify-content-center">
            @foreach($plans as $plan)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="pricing-card {{ $plan->is_popular ? 'popular' : '' }}">
                    @if($plan->is_popular)<div class="popular-badge">⭐ Most Popular</div>@endif
                    <div class="pricing-name">{{ $plan->name }}</div>
                    @if($plan->discount_percent > 0)
                        <div class="badge bg-success mb-2 py-2 px-3">{{ $plan->discount_percent }}% Discount on Parts</div>
                    @endif
                    <div class="pricing-price"><sup>₹</sup>{{ number_format($plan->price, 0) }}<span>/year</span></div>
                    <div class="row text-center mb-3 g-2">
                        <div class="col-6">
                            <div style="background:#f8faff;border-radius:10px;padding:12px;">
                                <div style="font-size:1.4rem;font-weight:800;color:var(--orange)">{{ $plan->preventive_visits }}</div>
                                <div style="font-size:0.72rem;color:#6c757d;text-transform:uppercase;">Preventive Visits</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:#f8faff;border-radius:10px;padding:12px;">
                                <div style="font-size:1.4rem;font-weight:800;color:var(--orange)">{{ $plan->emergency_visits }}</div>
                                <div style="font-size:0.72rem;color:#6c757d;text-transform:uppercase;">Emergency Visits</div>
                            </div>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        @foreach($plan->features as $feature)
                        <li><i class="fas fa-check"></i> {{ $feature }}</li>
                        @endforeach
                        <li><i class="fas fa-clock"></i> {{ $plan->response_time }} Response Time</li>
                    </ul>
                    <a href="{{ route('book') }}" class="btn-plan {{ $plan->is_popular ? 'btn-plan-primary' : 'btn-plan-outline' }}">
                        Subscribe / Enquire Now
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-5 g-4" data-aos="fade-up">
            @php $perks = [
                ['icon'=>'fas fa-phone-alt','title'=>'Dedicated Support','desc'=>'Priority phone support for all AMC members.'],
                ['icon'=>'fas fa-shield-alt','title'=>'Guaranteed Response','desc'=>'Response within committed time, every time.'],
                ['icon'=>'fas fa-tags','title'=>'Parts Discount','desc'=>'Save on genuine parts with Standard & Premium plans.'],
                ['icon'=>'fas fa-tools','title'=>'Expert Technicians','desc'=>'Only our best-rated technicians serve AMC members.'],
            ]; @endphp
            @foreach($perks as $p)
            <div class="col-md-3 col-6 text-center">
                <div class="why-card py-4">
                    <div class="why-icon orange mx-auto"><i class="{{ $p['icon'] }}"></i></div>
                    <h6 class="why-title">{{ $p['title'] }}</h6>
                    <p class="why-desc small">{{ $p['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="container">
        <h2>Questions About AMC Plans?</h2>
        <p>Our team is ready to help you choose the right plan for your home.</p>
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="tel:+918858448111" class="btn-cta-white"><i class="fas fa-phone me-1"></i> +91 8858448111</a>
            <a href="{{ $whatsappLink }}" target="_blank" class="btn-cta-outline-white"><i class="fab fa-whatsapp me-1"></i> WhatsApp</a>
        </div>
    </div>
</section>
@endsection
