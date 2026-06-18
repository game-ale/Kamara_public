<?php

namespace App\Domain\Website\ValueObjects;

class PhoneNumber
{
    public function __construct(public string $number) {}
}