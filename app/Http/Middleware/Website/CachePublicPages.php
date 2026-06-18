<?php

namespace App\Http\Middleware\Website;

use Closure;
use Illuminate\Http\Request;

class CachePublicPages
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if (app()->environment("production")) {
            $response->header("Cache-Control", "public, max-age=900");
        }
        return $response;
    }
}
