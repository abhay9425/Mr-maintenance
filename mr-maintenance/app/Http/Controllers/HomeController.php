<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Testimonial;
use App\Models\AmcPlan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $services     = Service::active()->limit(6)->get();
        $testimonials = Testimonial::active()->get();
        $amcPlans     = AmcPlan::all();

        // Cookie: read preferred city
        $preferredCity = $request->cookie('preferred_city', 'Varanasi');

        // Session: last viewed service
        $lastServiceId = session('last_service');
        $lastService   = $lastServiceId ? Service::find($lastServiceId) : null;

        return view('home.index', compact('services', 'testimonials', 'amcPlans', 'preferredCity', 'lastService'));
    }
}
