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

        // Check if we are running in free sandbox mode where we can only send to the admin email
        $adminEmail = 'abhaypandey9425@gmail.com';
        
        // Filter recipients: on Resend sandbox, we can only send to the registered account owner
        $recipients = array_values(array_filter($to, function($addr) use ($adminEmail) {
            return strtolower($addr) === strtolower($adminEmail);
        }));

        if (empty($recipients)) {
            \Log::info("Skipping non-admin email in Sandbox mode: " . implode(', ', $to));
            return;
        }

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
