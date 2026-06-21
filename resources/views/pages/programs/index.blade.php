<x-layouts.app title="Academic Programs | Kamara School">
    {{-- PAGE HEADER --}}
    <section class="bg-navy-900 py-20 border-b border-white/10 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-navy-900/95 via-navy-800/90 to-navy-700/80"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">Academic Programs</h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">From early childhood to university preparation, Kamara School offers a continuous journey of excellence.</p>
        </div>
    </section>

    {{-- PROGRAMS LIST --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                {{-- KG Program --}}
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gold-500/10 flex items-center justify-center relative">
                        <span class="text-6xl z-10">🎨</span>
                        <div class="absolute inset-0 bg-gradient-to-br from-gold-500/20 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <span class="text-gold-500 text-xs font-bold uppercase tracking-wider block mb-2">Ages 3-6</span>
                        <h3 class="text-2xl font-bold text-navy-800 mb-3 font-heading">KG Program</h3>
                        <p class="text-slate-600 mb-6 leading-relaxed">A nurturing, play-based environment focusing on foundational literacy, numeracy, and socio-emotional development to spark a lifelong love for learning.</p>
                        <a href="/programs/kg" class="inline-flex items-center text-navy-800 font-semibold hover:text-gold-500 transition-colors">
                            Explore KG Program <span class="ml-2">→</span>
                        </a>
                    </div>
                </div>

                {{-- Primary School --}}
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-blue-500/10 flex items-center justify-center relative">
                        <span class="text-6xl z-10">📚</span>
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <span class="text-blue-500 text-xs font-bold uppercase tracking-wider block mb-2">Grades 1-8</span>
                        <h3 class="text-2xl font-bold text-navy-800 mb-3 font-heading">Primary School</h3>
                        <p class="text-slate-600 mb-6 leading-relaxed">A robust curriculum that builds strong foundations in core subjects while integrating arts, sports, and technology for holistic student development.</p>
                        <a href="/programs/primary" class="inline-flex items-center text-navy-800 font-semibold hover:text-blue-500 transition-colors">
                            Explore Primary School <span class="ml-2">→</span>
                        </a>
                    </div>
                </div>

                {{-- Secondary School --}}
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-green-500/10 flex items-center justify-center relative">
                        <span class="text-6xl z-10">🎓</span>
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <span class="text-green-500 text-xs font-bold uppercase tracking-wider block mb-2">Grades 9-12</span>
                        <h3 class="text-2xl font-bold text-navy-800 mb-3 font-heading">Secondary School</h3>
                        <p class="text-slate-600 mb-6 leading-relaxed">Rigorous university preparation featuring specialized streams in Natural and Social Sciences, designed to equip students for global higher education.</p>
                        <a href="/programs/secondary" class="inline-flex items-center text-navy-800 font-semibold hover:text-green-500 transition-colors">
                            Explore Secondary School <span class="ml-2">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
