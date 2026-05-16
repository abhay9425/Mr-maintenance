<nav class="navbar navbar-expand-lg sticky-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <div class="brand-icon me-2">
                <i class="fas fa-wrench"></i>
            </div>
            <div>
                <span class="brand-name">Mr. Maintenance</span>
                <small class="brand-tagline d-block">Home Services</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('amc') ? 'active' : '' }}" href="{{ route('amc') }}">AMC Plans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>

            </ul>
            <div class="d-flex align-items-center gap-2">
                <a href="tel:+918858448111" class="btn btn-outline-light btn-sm d-none d-lg-inline-flex align-items-center">
                    <i class="fas fa-phone me-1"></i> +91 8858448111
                </a>
                <a href="{{ route('book') }}" class="btn btn-book">
                    <i class="fas fa-calendar-alt me-1"></i> Book Now
                </a>
            </div>
        </div>
    </div>
</nav>
