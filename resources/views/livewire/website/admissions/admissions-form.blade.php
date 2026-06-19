<div>
    <form wire:submit.prevent="submit" class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        {{-- Progress Bar --}}
        <div class="bg-slate-50 border-b border-gray-100 px-8 py-6">
            <div class="flex items-center justify-between relative">
                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-gray-200 z-0">
                    <div class="h-full bg-gold-500 transition-all duration-300" style="width: {{ (($currentStep - 1) / ($totalSteps - 1)) * 100 }}%"></div>
                </div>
                
                @for ($i = 1; $i <= $totalSteps; $i++)
                    <div class="relative z-10 flex flex-col items-center gap-2">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300
                            {{ $currentStep >= $i ? 'bg-gold-500 text-white' : 'bg-white text-gray-400 border-2 border-gray-200' }}">
                            {{ $i }}
                        </div>
                        <span class="text-xs font-semibold uppercase tracking-wide {{ $currentStep >= $i ? 'text-navy-800' : 'text-gray-400' }} hidden sm:block">
                            @if($i == 1) Student @elseif($i == 2) Parent @elseif($i == 3) Documents @else Review @endif
                        </span>
                    </div>
                @endfor
            </div>
        </div>

        <div class="p-8">
            {{-- Step 1: Student Information --}}
            @if ($currentStep === 1)
                <div wire:key="step-1">
                    <h3 class="text-2xl font-bold text-navy-800 mb-6 font-heading">Student Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">First Name *</label>
                            <input type="text" wire:model="studentFirstName" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                            @error('studentFirstName') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">Last Name *</label>
                            <input type="text" wire:model="studentLastName" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                            @error('studentLastName') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">Date of Birth *</label>
                            <input type="date" wire:model="studentDob" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                            @error('studentDob') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">Gender *</label>
                            <select wire:model="studentGender" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('studentGender') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-navy-800 mb-1">Applying for Grade *</label>
                            <select wire:model="applyingGrade" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                                <option value="KG1">KG 1</option>
                                <option value="KG2">KG 2</option>
                                <option value="KG3">KG 3</option>
                                @for($g=1; $g<=12; $g++)
                                    <option value="{{ $g }}">Grade {{ $g }}</option>
                                @endfor
                            </select>
                            @error('applyingGrade') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif

            {{-- Step 2: Parent Information --}}
            @if ($currentStep === 2)
                <div wire:key="step-2">
                    <h3 class="text-2xl font-bold text-navy-800 mb-6 font-heading">Parent/Guardian Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">First Name *</label>
                            <input type="text" wire:model="parentFirstName" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                            @error('parentFirstName') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">Last Name *</label>
                            <input type="text" wire:model="parentLastName" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                            @error('parentLastName') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">Relationship to Student *</label>
                            <select wire:model="parentRelation" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                                <option value="Mother">Mother</option>
                                <option value="Father">Father</option>
                                <option value="Guardian">Guardian</option>
                            </select>
                            @error('parentRelation') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">Email Address *</label>
                            <input type="email" wire:model="parentEmail" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                            @error('parentEmail') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-navy-800 mb-1">Phone Number *</label>
                            <input type="tel" wire:model="parentPhone" placeholder="+251 911 000000" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500">
                            @error('parentPhone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-navy-800 mb-1">Physical Address *</label>
                            <textarea wire:model="parentAddress" rows="3" class="w-full border-gray-300 rounded-lg focus:ring-gold-500 focus:border-gold-500"></textarea>
                            @error('parentAddress') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            @endif

            {{-- Step 3: Documents --}}
            @if ($currentStep === 3)
                <div wire:key="step-3">
                    <h3 class="text-2xl font-bold text-navy-800 mb-6 font-heading">Document Uploads</h3>
                    <p class="text-slate-600 mb-6 text-sm">Please upload clear copies of the following documents. Allowed formats: PDF, JPG, PNG. Max size: 5MB.</p>
                    
                    <div class="space-y-6">
                        <div class="p-6 border-2 border-dashed border-gray-300 rounded-xl bg-slate-50">
                            <label class="block text-sm font-bold text-navy-800 mb-2">Birth Certificate / Kebele ID *</label>
                            <input type="file" wire:model="birthCertificate" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-gold-500/10 file:text-gold-500
                                hover:file:bg-gold-500/20
                            ">
                            @error('birthCertificate') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
                            <div wire:loading wire:target="birthCertificate" class="text-xs text-blue-500 mt-2">Uploading...</div>
                        </div>

                        <div class="p-6 border-2 border-dashed border-gray-300 rounded-xl bg-slate-50">
                            <label class="block text-sm font-bold text-navy-800 mb-2">Previous Transcript (If applicable)</label>
                            <p class="text-xs text-slate-500 mb-3">Required for Grades 2-12.</p>
                            <input type="file" wire:model="previousTranscript" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-gold-500/10 file:text-gold-500
                                hover:file:bg-gold-500/20
                            ">
                            @error('previousTranscript') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
                            <div wire:loading wire:target="previousTranscript" class="text-xs text-blue-500 mt-2">Uploading...</div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Step 4: Review --}}
            @if ($currentStep === 4)
                <div wire:key="step-4">
                    <h3 class="text-2xl font-bold text-navy-800 mb-6 font-heading">Review & Submit</h3>
                    
                    <div class="bg-slate-50 rounded-xl p-6 mb-6">
                        <h4 class="font-bold text-navy-800 mb-4 border-b pb-2">Student Information</h4>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div><span class="text-slate-500">Name:</span> <br><strong>{{ $studentFirstName }} {{ $studentLastName }}</strong></div>
                            <div><span class="text-slate-500">DOB:</span> <br><strong>{{ $studentDob }}</strong></div>
                            <div><span class="text-slate-500">Gender:</span> <br><strong>{{ $studentGender }}</strong></div>
                            <div><span class="text-slate-500">Grade:</span> <br><strong>{{ $applyingGrade }}</strong></div>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-6 mb-6">
                        <h4 class="font-bold text-navy-800 mb-4 border-b pb-2">Parent/Guardian Information</h4>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div><span class="text-slate-500">Name:</span> <br><strong>{{ $parentFirstName }} {{ $parentLastName }} ({{ $parentRelation }})</strong></div>
                            <div><span class="text-slate-500">Contact:</span> <br><strong>{{ $parentPhone }} <br> {{ $parentEmail }}</strong></div>
                            <div class="col-span-2"><span class="text-slate-500">Address:</span> <br><strong>{{ $parentAddress }}</strong></div>
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-6">
                        <h4 class="font-bold text-navy-800 mb-4 border-b pb-2">Documents</h4>
                        <ul class="text-sm space-y-2">
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Birth Certificate Uploaded
                            </li>
                            @if($previousTranscript)
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Previous Transcript Uploaded
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        </div>

        {{-- Footer Actions --}}
        <div class="bg-gray-50 border-t border-gray-100 px-8 py-4 flex items-center justify-between">
            @if ($currentStep > 1)
                <button type="button" wire:click="previousStep" class="px-6 py-2.5 border-2 border-navy-800 text-navy-800 font-semibold rounded-lg hover:bg-navy-800 hover:text-white transition">
                    ← Back
                </button>
            @else
                <div></div>
            @endif

            @if ($currentStep < $totalSteps)
                <button type="button" wire:click="nextStep" class="px-6 py-2.5 bg-gold-500 text-white font-semibold rounded-lg hover:bg-gold-400 transition shadow-md">
                    Continue →
                </button>
            @else
                <button type="submit" class="px-8 py-2.5 bg-navy-800 text-white font-bold rounded-lg hover:bg-navy-700 transition shadow-lg flex items-center gap-2">
                    <span wire:loading.remove wire:target="submit">Submit Application</span>
                    <span wire:loading wire:target="submit">Processing...</span>
                </button>
            @endif
        </div>
    </form>
</div>
