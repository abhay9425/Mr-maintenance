<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalBookings   = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $totalServices   = Service::count();
        $unreadMessages  = ContactMessage::where('is_read', false)->count();

        $recentBookings = Booking::with('service')
            ->latest()
            ->limit(10)
            ->get();

        $bookingsByStatus = DB::table('bookings')
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'totalServices',
            'unreadMessages',
            'recentBookings',
            'bookingsByStatus'
        ));
    }
}
