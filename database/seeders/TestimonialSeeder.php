<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Website\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::create([
            'quote' => 'Kamara School has completely transformed my child\'s approach to learning.',
            'author_name' => 'Marta T.',
            'author_role' => 'Parent',
            'author_grade' => 'Grade 4',
            'is_featured' => true,
        ]);
    }
}
