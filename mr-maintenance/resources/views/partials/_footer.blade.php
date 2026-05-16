<footer class="site-footer">
    <div class="container">
        <div class="row g-4">
            <!-- Brand & Info -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand mb-3">
                    <i class="fas fa-wrench me-2"></i>
                    <span>Mr. Maintenance</span>
                </div>
                <p class="footer-tagline">{{ $siteTagline }}</p>
                <p class="footer-desc">Your one-stop solution for all home maintenance needs in Varanasi. Certified technicians, transparent pricing, same-day service.</p>
                <div class="footer-social mt-3">
                    <a href="{{ $facebookLink }}" target="_blank" rel="noopener" class="social-btn facebook" title="Follow us on Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $whatsappLink }}" target="_blank" rel="noopener" class="social-btn whatsapp" title="WhatsApp Us">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="tel:+918858448111" class="social-btn phone" title="Call Us">
                        <i class="fas fa-phone"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h5 class="footer-heading">Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right me-1"></i>Home</a></li>
                    <li><a href="{{ route('services.index') }}"><i class="fas fa-chevron-right me-1"></i>Services</a></li>
                    <li><a href="{{ route('amc') }}"><i class="fas fa-chevron-right me-1"></i>AMC Plans</a></li>
                    <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right me-1"></i>About Us</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right me-1"></i>Contact</a></li>
                    <li><a href="{{ route('book') }}"><i class="fas fa-chevron-right me-1"></i>Book a Service</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading">Our Services</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('services.index') }}?category=electrical"><i class="fas fa-bolt me-1"></i>Electrician</a></li>
                    <li><a href="{{ route('services.index') }}?category=plumbing"><i class="fas fa-faucet me-1"></i>Plumbing</a></li>
                    <li><a href="{{ route('services.index') }}?category=carpentry"><i class="fas fa-hammer me-1"></i>Carpenter</a></li>
                    <li><a href="{{ route('services.index') }}?category=appliance"><i class="fas fa-blender me-1"></i>Appliance Repair</a></li>
                    <li><a href="{{ route('services.index') }}?category=appliance"><i class="fas fa-wind me-1"></i>Air Conditioner</a></li>
                    <li><a href="{{ route('services.index') }}?category=appliance"><i class="fas fa-temperature-low me-1"></i>Refrigerator</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading">Contact Us</h5>
                <ul class="footer-contact">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>SA 4/4-3 Pandeypur Daulatpur, Varanasi, Uttar Pradesh 221002</span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <a href="tel:+918858448111">+91 8858448111</a>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ $siteEmail }}">{{ $siteEmail }}</a>
                    </li>
                    <li>
                        <i class="fab fa-whatsapp"></i>
                        <a href="{{ $whatsappLink }}" target="_blank">WhatsApp Us</a>
                    </li>

                </ul>
            </div>
        </div>

        <hr class="footer-divider">
        <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="mb-0">&copy; 2026 <strong>Mr. Maintenance</strong>. All Rights Reserved.</p>
            <p class="mb-0 text-muted small">Serving Varanasi, Uttar Pradesh with ❤️</p>
        </div>
    </div>
</footer>
