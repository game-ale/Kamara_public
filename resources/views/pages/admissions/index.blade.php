<x-layouts.app title="Admissions - Kamara School">
    <x-website.shared.page-hero title="Admissions" breadcrumb="Home > Admissions" />
    
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-navy-800 font-heading mb-4">Apply to Kamara School</h2>
                <p class="text-slate-600">Please complete the form below to begin the admissions process. Make sure you have the required documents ready for upload.</p>
            </div>
            
            <livewire:website.admissions.admissions-form />
        </div>
    </section>
</x-layouts.app>
