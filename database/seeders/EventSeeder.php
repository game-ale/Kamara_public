<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Website\Models\Event;
use App\Domain\Website\Models\EventCategory;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $category = EventCategory::create([
            'name' => 'Academic Calendar',
            'slug' => 'academic-calendar',
        ]);

        Event::create([
            'category_id' => $category->id,
            'title' => 'Parent-Teacher Meeting',
            'slug' => 'parent-teacher-meeting-q1',
            'description' => 'Quarter 1 progress review.',
            'location' => 'Main Hall',
            'starts_at' => now()->addDays(14),
            'ends_at' => now()->addDays(14)->addHours(2),
            'is_published' => true,
        ]);
    }
}
