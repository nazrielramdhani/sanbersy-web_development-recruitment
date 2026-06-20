<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventRegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $eventName;
    public $eventDate;

    public function __construct($userName, $eventName, $eventDate)
    {
        $this->userName = $userName;
        $this->eventName = $eventName;
        $this->eventDate = $eventDate;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Pendaftaran Event - ' . $this->eventName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.event-confirmation',
        );
    }
}