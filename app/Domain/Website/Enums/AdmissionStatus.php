<?php

namespace App\Domain\Website\Enums;

enum AdmissionStatus: string
{
    case SUBMITTED = "submitted";
    case UNDER_REVIEW = "under_review";
    case APPROVED = "approved";
    case DECLINED = "declined";
    case WITHDRAWN = "withdrawn";
}