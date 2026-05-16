@extends('layouts.admin')
@section('title','Add Service')
@section('page_title','Add New Service')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="admin-table-card p-4">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                @include('admin.services._form')
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4">Create Service</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
