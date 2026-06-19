<?php

namespace App\Livewire\Website\Admissions;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Application\Website\Actions\SubmitAdmissionAction;
use App\Application\Website\DTOs\AdmissionSubmissionData;

class AdmissionsForm extends Component
{
    use WithFileUploads;

    public int $currentStep = 1;
    public int $totalSteps = 4;

    // Step 1: Student Info
    public $studentFirstName;
    public $studentLastName;
    public $studentDob;
    public $studentGender;
    public $applyingGrade;

    // Step 2: Parent Info
    public $parentFirstName;
    public $parentLastName;
    public $parentRelation;
    public $parentEmail;
    public $parentPhone;
    public $parentAddress;

    // Step 3: Documents
    public $birthCertificate;
    public $previousTranscript;

    public function mount()
    {
        $this->applyingGrade = '1';
        $this->studentGender = 'Male';
        $this->parentRelation = 'Mother';
    }

    public function nextStep()
    {
        $this->validateStep();
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function validateStep()
    {
        if ($this->currentStep === 1) {
            $this->validate([
                'studentFirstName' => 'required|string|max:255',
                'studentLastName' => 'required|string|max:255',
                'studentDob' => 'required|date|before:today',
                'studentGender' => 'required|in:Male,Female',
                'applyingGrade' => 'required|string',
            ]);
        } elseif ($this->currentStep === 2) {
            $this->validate([
                'parentFirstName' => 'required|string|max:255',
                'parentLastName' => 'required|string|max:255',
                'parentRelation' => 'required|string',
                'parentEmail' => 'required|email|max:255',
                'parentPhone' => 'required|string|max:20',
                'parentAddress' => 'required|string|max:500',
            ]);
        } elseif ($this->currentStep === 3) {
            $this->validate([
                'birthCertificate' => 'required|file|mimes:pdf,jpg,png|max:5120',
                'previousTranscript' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
            ]);
        }
    }

    public function submit(SubmitAdmissionAction $action)
    {
        $this->validateStep(); // Validate final step

        // Create DTO (We will define this properly next)
        $data = new AdmissionSubmissionData(
            studentFirstName: $this->studentFirstName,
            studentLastName: $this->studentLastName,
            studentDob: $this->studentDob,
            studentGender: $this->studentGender,
            applyingGrade: $this->applyingGrade,
            parentFirstName: $this->parentFirstName,
            parentLastName: $this->parentLastName,
            parentRelation: $this->parentRelation,
            parentEmail: $this->parentEmail,
            parentPhone: $this->parentPhone,
            parentAddress: $this->parentAddress,
            birthCertificate: $this->birthCertificate,
            previousTranscript: $this->previousTranscript
        );

        $reference = $action->execute($data);

        return redirect()->to('/admissions/confirmation/' . $reference);
    }

    public function render()
    {
        return view('livewire.website.admissions.admissions-form');
    }
}
