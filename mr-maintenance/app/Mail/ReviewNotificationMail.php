<?php

namespace App\Mail;

use App\Models\Testimonial;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public Testimonial $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Customer Review — Mr. Maintenance',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.review-notification',
            with: ['testimonial' => $this->testimonial],
        );
    }
}
