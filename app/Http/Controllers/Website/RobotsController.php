<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class RobotsController extends Controller
{
    public function index()
    {
        $content = "User-agent: *\nDisallow: /admin/\nSitemap: " . url("/sitemap.xml");
        return response($content)->header("Content-Type", "text/plain");
    }
}
