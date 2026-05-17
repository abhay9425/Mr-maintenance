<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Rules\IndianPhoneRule;
use App\Mail\ContactNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|min:3|max:100',
            'email'   => 'required|email',
            'phone'   => ['nullable', new IndianPhoneRule],
            'message' => 'required|min:10|max:1000',
        ], [
            'name.required'    => 'Please enter your name.',
            'email.required'   => 'Email address is required.',
            'email.email'      => 'Please enter a valid email address.',
            'message.required' => 'Please enter your message.',
            'message.min'      => 'Message must be at least 10 characters.',
        ]);

        ContactMessage::create($validated);

        // Notify admin with styled HTML email
        try {
            Mail::to('abhaypandey9425@gmail.com')
                ->send(new ContactNotificationMail($validated));
        } catch (\Exception $e) {
            \Log::warning('Contact mail failed: ' . $e->getMessage());
        }

        session()->flash('success', __('messages.contact.success'));

        return redirect()->route('contact')->with('success', __('messages.contact.success'));
    }
}
