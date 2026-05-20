<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Samples / Create
            </h2>
            <a href="{{ route('samples.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Back</a>
        </div>

    </x-slot>

<div class="max-w-5xl mx-auto px-4 py-6">
 
    {{-- Page Header --}}
    <div class="mb-6">
        <nav class="text-sm text-gray-500 mb-1">
            <a href="{{ route('samples.index') }}" class="hover:underline">Samples</a>
            <span class="mx-1">/</span>
            <span>New Sample</span>
        </nav>
        <h1 class="text-2xl font-semibold text-gray-800">Create New Sample</h1>
    </div>
 
    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
            <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{-- {{ route('samples.store') }} --}}" method="POST" enctype="multipart/form-data">
        @csrf
 
        {{-- ================================================================
            SECTION 1: Sample Images
        ================================================================ --}}
        <div class="bg-white border border-gray-200 rounded-xl mb-5 overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide font-medium">Section 1</p>
                    <h2 class="text-sm font-semibold text-gray-700">Sample Images</h2>
                </div>
            </div>
 
            <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-5">
 
                {{-- Front Part Image --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
                        Front Part Image
                    </label>
                    <label class="flex flex-col items-center justify-center gap-2 p-5 border border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-400 hover:bg-blue-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                        <span class="text-sm text-gray-500">Click or drag to upload</span>
                        <span class="text-xs text-gray-400">JPG, PNG — max 2MB (Single image)</span>
                        <input type="file"
                               name="front_part_image"
                               accept="image/*"
                               class="hidden"
                               onchange="previewImage(this, 'front-preview')">
                    </label>
                    <div id="front-preview" class="mt-2 hidden">
                        <img src="" alt="Front Part Preview" class="h-24 rounded-lg object-cover border border-gray-200">
                    </div>
                    @error('front_part_image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Back Part Image --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
                        Back Part Image
                    </label>
                    <label class="flex flex-col items-center justify-center gap-2 p-5 border border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-400 hover:bg-blue-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                        <span class="text-sm text-gray-500">Click or drag to upload</span>
                        <span class="text-xs text-gray-400">JPG, PNG — max 2MB (Single image)</span>
                        <input type="file"
                               name="back_part_image"
                               accept="image/*"
                               class="hidden"
                               onchange="previewImage(this, 'back-preview')">
                    </label>
                    <div id="back-preview" class="mt-2 hidden">
                        <img src="" alt="Back Part Preview" class="h-24 rounded-lg object-cover border border-gray-200">
                    </div>
                    @error('back_part_image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Challenge Images (Multiple) --}}
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
                        Challenge Images <span class="text-gray-400 font-normal">(Multiple)</span>
                    </label>
                    <label class="flex flex-col items-center justify-center gap-2 p-5 border border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:border-blue-400 hover:bg-blue-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        <span class="text-sm text-gray-500">Select multiple challenge images</span>
                        <span class="text-xs text-gray-400">Hold Ctrl/Cmd to select multiple — stored as JSON array</span>
                        <input type="file"
                               name="challenge_images[]"
                               accept="image/*"
                               multiple
                               class="hidden"
                               onchange="previewMultiple(this)">
                    </label>
                    <div id="challenge-preview" class="mt-2 flex flex-wrap gap-2"></div>
                    @error('challenge_images')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    @error('challenge_images.*')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
            </div>
        </div>
 
 
        {{-- ================================================================
            SECTION 2: Product Details
        ================================================================ --}}
        <div class="bg-white border border-gray-200 rounded-xl mb-5 overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-teal-50 flex items-center justify-center text-teal-600 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 012-2h2z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide font-medium">Section 2</p>
                    <h2 class="text-sm font-semibold text-gray-700">Product Details</h2>
                </div>
            </div>
 
            <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-5">
 
                {{-- Style No --}}
                <div>
                    <label for="style_no" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Style No <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           id="style_no"
                           name="style_no"
                           value="{{ old('style_no') }}"
                           placeholder="e.g. SMP-2026-001"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('style_no') border-red-400 @enderror">
                    @error('style_no')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Buyer --}}
                <div>
                    <label for="buyer" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Buyer
                    </label>
                    <input type="text"
                           id="buyer"
                           name="buyer"
                           value="{{ old('buyer') }}"
                           placeholder="Buyer name or company"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('buyer')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Sample Type --}}
                <div>
                    <label for="sample_type" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Sample Type
                    </label>
                    <select id="sample_type"
                            name="sample_type"
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                        <option value="">— Select type —</option>
                        <option value="Proto Sample" {{ old('sample_type') == 'Proto Sample' ? 'selected' : '' }}>Proto Sample</option>
                        <option value="Fit Sample" {{ old('sample_type') == 'Fit Sample' ? 'selected' : '' }}>Fit Sample</option>
                        <option value="Size Set" {{ old('sample_type') == 'Size Set' ? 'selected' : '' }}>Size Set</option>
                        <option value="PP Sample" {{ old('sample_type') == 'PP Sample' ? 'selected' : '' }}>PP Sample</option>
                        <option value="TOP Sample" {{ old('sample_type') == 'TOP Sample' ? 'selected' : '' }}>TOP Sample</option>
                    </select>
                    @error('sample_type')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- GG (Gauge) --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
                        GG (Gauge)
                    </label>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['3GG', '5GG', '7GG', '9GG', '12GG'] as $gg)
                            <label class="cursor-pointer">
                                <input type="radio"
                                       name="gg"
                                       value="{{ $gg }}"
                                       class="sr-only peer"
                                       {{ old('gg') == $gg ? 'checked' : '' }}>
                                <span class="px-4 py-1.5 text-xs font-semibold border border-gray-200 rounded-full text-gray-600
                                             peer-checked:bg-purple-50 peer-checked:border-purple-300 peer-checked:text-purple-700
                                             hover:border-gray-300 transition-colors select-none">
                                    {{ $gg }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                    @error('gg')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- End Ply --}}
                <div>
                    <label for="end_ply" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        End Ply
                    </label>
                    <input type="text"
                           id="end_ply"
                           name="end_ply"
                           value="{{ old('end_ply') }}"
                           placeholder="e.g. 2/48, 1/32"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('end_ply')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Weight dz/lbs --}}
                <div>
                    <label for="weight_dz_lbs" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Weight (dz/lbs)
                    </label>
                    <input type="text"
                           id="weight_dz_lbs"
                           name="weight_dz_lbs"
                           value="{{ old('weight_dz_lbs') }}"
                           placeholder="e.g. 12.50"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('weight_dz_lbs')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Color --}}
                <div>
                    <label for="color" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Color
                    </label>
                    <input type="text"
                           id="color"
                           name="color"
                           value="{{ old('color') }}"
                           placeholder="e.g. Navy Blue, Off White"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('color')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Season --}}
                <div>
                    <label for="season" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Season (Year)
                    </label>
                    <select id="season"
                            name="season"
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                        <option value="">— Select year —</option>
                        @foreach(range(date('Y') - 1, date('Y') + 3) as $year)
                            <option value="{{ $year }}" {{ old('season') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                    @error('season')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Yarn Composition --}}
                <div class="md:col-span-2">
                    <label for="yarn_composition" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Yarn Composition
                    </label>
                    <textarea id="yarn_composition"
                              name="yarn_composition"
                              rows="3"
                              placeholder="e.g. 100% Merino Wool, 80% Cotton 20% Polyester..."
                              class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none">{{ old('yarn_composition') }}</textarea>
                    @error('yarn_composition')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Description --}}
                <div class="md:col-span-2">
                    <label for="description" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Description
                    </label>
                    <textarea id="description"
                              name="description"
                              rows="4"
                              placeholder="Describe the sample in detail..."
                              class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
            </div>
        </div>
 
 
        {{-- ================================================================
            SECTION 3: Challenges
        ================================================================ --}}
        <div class="bg-white border border-gray-200 rounded-xl mb-5 overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide font-medium">Section 3</p>
                    <h2 class="text-sm font-semibold text-gray-700">Challenges</h2>
                </div>
            </div>
 
            <div class="p-5">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">
                    Challenges In <span class="text-gray-400 font-normal">(Multi-select tags)</span>
                </label>
 
                {{-- Tag input container --}}
                <div id="challenges-container"
                     class="min-h-[44px] flex flex-wrap gap-2 p-2 border border-gray-200 rounded-lg cursor-text focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent bg-white"
                     onclick="document.getElementById('challenge-text-input').focus()">
                    {{-- Tags render here --}}
                    <span class="text-xs text-gray-400 italic self-center pl-1" id="tag-placeholder">Click a suggestion below to add tags...</span>
                    <input type="text"
                           id="challenge-text-input"
                           placeholder=""
                           class="flex-1 min-w-[120px] outline-none text-sm bg-transparent"
                           onkeydown="handleTagKeydown(event)">
                </div>
 
                {{-- Hidden input for form submission --}}
                <input type="hidden" name="challenges_in" id="challenges-in-value" value="{{ old('challenges_in', '[]') }}">
 
                {{-- Quick-add suggestions --}}
                <div class="flex flex-wrap gap-2 mt-3">
                    @foreach(['Knitting', 'Linking', 'Ironing', 'Packing', 'Washing', 'Seaming', 'Finishing', 'QC', 'Embroidery'] as $suggestion)
                        <button type="button"
                                onclick="addChallengTag('{{ $suggestion }}')"
                                class="px-3 py-1 text-xs border border-dashed border-gray-300 rounded-full text-gray-500 hover:border-amber-400 hover:text-amber-600 hover:bg-amber-50 transition-colors">
                            + {{ $suggestion }}
                        </button>
                    @endforeach
                </div>
 
                <p class="mt-2 text-xs text-gray-400">Type and press <kbd class="px-1 py-0.5 bg-gray-100 rounded text-gray-500 font-mono">Enter</kbd> to add a custom tag, or click a suggestion above.</p>
 
                @error('challenges_in')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
 
 
        {{-- ================================================================
            SECTION 4: Production Information
        ================================================================ --}}
        <div class="bg-white border border-gray-200 rounded-xl mb-5 overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center text-purple-600 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide font-medium">Section 4</p>
                    <h2 class="text-sm font-semibold text-gray-700">Production Information</h2>
                </div>
            </div>
 
            <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-5">
 
                {{-- Submission Date --}}
                <div>
                    <label for="submission_date" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Submission Date
                    </label>
                    <input type="date"
                           id="submission_date"
                           name="submission_date"
                           value="{{ old('submission_date') }}"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('submission_date')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Empty spacer for grid alignment --}}
                <div class="hidden md:block"></div>
 
                {{-- Knitting SMV --}}
                <div>
                    <label for="knitting_smv" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Knitting SMV
                        <span class="text-gray-400 font-normal normal-case">(mins/pcs)</span>
                    </label>
                    <input type="number"
                           id="knitting_smv"
                           name="knitting_smv"
                           value="{{ old('knitting_smv') }}"
                           step="0.01"
                           min="0"
                           placeholder="e.g. 2.50"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('knitting_smv')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
                {{-- Linking SMV --}}
                <div>
                    <label for="linking_smv" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Linking SMV
                        <span class="text-gray-400 font-normal normal-case">(mins/pcs)</span>
                    </label>
                    <input type="number"
                           id="linking_smv"
                           name="linking_smv"
                           value="{{ old('linking_smv') }}"
                           step="0.01"
                           min="0"
                           placeholder="e.g. 1.25"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('linking_smv')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
 
            </div>
        </div>
 
 
        {{-- ================================================================
            SECTION 5: Status & Audit
        ================================================================ --}}
        <div class="bg-white border border-gray-200 rounded-xl mb-6 overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center text-green-600 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide font-medium">Section 5</p>
                    <h2 class="text-sm font-semibold text-gray-700">Status &amp; Audit</h2>
                </div>
            </div>
 
            <div class="p-5">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">
                    Status
                </label>
                <div class="flex flex-wrap gap-3">
                    @foreach(['draft' => ['Draft', 'text-gray-600', 'peer-checked:bg-gray-100 peer-checked:border-gray-400 peer-checked:text-gray-800'],
                               'pending' => ['Pending', 'text-yellow-600', 'peer-checked:bg-yellow-50 peer-checked:border-yellow-400 peer-checked:text-yellow-700'],
                               'approved' => ['Approved', 'text-green-600', 'peer-checked:bg-green-50 peer-checked:border-green-400 peer-checked:text-green-700'],
                               'rejected' => ['Rejected', 'text-red-600', 'peer-checked:bg-red-50 peer-checked:border-red-400 peer-checked:text-red-700']] as $value => [$label, $textColor, $checkedClass])
                        <label class="cursor-pointer">
                            <input type="radio"
                                   name="status"
                                   value="{{ $value }}"
                                   class="sr-only peer"
                                   {{ old('status', 'draft') == $value ? 'checked' : '' }}>
                            <span class="flex items-center gap-2 px-4 py-2 text-sm font-medium border border-gray-200 rounded-lg text-gray-500 hover:border-gray-300 transition-colors {{ $checkedClass }} select-none">
                                {{ $label }}
                            </span>
                        </label>
                    @endforeach
                </div>
                <p class="mt-2 text-xs text-gray-400">Default status is <strong>Draft</strong>. Change to Pending when ready for review.</p>
            </div>
 
            {{-- Form Actions --}}
            <div class="flex items-center justify-end gap-3 px-5 py-4 bg-gray-50 border-t border-gray-100">
                <a href="{{ route('samples.index') }}"
                   class="px-4 py-2 text-sm text-gray-500 border border-gray-200 rounded-lg hover:bg-gray-100 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                        name="save_as"
                        value="draft"
                        class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    Save as Draft
                </button>
                <button type="submit"
                        name="save_as"
                        value="submit"
                        class="px-5 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    Submit Sample
                </button>
            </div>
 
        </div>
 
    </form>
