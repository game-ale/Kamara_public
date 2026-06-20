<?php
use App\Domain\Website\Models\News;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('news.index');

render(function (\Illuminate\View\View $view) {
    $news = News::with('category')->where('is_published', true)->orderBy('published_at', 'desc')->paginate(9);

    return $view->with('news', $news);
});
?>
<x-layouts.app title="News & Updates | Kamara School">
    {{-- PAGE HEADER --}}
    <section class="bg-navy-900 py-20 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">News & Updates</h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">Stay informed with the latest happenings, achievements, and announcements from Kamara School.</p>
        </div>
    </section>

    {{-- NEWS GRID --}}
    <section class="py-24 bg-slate-50 min-h-[50vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($news as $newsItem)
                <a href="/news/{{ $newsItem->slug }}" class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col">
                    <div class="aspect-[16/10] bg-gray-100 overflow-hidden relative shrink-0">
                        @if($newsItem->featured_image)
                            <img src="{{ Storage::url($newsItem->featured_image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-navy-900/5 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <span class="text-4xl">📰</span>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-sm">
                            <span class="text-xs font-bold text-navy-800">{{ $newsItem->published_at ? $newsItem->published_at->format('M d, Y') : $newsItem->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        @if($newsItem->category)
                            <span class="text-xs font-bold text-gold-500 uppercase tracking-wider mb-2 block">{{ $newsItem->category->name }}</span>
                        @endif
                        <h3 class="text-xl font-bold text-navy-800 mb-3 font-heading group-hover:text-gold-500 transition-colors line-clamp-2">{{ $newsItem->title }}</h3>
                        <p class="text-slate-600 text-sm line-clamp-3 leading-relaxed flex-grow">{{ $newsItem->excerpt ?? Str::limit(strip_tags($newsItem->body), 120) }}</p>
                        <div class="mt-6 flex items-center text-navy-800 text-sm font-semibold group-hover:text-gold-500 transition-colors">
                            Read More <span class="ml-1 transition-transform group-hover:translate-x-1">→</span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <span class="text-5xl block mb-4">📰</span>
                    <h3 class="text-xl font-bold text-navy-800 font-heading">No News Yet</h3>
                    <p class="text-gray-500 mt-2">Check back soon for the latest updates.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-12">
                {{ $news->links() }}
            </div>
        </div>
    </section>
</x-layouts.app>
