<?php
use App\Domain\Website\Models\LeadershipProfile;
use App\Domain\Website\Models\Faq;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('about');

render(function (\Illuminate\View\View $view) {
    $leadership = LeadershipProfile::orderBy('display_order')->get();
    $faqs = Faq::where('is_published', true)->orderBy('sort_order')->get();

    return $view->with('leadership', $leadership)->with('faqs', $faqs);
});
?>
<x-layouts.app title="About Us | Kamara School">
    {{-- PAGE HEADER --}}
    <section class="bg-navy-900 py-20 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">About Kamara School</h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">Discover our history, meet our leadership team, and learn what makes us the top educational institution in Adama.</p>
        </div>
    </section>

    {{-- HISTORY & MISSION --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-gold-500 text-sm font-semibold uppercase tracking-wider">Our Story</span>
                    <h2 class="text-3xl font-bold text-navy-800 mt-2 font-heading mb-6">A Legacy of Excellence</h2>
                    <div class="prose prose-lg text-slate-600">
                        <p>Founded with a vision to provide world-class education in Ethiopia, Kamara School has grown from a modest campus to a premier institution serving thousands of students from Kindergarten through Grade 12.</p>
                        <p>Our mission is to nurture intellectual curiosity, moral integrity, and social responsibility in every student, preparing them to be the leaders of tomorrow.</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="bg-slate-100 rounded-2xl aspect-[4/5] overflow-hidden">
                            <img src="{{ asset('images/about/students-classroom.png') }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="bg-slate-100 rounded-2xl aspect-[4/5] overflow-hidden">
                            <img src="{{ asset('images/about/students-lunch.png') }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- LEADERSHIP --}}
    <section class="py-24 bg-slate-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-gold-500 text-sm font-semibold uppercase tracking-wider">Our Team</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-navy-800 mt-3 font-heading">School Leadership</h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($leadership as $leader)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="aspect-[4/5] bg-gray-100 overflow-hidden relative">
                        @if($leader->photo)
                            <img src="{{ route('media.proxy', ['path' => $leader->photo]) }}" alt="{{ $leader->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-navy-900/5 group-hover:scale-105 transition-transform duration-500">
                                <span class="text-6xl text-navy-800/20 font-bold">{{ substr($leader->name, 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-navy-800 font-heading">{{ $leader->name }}</h3>
                        <p class="text-gold-500 font-semibold text-sm mb-4">{{ $leader->title }}</p>
                        @if($leader->bio)
                            <p class="text-sm text-slate-600 line-clamp-3">{{ $leader->bio }}</p>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12 text-gray-500">
                    Leadership profiles will appear here.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- FAQs --}}
    <section class="py-24 bg-white border-t border-gray-100" x-data="{ activeFaq: null }">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-gold-500 text-sm font-semibold uppercase tracking-wider">Support</span>
                <h2 class="text-3xl font-bold text-navy-800 mt-3 font-heading">Frequently Asked Questions</h2>
            </div>
            
            <div class="space-y-4">
                @forelse($faqs as $index => $faq)
                <div class="border border-gray-100 rounded-2xl overflow-hidden transition-all duration-300" :class="{'bg-slate-50 border-gray-200': activeFaq === {{ $index }}}">
                    <button @click="activeFaq = activeFaq === {{ $index }} ? null : {{ $index }}" class="w-full flex items-center justify-between p-6 text-left focus:outline-none">
                        <span class="font-bold text-navy-800">{{ $faq->question }}</span>
                        <svg class="w-5 h-5 text-gold-500 transform transition-transform duration-300" :class="{'rotate-180': activeFaq === {{ $index }}}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="activeFaq === {{ $index }}" x-collapse>
                        <div class="p-6 pt-0 text-slate-600 prose prose-sm max-w-none">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    No FAQs available yet.
                </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>
