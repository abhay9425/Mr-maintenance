<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Rules\IndianPhoneRule;
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

        // Notify admin
        try {
            Mail::raw(
                "New contact message from {$validated['name']} ({$validated['email']})\n\n{$validated['message']}",
                function ($msg) use ($validated) {
                    $msg->to(config('mail.admin_email', 'abhaypandey9425@gmail.com'))
                        ->subject('New Contact Message — Mr. Maintenance');
                }
            );
        } catch (\Exception $e) {
            \Log::warning('Contact mail failed: ' . $e->getMessage());
        }

        session()->flash('success', __('messages.contact.success'));

        return redirect()->route('contact')->with('success', __('messages.contact.success'));
    }
}
