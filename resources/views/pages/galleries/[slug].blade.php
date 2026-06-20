<?php
use App\Domain\Website\Models\Gallery;
use function Laravel\Folio\name;
use function Laravel\Folio\render;
use Illuminate\Support\Facades\Storage;

name('galleries.show');

render(function (\Illuminate\View\View $view, $slug) {
    $gallery = Gallery::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return $view->with('gallery', $gallery);
});
?>
<x-layouts.app :title="$gallery->title . ' | Kamara School'">
    {{-- GALLERY HEADER --}}
    <section class="bg-navy-900 py-16 border-b border-white/10 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-navy-800 to-navy-700 opacity-90"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">{{ $gallery->title }}</h1>
            @if($gallery->subtitle)
                <p class="mt-4 text-lg text-gray-300">{{ $gallery->subtitle }}</p>
            @endif
        </div>
    </section>

    {{-- GALLERY GRID --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse($gallery->images as $imageId)
                    @php
                        $url = Storage::url($imageId);
                    @endphp
                    <a href="{{ $url }}" target="_blank" class="group">
                        <img src="{{ $url }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover rounded-lg shadow-sm transition-transform duration-300 group-hover:scale-105">
                    </a>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        No images available for this gallery.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>
