<?php

namespace App\Domain\Website\Enums;

enum PageTemplate: string
{
    case DEFAULT = "default";
    case ABOUT = "about";
    case PROGRAMS = "programs";
    case FULL_WIDTH = "full_width";
}