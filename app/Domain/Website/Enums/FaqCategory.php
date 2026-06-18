<?php

namespace App\Domain\Website\Enums;

enum FaqCategory: string
{
    case ADMISSIONS = "admissions";
    case ACADEMICS = "academics";
    case FEES = "fees";
    case GENERAL = "general";
}