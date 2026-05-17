<?php

namespace App\Mail\Transports;

use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mime\MessageConverter;
use Illuminate\Support\Facades\Http;

class ResendTransport extends AbstractTransport
{
    protected $key;

    public function __construct($key)
    {
        parent::__construct();
        $this->key = $key;
    }

    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());

        $html = $email->getHtmlBody();
        $text = $email->getTextBody();
        
        $to = collect($email->getTo())->map(fn($address) => $address->getAddress())->toArray();
        $subject = $email->getSubject();

        // Resend free tier sends from onboarding@resend.dev
        $from = 'onboarding@resend.dev';

        // Read the verified email address dynamically from env, fallback to your Resend account email
        $adminEmail = env('ADMIN_EMAIL', 'abhaypandey23@lpu.in');
        
        // In Resend sandbox mode, all outbound emails must be redirected to your verified Resend email.
        // This ensures Resend never blocks the email and you receive all test/customer notifications!
        $recipients = [$adminEmail];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->key,
            'Content-Type' => 'application/json',
        ])->post('https://api.resend.com/emails', [
            'from' => 'Mr. Maintenance <' . $from . '>',
            'to' => $recipients,
            'subject' => $subject,
            'html' => $html ?? $text,
        ]);

        if ($response->failed()) {
            throw new \Exception('Resend API failed: ' . $response->body());
        }
    }

    public function __toString(): string
    {
        return 'resend';
    }
}
