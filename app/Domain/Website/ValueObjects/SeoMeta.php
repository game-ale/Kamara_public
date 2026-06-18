<?php

namespace App\Domain\Website\ValueObjects;

class SeoMeta
{
    public function __construct(
        public string $title,
        public string $description,
        public ?string $ogImage = null,
        public ?string $schemaType = null,
        public bool $noindex = false
    ) {}
}