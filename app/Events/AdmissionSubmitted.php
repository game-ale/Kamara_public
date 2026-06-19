<?php

namespace App\Events;

use App\Domain\Website\Models\Admission;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdmissionSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Admission $admission)
    {
    }
}
