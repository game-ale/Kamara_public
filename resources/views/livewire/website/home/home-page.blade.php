<div>
    {{-- HERO SECTION --}}
    <section class="relative bg-navy-900 overflow-hidden min-h-[85vh] flex items-center">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900 via-navy-800 to-navy-700 opacity-90"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 50%, rgba(212,160,23,0.08) 0%, transparent 50%), radial-gradient(circle at 75% 50%, rgba(184,134,11,0.06) 0%, transparent 50%);"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-gold-500/15 text-gold-400 text-xs font-semibold rounded-full mb-6 tracking-wide uppercase">
                    🏆 Ranked #1 Private School in Adama
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight font-heading">
                    Shaping Future
                    <span class="text-gold-400">Leaders</span>
                    Through Excellence
                </h1>
                <p class="mt-6 text-lg text-gray-300 leading-relaxed max-w-xl">
                    Kamara School provides world-class KG to Grade 12 education, combining academic rigor with character development in the heart of Adama, Ethiopia.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="/admissions" class="px-8 py-4 bg-gold-500 text-white font-semibold rounded-xl hover:bg-gold-400 transition-all shadow-lg shadow-gold-500/30 hover:shadow-gold-400/40 hover:-translate-y-0.5">
                        Start Application →
                    </a>
                    <a href="/about" class="px-8 py-4 border-2 border-white/20 text-white font-semibold rounded-xl hover:bg-white/10 transition-all">
                        Explore Our School
                    </a>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="relative">
                    <div class="w-full aspect-[4/3] rounded-2xl bg-gradient-to-br from-navy-700 to-navy-800 border border-white/10 flex items-center justify-center shadow-2xl">
                        <div class="text-center p-8">
                            <div class="w-24 h-24 bg-gold-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-gold-400 text-5xl font-bold font-heading">K</span>
                            </div>
                            <p class="text-white/60 text-sm">Campus Photo</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-xl p-4 shadow-xl">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-navy-800">98% Pass Rate</p>
                                <p class="text-xs text-gray-500">National Exam 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TRUST BADGES --}}
    <section class="bg-white py-8 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center opacity-60">
                <div class="text-center"><span class="text-sm font-semibold text-navy-800 uppercase tracking-wider">Ministry of Education</span></div>
                <div class="text-center"><span class="text-sm font-semibold text-navy-800 uppercase tracking-wider">Cambridge Affiliated</span></div>
                <div class="text-center"><span class="text-sm font-semibold text-navy-800 uppercase tracking-wider">ISO 9001 Certified</span></div>
                <div class="text-center"><span class="text-sm font-semibold text-navy-800 uppercase tracking-wider">Green Campus Award</span></div>
            </div>
        </div>
    </section>

    {{-- STATS COUNTER --}}
    <section class="bg-slate-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([['1,200+', 'Students Enrolled', '📚'], ['15+', 'Years of Excellence', '🏫'], ['98%', 'University Placement', '🎓'], ['50+', 'Qualified Teachers', '👨‍🏫']] as $stat)
                <div class="text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <span class="text-3xl mb-2 block">{{ $stat[2] }}</span>
                    <p class="text-3xl sm:text-4xl font-bold text-navy-800 font-heading">{{ $stat[0] }}</p>
                    <p class="text-sm text-slate-600 mt-1">{{ $stat[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FEATURE CARDS --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-gold-500 text-sm font-semibold uppercase tracking-wider">Why Kamara?</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-navy-800 mt-3 font-heading">What Sets Us Apart</h2>
                <p class="text-slate-600 mt-4">We combine academic excellence with holistic development.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['🎯', 'Academic Excellence', 'Rigorous curriculum aligned with national and international standards ensuring students achieve their full potential.'],
                    ['🌍', 'Global Perspective', 'Multicultural environment with English-medium instruction preparing students for a globally connected world.'],
                    ['🧪', 'Modern Facilities', 'State-of-the-art science labs, computer centers, library, and sports facilities supporting comprehensive learning.'],
                    ['👥', 'Small Class Sizes', 'Personalized attention with a maximum 1:25 teacher-student ratio ensuring no child is left behind.'],
                    ['🎨', 'Arts & Culture', 'Rich extracurricular programs including music, drama, visual arts, and cultural festivals.'],
                    ['🛡️', 'Safe Environment', 'Secure campus with trained counselors, health services, and a zero-tolerance anti-bullying policy.'],
                ] as $feature)
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-gold-400/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 bg-white">
                    <span class="text-4xl">{{ $feature[0] }}</span>
                    <h3 class="text-xl font-bold text-navy-800 mt-4 font-heading">{{ $feature[1] }}</h3>
                    <p class="text-slate-600 mt-3 text-sm leading-relaxed">{{ $feature[2] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROGRAMS OVERVIEW --}}
    <section class="py-24 bg-navy-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-gold-400 text-sm font-semibold uppercase tracking-wider">Our Programs</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3 font-heading">Academic Programs</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['KG Program', 'Ages 3-6', 'Play-based learning foundation with focus on early literacy, numeracy, and social-emotional development.', '/programs/kg'],
                    ['Primary School', 'Grades 1-8', 'Comprehensive curriculum building strong foundations in core subjects with enrichment activities.', '/programs/primary'],
                    ['Secondary School', 'Grades 9-12', 'University preparatory program with specialized streams in Natural Science and Social Science.', '/programs/secondary'],
                ] as $program)
                <div class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8 hover:bg-white/10 transition-all duration-300">
                    <span class="text-gold-400 text-xs font-semibold uppercase tracking-wider">{{ $program[1] }}</span>
                    <h3 class="text-xl font-bold text-white mt-3 font-heading">{{ $program[0] }}</h3>
                    <p class="text-gray-400 mt-3 text-sm leading-relaxed">{{ $program[2] }}</p>
                    <a href="{{ $program[3] }}" class="inline-flex items-center gap-1 mt-6 text-gold-400 text-sm font-semibold hover:text-gold-100 transition group-hover:gap-2">
                        Learn More <span>→</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-gold-500 text-sm font-semibold uppercase tracking-wider">Testimonials</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-navy-800 mt-3 font-heading">What Parents Say</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($testimonials ?? [] as $testimonial)
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300">
                    <div class="flex gap-1 mb-4 text-gold-400">★★★★★</div>
                    <p class="text-gray-700 italic leading-relaxed">"{{ $testimonial->quote }}"</p>
                    <div class="mt-6 flex items-center gap-3">
                        <div class="w-10 h-10 bg-navy-800 rounded-full flex items-center justify-center">
                            <span class="text-gold-400 font-bold text-sm">{{ substr($testimonial->author_name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="font-semibold text-navy-800 text-sm">{{ $testimonial->author_name }}</p>
                            <p class="text-xs text-slate-600">{{ $testimonial->author_role }} {{ $testimonial->author_grade ? ', ' . $testimonial->author_grade : '' }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-8 text-gray-500">
                    No testimonials available yet.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- LATEST NEWS --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-gold-500 text-sm font-semibold uppercase tracking-wider">Stay Updated</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-navy-800 mt-2 font-heading">Latest News</h2>
                </div>
                <a href="/news" class="hidden sm:inline-flex items-center gap-1 text-navy-800 font-semibold hover:text-gold-500 transition-colors">
                    View All News <span>→</span>
                </a>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($latestNews ?? [] as $newsItem)
                <a href="/news/{{ $newsItem->slug }}" class="group block rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="aspect-[16/10] bg-gray-100 overflow-hidden relative">
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
                    <div class="p-6">
                        @if($newsItem->category)
                            <span class="text-xs font-bold text-gold-500 uppercase tracking-wider mb-2 block">{{ $newsItem->category->name }}</span>
                        @endif
                        <h3 class="text-xl font-bold text-navy-800 mb-3 font-heading group-hover:text-gold-500 transition-colors line-clamp-2">{{ $newsItem->title }}</h3>
                        <p class="text-slate-600 text-sm line-clamp-3 leading-relaxed">{{ $newsItem->excerpt ?? Str::limit(strip_tags($newsItem->body), 120) }}</p>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-12 bg-slate-50 rounded-2xl border border-gray-100">
                    <span class="text-4xl block mb-3">📰</span>
                    <p class="text-gray-500">No news articles published yet.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-10 text-center sm:hidden">
                <a href="/news" class="inline-flex items-center gap-1 text-navy-800 font-semibold border-b-2 border-navy-800 pb-1">
                    View All News <span>→</span>
                </a>
            </div>
        </div>
    </section>

    {{-- ADMISSIONS CTA --}}
    <section class="py-24 bg-gradient-to-br from-gold-500 to-gold-400">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-white font-heading">Ready to Join the Kamara Family?</h2>
            <p class="mt-4 text-lg text-white/80 max-w-2xl mx-auto">Begin your child's journey towards excellence. Apply now for the 2026-27 academic year.</p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="/admissions" class="px-8 py-4 bg-navy-900 text-white font-semibold rounded-xl hover:bg-navy-800 transition-all shadow-lg hover:-translate-y-0.5">
                    Start Application
                </a>
                <a href="/contact" class="px-8 py-4 border-2 border-white text-white font-semibold rounded-xl hover:bg-white/10 transition-all">
                    Schedule a Visit
                </a>
            </div>
        </div>
    </section>
</div>
