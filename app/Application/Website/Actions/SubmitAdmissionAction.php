<?php

namespace App\Application\Website\Actions;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Domain\Website\Models\Admission;
use App\Domain\Website\Models\AdmissionDocument;
use App\Domain\Website\Models\Media;
use App\Domain\Website\Enums\AdmissionStatus;
use App\Application\Website\DTOs\AdmissionSubmissionData;
use Illuminate\Http\UploadedFile;

class SubmitAdmissionAction
{
    public function execute(AdmissionSubmissionData $data): string
    {
        return DB::transaction(function () use ($data) {
            // 1. Generate unique reference: KAM-APP-{YEAR}-{RANDOM}
            $reference = 'KAM-APP-' . date('Y') . '-' . strtoupper(Str::random(6));

            // 2. Create the Admission record
            $admission = Admission::create([
                'reference' => $reference,
                'status' => AdmissionStatus::SUBMITTED->value,
                'student_name' => trim($data->studentFirstName . ' ' . $data->studentLastName),
                'student_dob' => $data->studentDob,
                'student_gender' => $data->studentGender,
                'grade_applying_for' => $data->applyingGrade,
                'parent_name' => trim($data->parentFirstName . ' ' . $data->parentLastName),
                'parent_email' => $data->parentEmail,
                'parent_phone' => $data->parentPhone,
                // 'parent_address' => $data->parentAddress, // Address doesn't exist in DB schema, omitting or saving to notes
                'medical_notes' => "Address: " . $data->parentAddress . "\nRelation: " . $data->parentRelation,
                'submitted_at' => now(),
            ]);

            // 3. Upload and attach documents
            $this->uploadDocument($admission, 'birth_certificate', $data->birthCertificate);
            
            if ($data->previousTranscript) {
                $this->uploadDocument($admission, 'previous_transcript', $data->previousTranscript);
            }

            // 4. Dispatch Email Event (We'll dispatch standard Laravel event)
            event(new \App\Events\AdmissionSubmitted($admission));

            return $reference;
        });
    }

    private function uploadDocument(Admission $admission, string $documentType, UploadedFile $file): void
    {
        // Fallback to local 'public' disk if Supabase keys are not set
        $disk = env('SUPABASE_ACCESS_KEY_ID') ? 'supabase' : 'public';
        
        $path = $file->store('admissions/' . date('Y/m'), $disk);

        $media = Media::create([
            'disk' => $disk,
            'path' => $path,
            'filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);

        AdmissionDocument::create([
            'admission_id' => $admission->id,
            'media_id' => $media->id,
            'document_type' => $documentType,
        ]);
    }
}
