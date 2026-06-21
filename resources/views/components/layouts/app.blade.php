<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription ?? 'Premium Private KG–Grade 12 Education in Adama, Ethiopia' }}">

    <title>{{ $title ?? 'Kamara School — Excellence in Education' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-white text-gray-800 antialiased">

    {{-- Announcement Banner --}}
    <div class="bg-navy-900 text-gold-400 text-center text-sm py-2 px-4 font-medium">
        📢 Admissions Open for 2026-27 Academic Year —
        <a href="/admissions" class="underline hover:text-gold-100 transition">Apply Now</a>
    </div>

    {{-- Navigation --}}
    <header x-data="{ mobileOpen: false }" class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Kamara School Logo" class="h-12 w-auto object-contain group-hover:scale-105 transition-transform">
                    <div class="hidden sm:block">
                        <span class="text-navy-800 font-bold text-xl font-heading tracking-tight">Kamara</span>
                        <span class="block text-xs text-slate-600 -mt-0.5 tracking-wide uppercase">School</span>
                    </div>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden lg:flex items-center gap-1">
                    @php
                        $navItems = [
                            ['label' => 'Home', 'href' => '/'],
                            ['label' => 'About', 'href' => '/about'],
                            ['label' => 'Programs', 'href' => '/programs'],
                            ['label' => 'News', 'href' => '/news'],
                            ['label' => 'Events', 'href' => '/events'],
                            ['label' => 'Gallery', 'href' => '/gallery'],
                            ['label' => 'Leadership', 'href' => '/leadership'],
                            ['label' => 'FAQ', 'href' => '/faq'],
                            ['label' => 'Contact', 'href' => '/contact'],
                        ];
                    @endphp
                    @foreach($navItems as $item)
                        <a href="{{ $item['href'] }}"
                           class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                  {{ request()->is(ltrim($item['href'], '/') ?: '/') ? 'text-navy-800 bg-navy-800/5' : 'text-gray-600 hover:text-navy-800 hover:bg-gray-50' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                    <a href="/admissions"
                       class="ml-3 px-5 py-2.5 bg-gold-500 text-white text-sm font-semibold rounded-xl hover:bg-gold-400 transition-all shadow-lg shadow-gold-500/25 hover:shadow-gold-400/40 hover:-translate-y-0.5">
                        Apply Now
                    </a>
                </nav>

                {{-- Mobile menu button --}}
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition">
                    <svg x-show="!mobileOpen" class="w-6 h-6 text-navy-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6 text-navy-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Nav --}}
        <div x-show="mobileOpen" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
             class="lg:hidden bg-white border-t border-gray-100 shadow-lg">
            <div class="px-4 py-4 space-y-1">
                @foreach($navItems as $item)
                    <a href="{{ $item['href'] }}" class="block px-4 py-3 rounded-lg text-sm font-medium text-gray-600 hover:text-navy-800 hover:bg-gray-50 transition">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="/admissions" class="block mt-3 px-4 py-3 bg-gold-500 text-white text-center text-sm font-semibold rounded-xl hover:bg-gold-400 transition">
                    Apply Now
                </a>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-navy-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                {{-- Brand --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-5">
                        <img src="{{ asset('images/logo.png') }}" alt="Kamara School Logo" class="h-12 w-auto object-contain bg-white rounded-lg p-1">
                        <span class="text-white font-bold text-lg font-heading">Kamara School</span>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed mb-6">
                        Premium Private KG–Grade 12 Education in Adama, Ethiopia. Nurturing tomorrow's leaders today.
                    </p>
                    <div class="flex gap-3">
                        <a href="{{ App\Helpers\Setting::get('social_facebook', '#') }}" class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center hover:bg-gold-500 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="{{ App\Helpers\Setting::get('social_instagram', '#') }}" class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center hover:bg-gold-500 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="{{ App\Helpers\Setting::get('social_linkedin', '#') }}" class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center hover:bg-gold-500 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-5">Quick Links</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="/about" class="hover:text-gold-400 transition">About Us</a></li>
                        <li><a href="/programs" class="hover:text-gold-400 transition">Programs</a></li>
                        <li><a href="/admissions" class="hover:text-gold-400 transition">Admissions</a></li>
                        <li><a href="/news" class="hover:text-gold-400 transition">News & Updates</a></li>
                        <li><a href="/events" class="hover:text-gold-400 transition">Events</a></li>
                    </ul>
                </div>

                {{-- Resources --}}
                <div>
                    <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-5">Resources</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="/gallery" class="hover:text-gold-400 transition">Gallery</a></li>
                        <li><a href="/leadership" class="hover:text-gold-400 transition">Leadership</a></li>
                        <li><a href="/faq" class="hover:text-gold-400 transition">FAQ</a></li>
                        <li><a href="/contact" class="hover:text-gold-400 transition">Contact Us</a></li>
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-5">Contact Info</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gold-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ App\Helpers\Setting::get('contact_address', 'Bole Road, Adama, Ethiopia') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gold-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>{{ App\Helpers\Setting::get('contact_phone', '+251 911 234 567') }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gold-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>{{ App\Helpers\Setting::get('contact_email', 'info@kamaraschool.com') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-gray-500">&copy; {{ date('Y') }} Kamara School. All rights reserved.</p>
                <div class="flex gap-6 text-xs text-gray-500">
                    <a href="#" class="hover:text-gold-400 transition">Privacy Policy</a>
                    <a href="#" class="hover:text-gold-400 transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js" integrity="sha512-wC/g53b82FvM0tG-xZgPHJpXyK1U5w08vU4BqZ7yR2bQ2xX-B2bK0P2r-1W41y-2Wp2q4Gv5r9zR4M8H-02bGw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('livewire:navigated', () => {
            VanillaTilt.init(document.querySelectorAll("[data-tilt]"));
        });
        document.addEventListener('DOMContentLoaded', () => {
            VanillaTilt.init(document.querySelectorAll("[data-tilt]"));
        });
    </script>
</body>
</html>
