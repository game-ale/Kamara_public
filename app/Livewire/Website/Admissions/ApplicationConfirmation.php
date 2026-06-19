<?php

namespace App\Livewire\Website\Admissions;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class ApplicationConfirmation extends Component
{
    public string $reference;

    public function mount(string $reference)
    {
        $this->reference = $reference;
    }

    public function render()
    {
        return view('livewire.website.admissions.application-confirmation');
    }
}
