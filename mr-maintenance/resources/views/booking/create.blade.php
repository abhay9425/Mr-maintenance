@extends('layouts.app')
@section('title', 'Book a Service — Mr. Maintenance')
@section('content')

<div class="page-hero">
    <div class="container">
        <h1>Book a <span style="color:var(--orange)">Service</span></h1>
        <p>Fill in the form below and our team will confirm your booking shortly.</p>
    </div>
</div>

<section class="section-pad form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card" data-aos="fade-up">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="service-icon" style="width:52px;height:52px;font-size:1.4rem;"><i class="fas fa-calendar-check"></i></div>
                        <div>
                            <h2 class="mb-0" style="font-size:1.4rem;font-weight:800;">Book Your Service</h2>
                            <p class="mb-0 text-muted small">We'll confirm within 1 hour of booking.</p>
                        </div>
                    </div>

                    <form action="{{ route('booking.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="Rajesh Kumar" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="yourname@email.com" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">+91</span>
                                    <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" placeholder="9876543210" maxlength="10" required>
                                </div>
                                @error('phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
                                    value="{{ old('city', $preferredCity) }}" placeholder="Varanasi" required>
                                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Full Address <span class="text-danger">*</span></label>
                                <textarea name="address" id="address" rows="2" class="form-control @error('address') is-invalid @enderror"
                                    placeholder="House No, Street, Locality, Landmark..." required>{{ old('address') }}</textarea>
                                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="service_id" class="form-label">Service Type <span class="text-danger">*</span></label>
                                <select name="service_id" id="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                                    <option value="">— Select a Service —</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id', $selectedService) == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }} (₹{{ number_format($service->price, 0) }})
                                    </option>
                                    @endforeach
                                </select>
                                @error('service_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="booking_date" class="form-label">Preferred Date <span class="text-danger">*</span></label>
                                <input type="date" name="booking_date" id="booking_date" class="form-control @error('booking_date') is-invalid @enderror"
                                    value="{{ old('booking_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                @error('booking_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Additional Message</label>
                                <textarea name="message" id="message" rows="4" class="form-control @error('message') is-invalid @enderror"
                                    placeholder="Describe your issue or any specific requirements...">{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mt-4 d-flex flex-column align-items-center gap-3">
                            <button type="submit" class="btn-submit" id="submit-booking-btn">
                                <i class="fas fa-calendar-check me-2"></i> Confirm Booking
                            </button>
                            <p class="text-muted small mb-0">
                                <i class="fas fa-lock me-1"></i> Your information is secure. Or call us:
                                <a href="tel:+918858448111" class="text-orange">+91 8858448111</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
