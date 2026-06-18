<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Website\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::create([
            'category' => 'admissions',
            'question' => 'How do I apply for my child?',
            'answer' => 'You can apply online through our Admissions portal.',
            'is_published' => true,
        ]);
    }
}
