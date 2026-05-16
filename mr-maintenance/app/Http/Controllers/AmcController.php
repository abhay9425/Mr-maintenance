<?php

namespace App\Http\Controllers;

use App\Models\AmcPlan;
use App\Models\Service;

class AmcController extends Controller
{
    public function index()
    {
        $plans   = AmcPlan::all();
        $services = Service::active()->get();
        return view('amc.index', compact('plans', 'services'));
    }
}
