<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $contracts = [
            'Page', 'News', 'Event', 'Gallery', 'Admission', 'Leadership', 'Faq', 'ContactMessage', 'Announcement', 'Testimonial', 'Media', 'WebsiteSetting'
        ];

        foreach ($contracts as $contract) {
            $this->app->bind(
                "App\\Domain\\Website\\Repositories\\Contracts\\{$contract}RepositoryInterface",
                "App\\Infrastructure\\Website\\Repositories\\Eloquent{$contract}Repository"
            );
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(database_path('migrations/website'));
        $this->mergeConfigFrom(__DIR__.'/../../config/website.php', 'website');
    }
}
