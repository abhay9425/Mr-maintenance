<?php

namespace App\Http\Controllers;

use App\Models\AmcPlan;
use App\Models\Service;
use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        $team = TeamMember::active()->get();

        return view('about.index', compact('team'));
    }
}
