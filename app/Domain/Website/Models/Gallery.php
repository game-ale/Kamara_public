<?php

namespace App\Domain\Website\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
