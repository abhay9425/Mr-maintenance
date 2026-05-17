<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        if (config('app.env') === 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Register custom Resend transport
        \Illuminate\Support\Facades\Mail::extend('resend', function () {
            return new \App\Mail\Transports\ResendTransport(config('mail.mailers.resend.key') ?? env('RESEND_API_KEY'));
        });

        // Share global data with ALL views
        View::share('siteName', 'Mr. Maintenance');
        View::share('sitePhone', '+91 8858448111');
        View::share('sitePhoneRaw', '918858448111');
        View::share('siteEmail', 'mr.maintenance.help@gmail.com');
        View::share('whatsappLink', 'https://wa.me/918858448111');
        View::share('facebookLink', 'https://www.facebook.com/profile.php?id=100063967396136');
        View::share('siteAddress', 'SA 4/4-3 Pandeypur Daulatpur, Varanasi, Uttar Pradesh 221002');
        View::share('siteTagline', 'Your Trusted Home Maintenance Partner');
    }
}
