<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Website\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::create([
            'title' => 'Campus Tour',
            'slug' => 'campus-tour',
            'description' => 'A look around our beautiful Adama campus.',
            'is_published' => true,
            'published_at' => now(),
        ]);
    }
}
