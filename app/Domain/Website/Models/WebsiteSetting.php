<?php

namespace App\Domain\Website\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(function ($setting) {
            \Illuminate\Support\Facades\Cache::forget('setting_' . $setting->key);
        });

        static::deleted(function ($setting) {
            \Illuminate\Support\Facades\Cache::forget('setting_' . $setting->key);
        });
    }
}
