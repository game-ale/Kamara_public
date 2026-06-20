<?php
use App\Domain\Website\Models\Testimonial;
use App\Domain\Website\Models\News;

$testimonials = Testimonial::where('is_featured', true)->orderBy('display_order')->take(3)->get();
$latestNews = News::where('is_published', true)->orderBy('published_at', 'desc')->take(3)->get();
?>
<x-layouts.app title="Kamara School — Excellence in Education">
    @include('livewire.website.home.home-page', ['testimonials' => $testimonials, 'latestNews' => $latestNews])
</x-layouts.app>
