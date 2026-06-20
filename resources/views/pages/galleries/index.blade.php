<?php
use App\Domain\Website\Models\Gallery;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('galleries.index');

render(function (\Illuminate\View\View $view) {
    $galleries = Gallery::where('is_published', true)->orderBy('published_at', 'desc')->paginate(12);

    return $view->with('galleries', $galleries);
});
?>
<x-layouts.app title="Gallery | Kamara School">
    {{-- PAGE HEADER --}}
    <section class="bg-navy-900 py-20 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">Campus Life in Pictures</h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">Explore our vibrant campus, vibrant classrooms, and special events through our photo galleries.</p>
        </div>
    </section>

    {{-- GALLERIES GRID --}}
    <section class="py-24 bg-slate-50 min-h-[50vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($galleries as $gallery)
                <a href="/galleries/{{ $gallery->slug }}" class="group relative bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 block aspect-[4/3]">
                    @if($gallery->cover_image)
                        <img src="{{ Storage::url($gallery->cover_image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-navy-900/5 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                            <span class="text-4xl">📸</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-900/90 via-navy-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-lg font-bold text-white mb-1 font-heading line-clamp-1 group-hover:text-gold-400 transition-colors">{{ $gallery->title }}</h3>
                        <p class="text-xs text-gray-300">{{ $gallery->images ? count($gallery->images) : 0 }} Photos</p>
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <span class="text-5xl block mb-4">📸</span>
                    <h3 class="text-xl font-bold text-navy-800 font-heading">No Galleries Yet</h3>
                    <p class="text-gray-500 mt-2">We'll upload some beautiful photos soon.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-12">
                {{ $galleries->links() }}
            </div>
        </div>
    </section>
</x-layouts.app>
