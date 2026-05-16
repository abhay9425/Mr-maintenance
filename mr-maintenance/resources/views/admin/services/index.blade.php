@extends('layouts.admin')
@section('title','Services')
@section('page_title','Manage Services')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <span class="text-muted">{{ $services->total() }} services</span>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary rounded-pill px-4">
        <i class="fas fa-plus me-1"></i> Add Service
    </a>
</div>
<div class="admin-table-card">
    <div class="table-responsive">
        <table class="table">
            <thead><tr><th>#</th><th>Icon</th><th>Name</th><th>Category</th><th>Price</th><th>Active</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>#{{ $service->id }}</td>
                    <td><i class="{{ $service->icon_class }} fa-lg text-orange"></i></td>
                    <td class="fw-600">{{ $service->name }}</td>
                    <td class="text-capitalize">{{ $service->category }}</td>
                    <td>₹{{ number_format($service->price, 0) }}</td>
                    <td>
                        @if($service->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this service?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">No services found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $services->links() }}</div>
</div>
@endsection
