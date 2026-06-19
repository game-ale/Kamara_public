<?php

namespace App\Listeners;

use App\Events\AdmissionSubmitted;
use App\Mail\AdmissionConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendAdmissionConfirmationMail implements ShouldQueue
{
    public function handle(AdmissionSubmitted $event): void
    {
        Mail::to($event->admission->parent_email)
            ->send(new AdmissionConfirmationMail($event->admission));
    }
}
