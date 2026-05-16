@extends('layouts.admin')
@section('title','Bookings')
@section('page_title','Manage Bookings')
@section('content')
<div class="admin-table-card">
    <div class="admin-table-header">
        <div class="admin-table-title"><i class="fas fa-calendar-check me-2 text-orange"></i>All Bookings</div>
        <span class="text-muted small">{{ $bookings->total() }} total</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr><th>#</th><th>Customer</th><th>Phone</th><th>Service</th><th>Date</th><th>City</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td>#{{ $booking->id }}</td>
                    <td>{{ $booking->name }}</td>
                    <td><a href="tel:{{ $booking->phone }}">{{ $booking->phone }}</a></td>
                    <td>{{ $booking->service->name ?? '—' }}</td>
                    <td>{{ $booking->booking_date->format('d M Y') }}</td>
                    <td>{{ $booking->city }}</td>
                    <td><span class="badge badge-status badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this booking?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">No bookings found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $bookings->links() }}</div>
</div>
@endsection
