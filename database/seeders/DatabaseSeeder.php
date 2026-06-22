<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the default admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@kamara.edu.et'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('admin1234'),
            ]
        );

        // Call other seeders
        $this->call([
            RoleSeeder::class,
            WebsiteSettingSeeder::class,
        ]);
    }
}
