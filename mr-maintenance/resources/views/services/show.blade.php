@extends('layouts.app')
@section('title', $service->name . ' — Mr. Maintenance')
@section('content')

<div class="page-hero">
    <div class="container">
        <div class="d-flex justify-content-center mb-3">
            <div class="service-icon"><i class="{{ $service->icon_class }}"></i></div>
        </div>
        <h1>{{ $service->name }}</h1>
        <p>{{ $service->description }}</p>
        <nav class="page-breadcrumb mt-3" aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
                <li class="breadcrumb-item active">{{ $service->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section-pad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="pricing-card popular mb-4">
                    <div class="pricing-name">{{ $service->name }}</div>
                    <div class="pricing-price"><sup>₹</sup>{{ number_format($service->price, 0) }}<span> starting price</span></div>
                    <p class="text-muted">{{ $service->description }}</p>
                    <a href="{{ route('book') }}?service_id={{ $service->id }}" class="btn-plan btn-plan-primary mt-3">
                        <i class="fas fa-calendar-alt me-2"></i> Book This Service
                    </a>
                </div>
                <a href="{{ route('services.index') }}" class="btn btn-outline-secondary rounded-pill">← Back to Services</a>
            </div>
        </div>
    </div>
</section>
@endsection
