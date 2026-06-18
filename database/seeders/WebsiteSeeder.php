<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            WebsiteSettingSeeder::class,
            PageSeeder::class,
            NewsSeeder::class,
            EventSeeder::class,
            GallerySeeder::class,
            LeadershipSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
