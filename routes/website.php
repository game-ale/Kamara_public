<?php

use Illuminate\Support\Facades\Route;

// Public Website Routes
Route::middleware(['web'])->group(function () {
    // SEO routes
    Route::get('/sitemap.xml', [\App\Http\Controllers\Website\SitemapController::class, 'index'])->name('sitemap');
    Route::get('/robots.txt', [\App\Http\Controllers\Website\RobotsController::class, 'index'])->name('robots');
});
