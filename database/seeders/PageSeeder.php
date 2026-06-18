<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Website\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'about',
                'title' => 'About Kamara School',
                'meta_title' => 'About Us - Kamara School Adama',
                'meta_description' => 'Learn about Kamara School, our mission, vision, and core values.',
                'body' => '<p>Kamara School provides premium education...</p>',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'slug' => 'programs',
                'title' => 'Our Programs',
                'meta_title' => 'Academic Programs - Kamara School',
                'meta_description' => 'Explore our KG to Grade 12 programs.',
                'body' => '<p>We offer a comprehensive curriculum...</p>',
                'is_published' => true,
                'published_at' => now(),
            ]
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