</div>
 
 
@push('scripts')
<script>
/**
 * Image preview — single
 */
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.querySelector('img').src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
 
/**
 * Image preview — multiple
 */
function previewMultiple(input) {
    const container = document.getElementById('challenge-preview');
    container.innerHTML = '';
    Array.from(input.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative';
            wrapper.innerHTML = `
                <img src="${e.target.result}" class="h-20 w-20 object-cover rounded-lg border border-gray-200">
                <span class="absolute bottom-1 right-1 bg-black/50 text-white text-[10px] rounded px-1">IMG</span>
            `;
            container.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    });
}
 
 
/**
 * Tag / Challenges-In system
 */
let challengeTags = @json(old('challenges_in') ? json_decode(old('challenges_in')) : []);
 
function renderTags() {
    const container = document.getElementById('challenges-container');
    const placeholder = document.getElementById('tag-placeholder');
    const input = document.getElementById('challenge-text-input');
 
    // Remove old tags (keep input + placeholder)
    container.querySelectorAll('.tag-pill').forEach(el => el.remove());
 
    if (challengeTags.length > 0) {
        placeholder.style.display = 'none';
    } else {
        placeholder.style.display = '';
    }
 
    challengeTags.forEach((tag, i) => {
        const pill = document.createElement('span');
        pill.className = 'tag-pill inline-flex items-center gap-1.5 px-2.5 py-1 text-xs font-medium rounded-full bg-amber-50 text-amber-700 border border-amber-200';
        pill.innerHTML = `${tag} <button type="button" onclick="removeChallengTag(${i})" class="text-amber-400 hover:text-amber-700 leading-none">&times;</button>`;
        container.insertBefore(pill, input);
    });
 
    document.getElementById('challenges-in-value').value = JSON.stringify(challengeTags);
}
 
function addChallengTag(name) {
    if (!challengeTags.includes(name)) {
        challengeTags.push(name);
        renderTags();
    }
}
 
function removeChallengTag(index) {
    challengeTags.splice(index, 1);
    renderTags();
}
 
function handleTagKeydown(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const val = e.target.value.trim();
        if (val && !challengeTags.includes(val)) {
            addChallengTag(val);
        }
        e.target.value = '';
    }
    if (e.key === 'Backspace' && e.target.value === '' && challengeTags.length > 0) {
        challengeTags.pop();
        renderTags();
    }
}
 
// Init on load
renderTags();
</script>
</x-app-layout>
