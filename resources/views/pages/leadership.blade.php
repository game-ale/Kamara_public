<?php
use App\Domain\Website\Models\LeadershipProfile;
use function Laravel\Folio\name;
use function Laravel\Folio\render;
use Illuminate\Support\Facades\Storage;

name('leadership');

render(function (\Illuminate\View\View $view) {
    $leaders = LeadershipProfile::where('is_published', true)
        ->orderBy('display_order')
        ->orderBy('created_at', 'asc')
        ->get();

    return $view->with('leaders', $leaders);
});
?>
<x-layouts.app title="School Leadership | Kamara School">
    {{-- PAGE HEADER --}}
    <section class="bg-navy-900 py-20 border-b border-white/10 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-navy-800 to-navy-700 opacity-90"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">Our Leadership</h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">Meet the dedicated team of educators and administrators guiding Kamara School towards excellence.</p>
        </div>
    </section>

    {{-- LEADERSHIP GRID --}}
    <section class="py-24 bg-slate-50 min-h-[50vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($leaders as $leader)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                        <div class="aspect-[4/5] relative overflow-hidden bg-gray-100">
                            @if($leader->photo)
                                <img src="{{ route('media.proxy', ['path' => $leader->photo]) }}" alt="{{ $leader->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-navy-900/5 group-hover:scale-105 transition-transform duration-500">
                                    <span class="text-6xl text-navy-800/20">👤</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-navy-900/90 via-navy-900/20 to-transparent opacity-80"></div>
                            
                            {{-- Info overlay on image --}}
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="text-2xl font-bold font-heading mb-1">{{ $leader->name }}</h3>
                                <p class="text-gold-400 font-semibold text-sm tracking-wide uppercase">{{ $leader->title }}</p>
                            </div>
                        </div>
                        
                        <div class="p-6 h-full border-t border-gray-50">
                            @if($leader->bio)
                                <div class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-4 group-hover:line-clamp-none transition-all duration-500">
                                    {!! nl2br(e($leader->bio)) !!}
                                </div>
                            @endif

                            @if($leader->email)
                                <a href="mailto:{{ $leader->email }}" class="inline-flex items-center text-sm font-semibold text-navy-800 hover:text-gold-500 transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    {{ $leader->email }}
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm">
                        <span class="text-5xl block mb-4">👥</span>
                        <h3 class="text-xl font-bold text-navy-800 font-heading">Leadership Profiles Coming Soon</h3>
                        <p class="text-gray-500 mt-2">We are currently updating our team profiles. Please check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- JOIN THE TEAM CTA --}}
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-navy-800 font-heading mb-4">Interested in joining Kamara School?</h2>
            <p class="text-slate-600 mb-8">We are always looking for passionate educators and administrators to join our growing team.</p>
            <a href="/contact" class="inline-block px-8 py-3 border-2 border-navy-800 text-navy-800 font-bold rounded-xl hover:bg-navy-800 hover:text-white transition-all shadow-sm">
                View Career Opportunities
            </a>
        </div>
    </section>
</x-layouts.app>
