<?php
use App\Domain\Website\Models\Faq;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('faq');

render(function (\Illuminate\View\View $view) {
    // Fetch published FAQs, order by sort_order, and group by category
    $faqsByCategory = Faq::where('is_published', true)
        ->orderBy('sort_order')
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy('category');

    return $view->with('faqsByCategory', $faqsByCategory);
});
?>
<x-layouts.app title="Frequently Asked Questions | Kamara School">
    {{-- PAGE HEADER --}}
    <section class="bg-navy-900 py-20 border-b border-white/10 relative overflow-hidden">
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">Frequently Asked Questions</h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">Find answers to the most common questions about admissions, our curriculum, campus life, and more.</p>
        </div>
    </section>

    {{-- FAQ SECTION --}}
    <section class="py-24 bg-slate-50 min-h-[50vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @forelse($faqsByCategory as $category => $faqs)
                <div class="mb-12 last:mb-0">
                    <h2 class="text-2xl font-bold text-navy-800 font-heading mb-6 border-b border-gray-200 pb-2">
                        {{ $category ?: 'General Information' }}
                    </h2>
                    
                    <div class="space-y-4">
                        @foreach($faqs as $faq)
                            <div x-data="{ expanded: false }" class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden transition-all duration-300">
                                <h2>
                                    <button @click="expanded = !expanded" type="button" class="flex items-center justify-between w-full p-6 text-left focus:outline-none focus:bg-gray-50 transition-colors">
                                        <span class="text-lg font-bold text-navy-800 font-heading pr-8">{{ $faq->question }}</span>
                                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-gold-500/10 text-gold-500 transition-transform duration-300" :class="{ 'rotate-180': expanded }">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                        </span>
                                    </button>
                                </h2>
                                <div x-show="expanded" x-collapse x-cloak>
                                    <div class="p-6 pt-0 text-slate-600 leading-relaxed border-t border-gray-50 mt-2">
                                        {!! nl2br(e($faq->answer)) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm">
                    <span class="text-5xl block mb-4">❓</span>
                    <h3 class="text-xl font-bold text-navy-800 font-heading">No FAQs Available</h3>
                    <p class="text-gray-500 mt-2">We are currently updating our frequently asked questions. Please contact us directly if you have an inquiry.</p>
                    <div class="mt-6">
                        <a href="/contact" class="inline-block px-6 py-3 bg-navy-800 text-white font-semibold rounded-lg hover:bg-navy-700 transition-colors">
                            Contact Us
                        </a>
                    </div>
                </div>
            @endforelse
            
            @if($faqsByCategory->isNotEmpty())
            <div class="mt-16 text-center p-8 bg-gold-500/10 rounded-2xl border border-gold-500/20">
                <h3 class="text-xl font-bold text-navy-800 font-heading mb-2">Still have questions?</h3>
                <p class="text-slate-600 mb-6">If you couldn't find the answer to your question, feel free to reach out to our administration team.</p>
                <a href="/contact" class="inline-block px-8 py-3 bg-navy-800 text-white font-semibold rounded-xl hover:bg-navy-700 transition-colors shadow-lg">
                    Get in Touch
                </a>
            </div>
            @endif

        </div>
    </section>
</x-layouts.app>
