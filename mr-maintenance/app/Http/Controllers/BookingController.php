<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Mail\BookingConfirmationMail;
use App\Mail\AdminNewBookingMail;
use App\Rules\IndianPhoneRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $services      = Service::active()->get();
        $selectedService = $request->get('service_id');

        // Cookie: set preferred city
        $preferredCity = $request->cookie('preferred_city', 'Varanasi');

        return view('booking.create', compact('services', 'selectedService', 'preferredCity'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|min:3|max:100',
            'email'        => 'required|email',
            'phone'        => ['required', new IndianPhoneRule],
            'city'         => 'required|min:2',
            'address'      => 'required|min:5|max:500',
            'service_id'   => 'required|exists:services,id',
            'booking_date' => 'required|date|after:today',
            'message'      => 'nullable|max:500',
        ], [
            'name.required'         => 'Please enter your full name.',
            'name.min'              => 'Name must be at least 3 characters.',
            'email.required'        => 'Email address is required.',
            'email.email'           => 'Please enter a valid email address.',
            'phone.required'        => 'Phone number is required.',
            'city.required'         => 'Please enter your city.',
            'address.required'      => 'Please enter your full address.',
            'address.min'           => 'Address must be at least 5 characters.',
            'service_id.required'   => 'Please select a service.',
            'service_id.exists'     => 'Please select a valid service.',
            'booking_date.required' => 'Please select a preferred date.',
            'booking_date.after'    => 'Please select a future date.',
            'message.max'           => 'Message may not be longer than 500 characters.',
        ]);

        $booking = Booking::create(array_merge($validated, [
            // 'user_id' => auth()->id(), // Admin feature removed
            'status'  => 'pending',
        ]));

        // Load relation for emails
        $booking->load('service');

        // Send confirmation email to customer
        try {
            Mail::to($booking->email)->send(new BookingConfirmationMail($booking));
            Mail::to('abhaypandey9425@gmail.com')
                ->send(new AdminNewBookingMail($booking));
        } catch (\Exception $e) {
            // Log but don't fail the request if mail fails
            \Log::warning('Mail failed: ' . $e->getMessage());
        }

        // Store last service in session
        session()->put('last_service', $booking->service_id);

        // Set preferred city cookie (7 days)
        Cookie::queue('preferred_city', $booking->city, 60 * 24 * 7);

        session()->flash('success', __('messages.booking.success'));

        return redirect()->route('booking.thankyou')->with('booking', $booking->id);
    }

    public function thankyou()
    {
        return view('booking.thankyou');
    }
}
