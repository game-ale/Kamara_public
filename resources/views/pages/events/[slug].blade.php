<?php
use App\Domain\Website\Models\Event;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('events.show');

render(function (\Illuminate\View\View $view, $slug) {
    $event = Event::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return $view->with('event', $event);
});
?>
<x-layouts.app :title="$event->title . ' | Kamara School'">
    {{-- EVENT HEADER --}}
    <section class="bg-navy-900 py-16 border-b border-white/10 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-navy-800 to-navy-700 opacity-90"></div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="/events" class="inline-flex items-center gap-2 text-gold-500 hover:text-gold-400 font-medium mb-8 transition">
                <span>←</span> Back to Events
            </a>
            <div class="grid md:grid-cols-[1fr_auto] gap-8 items-start">
                <div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white font-heading leading-tight">{{ $event->title }}</h1>
                </div>
                @if($event->starts_at)
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 text-center min-w-[120px]">
                    <span class="block text-4xl font-bold text-white font-heading mb-1">{{ \Carbon\Carbon::parse($event->starts_at)->format('d') }}</span>
                    <span class="block text-sm font-bold text-gold-400 uppercase tracking-wider">{{ \Carbon\Carbon::parse($event->starts_at)->format('M Y') }}</span>
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- EVENT DETAILS --}}
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-[2fr_1fr] gap-12">
                {{-- Main Content --}}
                <div>
                    <h2 class="text-2xl font-bold text-navy-800 font-heading mb-6">About This Event</h2>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        {!! $event->description !!}
                    </div>
                </div>

                {{-- Sidebar --}}
                <div>
                    <div class="bg-slate-50 rounded-2xl p-8 border border-gray-100 sticky top-28">
                        <h3 class="text-lg font-bold text-navy-800 font-heading mb-6 border-b border-gray-200 pb-4">Event Details</h3>
                        
                        <ul class="space-y-6">
                            @if($event->starts_at)
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-navy-800 text-sm">Date & Time</p>
                                    <p class="text-slate-600 text-sm mt-1">{{ \Carbon\Carbon::parse($event->starts_at)->format('M d, Y \a\t h:i A') }}</p>
                                    @if($event->ends_at)
                                        <p class="text-slate-500 text-xs mt-0.5">Ends: {{ \Carbon\Carbon::parse($event->ends_at)->format('M d, Y \a\t h:i A') }}</p>
                                    @endif
                                </div>
                            </li>
                            @endif
                            
                            @if($event->location)
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-navy-800 text-sm">Location</p>
                                    <p class="text-slate-600 text-sm mt-1">{{ $event->location }}</p>
                                </div>
                            </li>
                            @endif
                        </ul>

                        @if($event->registration_url)
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <a href="{{ $event->registration_url }}" target="_blank" class="w-full block text-center px-6 py-3 bg-navy-800 text-white font-bold rounded-xl hover:bg-navy-700 transition-colors shadow-lg">
                                Register Now
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
