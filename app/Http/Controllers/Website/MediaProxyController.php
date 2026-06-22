<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class MediaProxyController extends Controller
{
    /**
     * Serve a file from the supabase disk via a temporary signed URL redirect.
     * This handles private Supabase buckets by generating a short-lived
     * pre-signed S3 URL and redirecting the browser to it.
     */
    public function __invoke(Request $request)
    {
        $path = $request->query('path');

        if (!$path) {
            abort(404);
        }

        $disk = Storage::disk('supabase');

        // Removed $disk->exists() check to eliminate slow synchronous network calls to S3

        // Generate a 1-hour signed URL and redirect browser to it
        $temporaryUrl = $disk->temporaryUrl($path, now()->addHour());

        return redirect($temporaryUrl);
    }
}
