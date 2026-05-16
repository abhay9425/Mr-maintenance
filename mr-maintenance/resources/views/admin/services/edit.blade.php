@extends('layouts.admin')
@section('title','Edit Service')
@section('page_title','Edit Service: ' . $service->name)
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="admin-table-card p-4">
            <form action="{{ route('admin.services.update', $service) }}" method="POST">
                @csrf @method('PUT')
                @include('admin.services._form')
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update Service</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
