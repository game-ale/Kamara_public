<?php

namespace App\Application\Website\DTOs;

use Illuminate\Http\UploadedFile;

class AdmissionSubmissionData
{
    public function __construct(
        public string $studentFirstName,
        public string $studentLastName,
        public string $studentDob,
        public string $studentGender,
        public string $applyingGrade,
        public string $parentFirstName,
        public string $parentLastName,
        public string $parentRelation,
        public string $parentEmail,
        public string $parentPhone,
        public string $parentAddress,
        public UploadedFile $birthCertificate,
        public ?UploadedFile $previousTranscript = null,
    ) {}
}
