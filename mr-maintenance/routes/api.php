<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Booking;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// GET /api/services — return all active services as JSON
Route::get('/services', function () {
    $services = Service::active()->get(['id', 'name', 'slug', 'category', 'price', 'icon_class']);
    return response()->json([
        'success' => true,
        'data'    => $services,
    ]);
});

// POST /api/bookings — create a booking, return JSON response
Route::post('/bookings', function (Request $request) {
    $validated = $request->validate([
        'name'         => 'required|min:3|max:100',
        'email'        => 'required|email',
        'phone'        => 'required|regex:/^[6-9]\d{9}$/',
        'city'         => 'required',
        'service_id'   => 'required|exists:services,id',
        'booking_date' => 'required|date|after:today',
        'message'      => 'nullable|max:500',
    ]);

    $booking = Booking::create(array_merge($validated, ['status' => 'pending']));
    $booking->load('service');

    return response()->json([
        'success' => true,
        'message' => 'Booking created successfully.',
        'data'    => [
            'id'           => $booking->id,
            'name'         => $booking->name,
            'service'      => $booking->service->name,
            'booking_date' => $booking->booking_date->format('d M Y'),
            'status'       => $booking->status,
        ],
    ], 201);
});

// GET /api/bookings/{id}/status — return booking status as JSON
Route::get('/bookings/{id}/status', function ($id) {
    $booking = Booking::with('service')->find($id);

    if (!$booking) {
        return response()->json(['success' => false, 'message' => 'Booking not found.'], 404);
    }

    return response()->json([
        'success' => true,
        'data'    => [
            'id'           => $booking->id,
            'name'         => $booking->name,
            'service'      => $booking->service->name,
            'booking_date' => $booking->booking_date->format('d M Y'),
            'status'       => $booking->status,
        ],
    ]);
})->where('id', '[0-9]+');
