<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view("website.sitemap")->header("Content-Type", "text/xml");
    }
}
