@extends('layouts.admin')
@section('title','Message from ' . $message->name)
@section('page_title','Message Details')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="admin-table-card p-4">
            <dl class="row">
                <dt class="col-sm-3 text-muted">From</dt><dd class="col-sm-9 fw-600">{{ $message->name }}</dd>
                <dt class="col-sm-3 text-muted">Email</dt><dd class="col-sm-9"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>
                <dt class="col-sm-3 text-muted">Phone</dt><dd class="col-sm-9">{{ $message->phone ?: '—' }}</dd>
                <dt class="col-sm-3 text-muted">Date</dt><dd class="col-sm-9">{{ $message->created_at->format('d M Y, h:i A') }}</dd>
                <dt class="col-sm-3 text-muted">Message</dt>
                <dd class="col-sm-9">
                    <div class="p-3 rounded" style="background:#f8f9fa;line-height:1.8;">{{ $message->message }}</div>
                </dd>
            </dl>
            <div class="d-flex gap-2 mt-3">
                <a href="mailto:{{ $message->email }}" class="btn btn-primary"><i class="fas fa-reply me-1"></i> Reply via Email</a>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">← Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
