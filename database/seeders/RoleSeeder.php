<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'manage_admissions',
            'manage_news',
            'manage_events',
            'manage_galleries',
            'manage_pages',
            'manage_leadership',
            'manage_faqs',
            'manage_testimonials',
            'manage_announcements',
            'manage_settings',
            'manage_users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Super Admin — full access
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Registrar — admissions only
        $registrar = Role::firstOrCreate(['name' => 'Registrar']);
        $registrar->givePermissionTo(['manage_admissions']);

        // Editor — content management
        $editor = Role::firstOrCreate(['name' => 'Editor']);
        $editor->givePermissionTo([
            'manage_news',
            'manage_events',
            'manage_galleries',
            'manage_pages',
            'manage_leadership',
            'manage_faqs',
            'manage_testimonials',
            'manage_announcements',
        ]);

        // Assign Super Admin role to the existing admin user
        $admin = User::where('email', 'admin@kamara.edu.et')->first();
        if ($admin) {
            $admin->assignRole('Super Admin');
        }
    }
}
