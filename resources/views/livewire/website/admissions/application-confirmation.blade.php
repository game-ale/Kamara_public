<div>
    <x-website.shared.page-hero title="Application Submitted" breadcrumb="Admissions > Confirmation" />

    <section class="py-16 md:py-24 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 text-center border-t-4 border-gold-500">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                
                <h2 class="text-3xl font-bold text-navy-800 font-heading mb-4">Thank You!</h2>
                <p class="text-lg text-slate-600 mb-8">Your application to Kamara School has been successfully submitted. We have sent a confirmation email to the parent/guardian address provided.</p>
                
                <div class="bg-slate-50 border border-gray-200 rounded-xl p-6 mb-8 inline-block text-left min-w-[280px]">
                    <span class="block text-sm text-slate-500 mb-1">Your Application Reference Number:</span>
                    <strong class="text-2xl text-navy-800 font-mono tracking-wider">{{ $reference }}</strong>
                </div>
                
                <div class="text-left bg-blue-50 text-blue-800 p-6 rounded-xl text-sm mb-8">
                    <h4 class="font-bold mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        What happens next?
                    </h4>
                    <ul class="list-disc list-inside space-y-1 ml-1 text-blue-700">
                        <li>Our admissions team will review your documents.</li>
                        <li>You will be contacted within 3-5 business days regarding an entrance assessment or interview.</li>
                        <li>Keep your reference number safe for future inquiries.</li>
                    </ul>
                </div>
                
                <a href="/" class="inline-flex items-center gap-2 px-6 py-3 bg-navy-800 text-white font-semibold rounded-lg hover:bg-navy-700 transition">
                    ← Return to Homepage
                </a>
            </div>
        </div>
    </section>
</div>
