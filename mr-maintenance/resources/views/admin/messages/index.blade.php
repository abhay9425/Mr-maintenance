@extends('layouts.admin')
@section('title','Messages')
@section('page_title','Contact Messages')
@section('content')
<div class="admin-table-card">
    <div class="admin-table-header">
        <div class="admin-table-title"><i class="fas fa-envelope me-2 text-orange"></i>All Messages</div>
        <span class="text-muted small">{{ $messages->total() }} messages</span>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Status</th><th>Date</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($messages as $msg)
                <tr class="{{ !$msg->is_read ? 'table-warning' : '' }}">
                    <td>#{{ $msg->id }}</td>
                    <td class="fw-600">{{ $msg->name }}</td>
                    <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                    <td>{{ $msg->phone ?: '—' }}</td>
                    <td style="max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $msg->message }}</td>
                    <td>
                        @if($msg->is_read)
                            <span class="badge bg-success">Read</span>
                        @else
                            <span class="badge bg-warning text-dark">Unread</span>
                        @endif
                    </td>
                    <td>{{ $msg->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-primary me-1" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this message?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $messages->links() }}</div>
</div>
@endsection
