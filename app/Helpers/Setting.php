<?php

namespace App\Helpers;

use App\Domain\Website\Models\WebsiteSetting;
use Illuminate\Support\Facades\Cache;

class Setting
{
    /**
     * Get a website setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        return Cache::rememberForever('setting_' . $key, function () use ($key, $default) {
            $setting = WebsiteSetting::where('key', $key)->first();
            
            if (!$setting) {
                return $default;
            }

            $value = $setting->value;

            // Handle boolean types
            if ($setting->type === 'boolean') {
                return filter_var($value, FILTER_VALIDATE_BOOLEAN);
            }

            // Handle json types
            if ($setting->type === 'json' && is_string($value)) {
                $decoded = json_decode($value, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $decoded;
                }
            }

            // Remove surrounding quotes from standard strings if Filament saved them as JSON strings
            if (is_string($value) && str_starts_with($value, '"') && str_ends_with($value, '"')) {
                return trim($value, '"');
            }

            return $value;
        });
    }

    /**
     * Clear the setting cache.
     */
    public static function clearCache()
    {
        $settings = WebsiteSetting::all();
        foreach ($settings as $setting) {
            Cache::forget('setting_' . $setting->key);
        }
    }
}
