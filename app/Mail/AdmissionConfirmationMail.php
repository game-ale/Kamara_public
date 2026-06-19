<?php

namespace App\Mail;

use App\Domain\Website\Models\Admission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdmissionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Admission $admission)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Received - Kamara School [' . $this->admission->reference . ']',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admissions.confirmation',
        );
    }
}
