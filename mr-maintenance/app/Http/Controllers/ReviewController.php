<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Mail\ReviewNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|min:2|max:100',
            'city'   => 'required|min:2|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|min:10|max:1000',
        ], [
            'name.required'   => 'Please enter your name.',
            'city.required'   => 'Please enter your city.',
            'rating.required' => 'Please select a rating.',
            'review.required' => 'Please write your review.',
            'review.min'      => 'Review must be at least 10 characters.',
        ]);

        $testimonial = Testimonial::create(array_merge($validated, [
            'is_active' => true,
        ]));

        // Notify admin via email
        try {
            Mail::to('abhaypandey9425@gmail.com')
                ->send(new ReviewNotificationMail($testimonial));
        } catch (\Exception $e) {
            \Log::warning('Review mail failed: ' . $e->getMessage());
        }

        return redirect()->route('home', ['#testimonials'])->with('success', 'Thank you for your review! It is now live on our website.');
    }
}
