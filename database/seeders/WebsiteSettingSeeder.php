<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Website\Models\WebsiteSetting;

class WebsiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['group' => 'contact', 'key' => 'email', 'value' => json_encode('info@kamaraschool.com')],
            ['group' => 'contact', 'key' => 'phone', 'value' => json_encode('+251 911 234 567')],
            ['group' => 'contact', 'key' => 'address', 'value' => json_encode('Bole Road, Adama, Ethiopia')],
            ['group' => 'social', 'key' => 'facebook', 'value' => json_encode('https://web.facebook.com/kamaraschool/?_rdc=1&_rdr#')],
            ['group' => 'social', 'key' => 'twitter', 'value' => json_encode('https://twitter.com/kamaraschool')],
        ];

        foreach ($settings as $setting) {
            WebsiteSetting::create($setting);
        }
    }
}
