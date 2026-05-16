@extends('layouts.admin')
@section('title','Edit Booking')
@section('page_title','Edit Booking #' . $booking->id)
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="admin-table-card p-4">
            <h5 class="fw-700 mb-4">Booking Details</h5>
            <dl class="row mb-4">
                <dt class="col-sm-4 text-muted">Customer</dt><dd class="col-sm-8">{{ $booking->name }}</dd>
                <dt class="col-sm-4 text-muted">Email</dt><dd class="col-sm-8">{{ $booking->email }}</dd>
                <dt class="col-sm-4 text-muted">Phone</dt><dd class="col-sm-8"><a href="tel:{{ $booking->phone }}">{{ $booking->phone }}</a></dd>
                <dt class="col-sm-4 text-muted">City</dt><dd class="col-sm-8">{{ $booking->city }}</dd>
                <dt class="col-sm-4 text-muted">Service</dt><dd class="col-sm-8">{{ $booking->service->name ?? '—' }}</dd>
                <dt class="col-sm-4 text-muted">Booking Date</dt><dd class="col-sm-8">{{ $booking->booking_date->format('d M Y') }}</dd>
                <dt class="col-sm-4 text-muted">Message</dt><dd class="col-sm-8">{{ $booking->message ?: '—' }}</dd>
                <dt class="col-sm-4 text-muted">Current Status</dt>
                <dd class="col-sm-8"><span class="badge badge-status badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></dd>
            </dl>

            <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-600">Update Status</label>
                    <select name="status" class="form-select">
                        @foreach(['pending','confirmed','completed','cancelled'] as $s)
                        <option value="{{ $s }}" {{ $booking->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">← Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
