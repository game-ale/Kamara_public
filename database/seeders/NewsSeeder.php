<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Website\Models\News;
use App\Domain\Website\Models\NewsCategory;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $category = NewsCategory::create([
            'name' => 'General Updates',
            'slug' => 'general-updates',
        ]);

        News::create([
            'category_id' => $category->id,
            'title' => 'Welcome to the New Academic Year',
            'slug' => 'welcome-new-academic-year',
            'excerpt' => 'A warm welcome to all students and parents...',
            'body' => '<p>We are excited to begin...</p>',
            'is_published' => true,
            'published_at' => now(),
        ]);
    }
}
