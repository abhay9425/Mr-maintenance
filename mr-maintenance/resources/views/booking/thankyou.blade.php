@extends('layouts.app')
@section('title', 'Booking Confirmed — Mr. Maintenance')
@section('content')

<section class="section-pad text-center" style="min-height:70vh;display:flex;align-items:center;">
    <div class="container">
        <div data-aos="zoom-in">
            <div style="width:100px;height:100px;background:linear-gradient(135deg,#28a745,#20c997);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 2rem;font-size:3rem;color:#fff;">
                <i class="fas fa-check"></i>
            </div>
            <h1 style="font-size:2.2rem;font-weight:800;color:var(--navy);">Booking Confirmed! 🎉</h1>
            <p class="text-muted mt-3 mb-4" style="font-size:1.05rem;max-width:500px;margin:0 auto;">
                Thank you for choosing <strong>Mr. Maintenance</strong>! We have received your booking and will contact you within 1 hour to confirm the appointment.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                <a href="{{ route('home') }}" class="btn-hero-primary"><i class="fas fa-home me-1"></i> Back to Home</a>
                <a href="{{ $whatsappLink }}" target="_blank" class="btn-hero-secondary" style="color:var(--navy);border-color:var(--navy);">
                    <i class="fab fa-whatsapp me-1"></i> WhatsApp Us
                </a>
            </div>
            <div class="mt-5 p-4 rounded-3" style="background:#f8f9fa;max-width:420px;margin:2rem auto 0;">
                <div class="text-orange fw-700 mb-2"><i class="fas fa-headset me-1"></i> Need Immediate Help?</div>
                <a href="tel:+918858448111" style="font-size:1.3rem;font-weight:800;color:var(--navy);text-decoration:none;">+91 8858448111</a>
            </div>
        </div>
    </div>
</section>
@endsection
