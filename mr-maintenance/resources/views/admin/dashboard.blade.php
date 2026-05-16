@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('content')

<div class="row g-4 mb-4">
    @php $cards = [
        ['label'=>'Total Bookings','value'=>$totalBookings,'icon'=>'fas fa-calendar-check','color'=>'#FF6B35'],
        ['label'=>'Pending Bookings','value'=>$pendingBookings,'icon'=>'fas fa-clock','color'=>'#f59e0b'],
        ['label'=>'Total Services','value'=>$totalServices,'icon'=>'fas fa-tools','color'=>'#10b981'],
        ['label'=>'Unread Messages','value'=>$unreadMessages,'icon'=>'fas fa-envelope','color'=>'#3b82f6'],
    ]; @endphp

    @foreach($cards as $card)
    <div class="col-md-3 col-sm-6">
        <div class="stat-card-admin d-flex align-items-center gap-3" style="border-left-color:{{ $card['color'] }}">
            <div class="stat-icon" style="background:{{ $card['color'] }}20;color:{{ $card['color'] }}">
                <i class="{{ $card['icon'] }}"></i>
            </div>
            <div>
                <div class="stat-value">{{ $card['value'] }}</div>
                <div class="stat-label">{{ $card['label'] }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Recent Bookings --}}
<div class="admin-table-card">
    <div class="admin-table-header">
        <div class="admin-table-title"><i class="fas fa-list me-2 text-orange"></i>Recent Bookings</div>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th><th>Customer</th><th>Service</th><th>Date</th><th>Status</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentBookings as $booking)
                <tr>
                    <td>#{{ $booking->id }}</td>
                    <td>
                        <div class="fw-600">{{ $booking->name }}</div>
                        <small class="text-muted">{{ $booking->phone }}</small>
                    </td>
                    <td>{{ $booking->service->name ?? '—' }}</td>
                    <td>{{ $booking->booking_date->format('d M Y') }}</td>
                    <td>
                        <span class="badge badge-status badge-{{ $booking->status }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn-admin-action btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No bookings yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
