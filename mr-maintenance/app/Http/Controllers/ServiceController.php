<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $query    = Service::active();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $services   = $query->get();
        $categories = Service::active()->distinct()->pluck('category');

        return view('services.index', compact('services', 'categories', 'category'));
    }

    public function show($id)
    {
        $service = Service::active()->findOrFail($id);

        // Store last viewed service in session
        session()->put('last_service', $service->id);

        return view('services.show', compact('service'));
    }
}
