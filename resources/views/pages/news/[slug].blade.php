<?php
use App\Domain\Website\Models\News;
use function Laravel\Folio\name;
use function Laravel\Folio\render;
use Illuminate\Support\Facades\Storage;

name('news.show');

render(function (\Illuminate\View\View $view, $slug) {
    $newsItem = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return $view->with('newsItem', $newsItem);
});
?>
<x-layouts.app :title="$newsItem->title . ' | Kamara School'">
    {{-- ARTICLE HEADER --}}
    <section class="bg-navy-900 py-16 border-b border-white/10 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-navy-800 to-navy-700 opacity-90"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            @if($newsItem->category)
                <span class="inline-block px-3 py-1 bg-gold-500/20 text-gold-400 text-xs font-bold rounded-full mb-6 tracking-wider uppercase">
                    {{ $newsItem->category->name }}
                </span>
            @endif
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white font-heading leading-tight">{{ $newsItem->title }}</h1>
            <div class="mt-6 flex items-center justify-center gap-4 text-sm text-gray-400 font-medium">
                <span>{{ $newsItem->published_at ? $newsItem->published_at->format('F d, Y') : $newsItem->created_at->format('F d, Y') }}</span>
                <span>•</span>
                <span>By {{ $newsItem->author_id ? $newsItem->author->name ?? 'Admin' : 'Kamara Staff' }}</span>
            </div>
        </div>
    </section>

    {{-- ARTICLE BODY --}}
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($newsItem->featured_image)
            <div class="mb-12 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                <img src="{{ route('media.proxy', ['path' => $newsItem->featured_image]) }}" alt="{{ $newsItem->title }}" class="w-full h-auto object-cover max-h-[600px]">
            </div>
            @endif

            <div class="prose prose-lg max-w-none text-gray-700">
                {!! $newsItem->body !!}
            </div>

            <div class="mt-16 pt-8 border-t border-gray-100 flex justify-between items-center">
                <a href="/news" class="inline-flex items-center gap-2 text-navy-800 font-bold hover:text-gold-500 transition">
                    <span class="text-xl">←</span> Back to News
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
