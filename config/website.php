<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Website Enabled
    |--------------------------------------------------------------------------
    |
    | Feature flag to quickly take the public website offline without
    | affecting the admin portal or management APIs.
    |
    */
    'enabled' => env('WEBSITE_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Default Meta Information
    |--------------------------------------------------------------------------
    */
    'meta' => [
        'title' => env('APP_NAME', 'Kamara School'),
        'description' => 'Premium Private KG–Grade 12 Education in Adama, Ethiopia',
        'keywords' => 'Kamara School, Adama schools, private schools in Adama, best school in Adama, KG Grade 12 Adama',
    ],

    /*
    |--------------------------------------------------------------------------
    | Caching Configuration
    |--------------------------------------------------------------------------
    */
    'cache' => [
        'homepage_ttl' => env('WEBSITE_CACHE_HOMEPAGE_TTL', 600), // 10 minutes
        'news_ttl' => env('WEBSITE_CACHE_NEWS_TTL', 300), // 5 minutes
        'events_ttl' => env('WEBSITE_CACHE_EVENTS_TTL', 3600), // 1 hour
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limits
    |--------------------------------------------------------------------------
    */
    'rate_limits' => [
        'contact' => env('WEBSITE_CONTACT_RATE_LIMIT', 5), // requests per hour
        'admission' => env('WEBSITE_APPLY_RATE_LIMIT', 3), // requests per hour
    ],
];
