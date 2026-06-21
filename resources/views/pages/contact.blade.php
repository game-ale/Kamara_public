<?php
use App\Helpers\Setting;
?>
<x-layouts.app title="Contact Us | Kamara School">
    {{-- PAGE HEADER --}}
    <section class="bg-navy-900 py-20 border-b border-white/10 relative overflow-hidden">
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-4xl sm:text-5xl font-bold text-white font-heading">Get in Touch</h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">We'd love to hear from you. Reach out to us for admissions, inquiries, or any questions you might have.</p>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                
                {{-- CONTACT FORM --}}
                <div class="bg-slate-50 p-8 sm:p-10 rounded-2xl border border-gray-100 shadow-sm">
                    <h3 class="text-2xl font-bold text-navy-800 font-heading mb-6">Send us a Message</h3>
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-semibold text-navy-800 mb-2">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-gold-500 focus:border-gold-500 outline-none transition-all" placeholder="John">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-semibold text-navy-800 mb-2">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-gold-500 focus:border-gold-500 outline-none transition-all" placeholder="Doe">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-navy-800 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-gold-500 focus:border-gold-500 outline-none transition-all" placeholder="john@example.com">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-semibold text-navy-800 mb-2">Subject</label>
                            <select id="subject" name="subject" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-gold-500 focus:border-gold-500 outline-none transition-all bg-white">
                                <option value="">Select a subject...</option>
                                <option value="admissions">Admissions Inquiry</option>
                                <option value="general">General Question</option>
                                <option value="careers">Careers</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-navy-800 mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-gold-500 focus:border-gold-500 outline-none transition-all resize-none" placeholder="How can we help you?"></textarea>
                        </div>

                        <button type="button" class="w-full py-4 bg-navy-800 text-white font-bold rounded-xl hover:bg-navy-700 transition-colors shadow-lg shadow-navy-800/20">
                            Send Message
                        </button>
                        <p class="text-xs text-center text-gray-400 mt-4">* This is a placeholder form. Backend submission needs to be implemented.</p>
                    </form>
                </div>

                {{-- CONTACT DETAILS --}}
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-navy-800 font-heading mb-8">Contact Information</h3>
                        
                        <div class="space-y-8">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gold-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-gold-500 text-xl">📍</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-navy-800 mb-1">Our Campus</h4>
                                    <p class="text-slate-600 leading-relaxed">{{ Setting::get('contact_address', 'Bole Road, Adama, Ethiopia') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gold-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-gold-500 text-xl">📞</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-navy-800 mb-1">Call Us</h4>
                                    <p class="text-slate-600 leading-relaxed">{{ Setting::get('contact_phone', '+251 911 234 567') }}</p>
                                    <p class="text-sm text-gray-400 mt-1">Mon-Fri from 8am to 5pm</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-gold-500/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-gold-500 text-xl">✉️</span>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-navy-800 mb-1">Email Us</h4>
                                    <p class="text-slate-600 leading-relaxed">{{ Setting::get('contact_email', 'info@kamaraschool.com') }}</p>
                                    <p class="text-sm text-gray-400 mt-1">We aim to reply within 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MAP PLACEHOLDER --}}
                    <div class="mt-12">
                        <div class="w-full h-64 bg-slate-200 rounded-2xl overflow-hidden relative border border-gray-100">
                            {{-- This is a placeholder for a Google Map iframe --}}
                            <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray-100 text-gray-400 p-6 text-center">
                                <span class="text-4xl mb-2">🗺️</span>
                                <p class="font-medium">Interactive Map Placeholder</p>
                                <p class="text-sm mt-1">Embed your Google Maps iframe here.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-layouts.app>
