<?php
use App\Domain\Website\Models\Event;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('events.index');

render(function (\Illuminate\View\View $view) {
    $events = Event::where('is_published', true)
                    ->orderBy('starts_at', 'asc')
                    ->whereDate('ends_at', '>=', today())
                    ->orWhere(function ($q) {
                        $q->where('is_published', true)
                          ->whereNull('ends_at')
                          ->whereDate('starts_at', '>=', today());
                    })
                    ->paginate(9);

    return $view->with('events', $events);
});
?>
<x-layouts.app title="Events | Kamara School">
    {{-- PAGE HEADER --}}
    <section class="bg-navy-900 py-20 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">Upcoming Events</h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">Mark your calendars. Join us for academic showcases, sports tournaments, and community gatherings.</p>
        </div>
    </section>

    {{-- EVENTS GRID --}}
    <section class="py-24 bg-slate-50 min-h-[50vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($events as $event)
                <a href="/events/{{ $event->slug }}" class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col">
                    <div class="aspect-[16/10] bg-gray-100 overflow-hidden relative shrink-0">
                        <div class="w-full h-full bg-navy-900/5 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                            <span class="text-4xl">📅</span>
                        </div>
                        @if($event->starts_at)
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-sm text-center min-w-[3rem]">
                            <span class="block text-xl font-bold text-navy-800 leading-none mb-1">{{ \Carbon\Carbon::parse($event->starts_at)->format('d') }}</span>
                            <span class="block text-xs font-bold text-gold-500 uppercase">{{ \Carbon\Carbon::parse($event->starts_at)->format('M') }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-navy-800 mb-3 font-heading group-hover:text-gold-500 transition-colors line-clamp-2">{{ $event->title }}</h3>
                        
                        <div class="space-y-2 mb-4 text-sm text-slate-600">
                            @if($event->starts_at)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>{{ \Carbon\Carbon::parse($event->starts_at)->format('M d, Y \a\t h:i A') }}</span>
                            </div>
                            @endif
                            @if($event->location)
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gold-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span class="line-clamp-1">{{ $event->location }}</span>
                            </div>
                            @endif
                        </div>
                        
                        <p class="text-slate-600 text-sm line-clamp-2 leading-relaxed flex-grow">{{ strip_tags($event->description) }}</p>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <span class="text-5xl block mb-4">📅</span>
                    <h3 class="text-xl font-bold text-navy-800 font-heading">No Upcoming Events</h3>
                    <p class="text-gray-500 mt-2">We'll post our next activities here soon.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-12">
                {{ $events->links() }}
            </div>
        </div>
    </section>
</x-layouts.app>
