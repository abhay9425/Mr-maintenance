<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — {{ $siteName }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('styles')
</head>
<body class="admin-body">

<div class="d-flex" id="admin-wrapper">
    <!-- Sidebar -->
    <nav id="admin-sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-wrench me-2"></i>
                <span>Mr. Maintenance</span>
            </div>
            <p class="sidebar-sub">Admin Panel</p>
        </div>
        <ul class="sidebar-nav">
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.bookings.index') }}">
                    <i class="fas fa-calendar-check"></i> Bookings
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <a href="{{ route('admin.services.index') }}">
                    <i class="fas fa-tools"></i> Services
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <a href="{{ route('admin.messages.index') }}">
                    <i class="fas fa-envelope"></i> Messages
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-globe"></i> View Site
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="admin-content">
        <header class="admin-header">
            <button class="btn btn-sm btn-outline-secondary d-md-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="admin-header-title">@yield('page_title', 'Dashboard')</div>
            <div class="admin-header-user">
                <i class="fas fa-user-circle me-1"></i>
                {{ auth()->user()->name ?? 'Admin' }}
            </div>
        </header>

        <div class="admin-main-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('sidebarToggle')?.addEventListener('click', function() {
        document.getElementById('admin-sidebar').classList.toggle('show');
    });
</script>
@yield('scripts')
</body>
</html>
