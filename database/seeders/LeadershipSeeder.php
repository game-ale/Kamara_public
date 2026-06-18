<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Website\Models\LeadershipProfile;

class LeadershipSeeder extends Seeder
{
    public function run(): void
    {
        LeadershipProfile::create([
            'name' => 'Dr. Abebe Bekele',
            'title' => 'School Principal',
            'bio' => 'Over 20 years of experience in educational leadership.',
            'email' => 'principal@kamaraschool.com',
            'is_published' => true,
        ]);
    }
}
