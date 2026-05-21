<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Sample - ') }} {{ $sample->style_no }}
            </h2>
            <a href="{{ route('samples.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancel</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-messages></x-messages>

            <form action="{{ route('samples.update', $sample) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <!-- 1. Product Identification Details -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-md font-bold text-gray-900 border-b pb-2 mb-4">Product Specifications</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="style_no" class="block text-sm font-medium text-gray-700">Style No <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="style_no" id="style_no"
                                value="{{ old('style_no', $sample->style_no) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('style_no')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="buyer" class="block text-sm font-medium text-gray-700">Buyer Name</label>
                            <input type="text" name="buyer" id="buyer"
                                value="{{ old('buyer', $sample->buyer) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="sample_type" class="block text-sm font-medium text-gray-700">Sample Type</label>
                            <input type="text" name="sample_type" id="sample_type"
                                value="{{ old('sample_type', $sample->sample_type) }}"
                                placeholder="e.g. Proto Sample, Fit Sample"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="gg" class="block text-sm font-medium text-gray-700">Gauge (GG)</label>
                            <select name="gg" id="gg"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Select Gauge</option>
                                @foreach (['3GG', '5GG', '7GG', '9GG', '12GG'] as $gauge)
                                    <option value="{{ $gauge }}" @selected(old('gg', $sample->gg) == $gauge)>{{ $gauge }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="end_ply" class="block text-sm font-medium text-gray-700">End Ply</label>
                            <input type="text" name="end_ply" id="end_ply"
                                value="{{ old('end_ply', $sample->end_ply) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="weight_dz_lbs" class="block text-sm font-medium text-gray-700">Weight
                                (Dz/Lbs)</label>
                            <input type="text" name="weight_dz_lbs" id="weight_dz_lbs"
                                value="{{ old('weight_dz_lbs', $sample->weight_dz_lbs) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                            <input type="text" name="color" id="color"
                                value="{{ old('color', $sample->color) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="season" class="block text-sm font-medium text-gray-700">Season (Year)</label>
                            <input type="number" name="season" id="season" min="2000" max="2100"
                                value="{{ old('season', $sample->season) }}" placeholder="e.g. 2026"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="submission_date" class="block text-sm font-medium text-gray-700">Submission
                                Date</label>
                            <input type="date" name="submission_date" id="submission_date"
                                value="{{ old('submission_date', $sample->submission_date) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label for="yarn_composition" class="block text-sm font-medium text-gray-700">Yarn
                                Composition</label>
                            <textarea name="yarn_composition" id="yarn_composition" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('yarn_composition', $sample->yarn_composition) }}</textarea>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description', $sample->description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- 2. Production & Status Details -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-md font-bold text-gray-900 border-b pb-2 mb-4">Production Management & Workflows
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div>
                            <label for="knitting_smv" class="block text-sm font-medium text-gray-700">Knitting
                                SMV</label>
                            <input type="number" name="knitting_smv" id="knitting_smv" step="0.01"
                                value="{{ old('knitting_smv', $sample->knitting_smv) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="linking_smv" class="block text-sm font-medium text-gray-700">Linking
                                SMV</label>
                            <input type="number" name="linking_smv" id="linking_smv" step="0.01"
                                value="{{ old('linking_smv', $sample->linking_smv) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach (['draft', 'pending', 'approved', 'rejected'] as $statusOption)
                                    <option value="{{ $statusOption }}" @selected(old('status', $sample->status) == $statusOption)>
                                        {{ ucfirst($statusOption) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="challenges_in" class="block text-sm font-medium text-gray-700">Challenges Tags
                                (Comma Separated)</label>
                            @php
                                // সরাসরি অ্যারে চেক করে ইমপ্লোড করা হচ্ছে
                                $challengesText = '';
                                if ($sample->challenges_in) {
                                    $challengesText = is_array($sample->challenges_in)
                                        ? implode(', ', $sample->challenges_in)
                                        : $sample->challenges_in;
                                }
                            @endphp
                            <input type="text" name="challenges_in" id="challenges_in"
                                value="{{ old('challenges_in', $challengesText) }}"
                                placeholder="e.g. Yarn breakage, Loose linking"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <span class="text-xs text-gray-400">Separate tags with a comma</span>
                        </div>
                    </div>
                </div>

                <!-- 3. Image File Upload Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-md font-bold text-gray-900 border-b pb-2 mb-4">Sample Media Records</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <!-- Front Part Image Card -->
                        <div class="border rounded-lg p-4 bg-gray-50 flex flex-col justify-between">
                            <div>
                                <label for="front_part_image"
                                    class="block text-sm font-semibold text-gray-700 mb-2">Front Part Image</label>
                                <input type="file" name="front_part_image" id="front_part_image" accept="image/*"
                                    class="text-xs text-gray-600 block w-full file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            </div>
                            <div class="mt-4 flex flex-col items-center">
                                <span class="text-xs text-gray-400 mb-1">Current Image:</span>
                                @if ($sample->front_part_image)
                                    <img src="{{ asset('storage/' . $sample->front_part_image) }}"
                                        alt="Current Front" class="h-24 w-auto object-contain rounded shadow border">
                                @else
                                    <span class="text-xs text-gray-500 italic">No image found</span>
                                @endif
                            </div>
                        </div>

                        <!-- Back Part Image Card -->
                        <div class="border rounded-lg p-4 bg-gray-50 flex flex-col justify-between">
                            <div>
                                <label for="back_part_image"
                                    class="block text-sm font-semibold text-gray-700 mb-2">Back Part Image</label>
                                <input type="file" name="back_part_image" id="back_part_image" accept="image/*"
                                    class="text-xs text-gray-600 block w-full file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            </div>
                            <div class="mt-4 flex flex-col items-center">
                                <span class="text-xs text-gray-400 mb-1">Current Image:</span>
                                @if ($sample->back_part_image)
                                    <img src="{{ asset('storage/' . $sample->back_part_image) }}" alt="Current Back"
                                        class="h-24 w-auto object-contain rounded shadow border">
                                @else
                                    <span class="text-xs text-gray-500 italic">No image found</span>
                                @endif
                            </div>
                        </div>

                        <!-- Gallery Challenge Images Card -->
                        <div class="border rounded-lg p-4 bg-gray-50 flex flex-col justify-between">
                            <div>
                                <label for="challenge_images"
                                    class="block text-sm font-semibold text-gray-700 mb-2">Challenge Images
                                    (Multiple)</label>
                                <input type="file" name="challenge_images[]" id="challenge_images"
                                    content="multiple" multiple accept="image/*"
                                    class="text-xs text-gray-600 block w-full file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            </div>
                            <div class="mt-4">
                                <span class="text-xs text-gray-400 block text-center mb-1">Current Gallery:</span>
                                @if ($sample->challenge_images && is_array($sample->challenge_images))
                                    <div
                                        class="grid grid-cols-3 gap-1 max-h-24 overflow-y-auto p-1 border rounded bg-white">
                                        @foreach ($sample->challenge_images as $img)
                                            <img src="{{ asset('storage/' . $img) }}" alt="Gallery Challenge"
                                                class="h-10 w-full object-cover rounded shadow-sm">
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center text-xs text-gray-500 italic">No images found</div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Form Controls Row -->
                <div class="flex justify-end space-x-3">
                    <button type="reset"
                        class="px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-wider hover:bg-gray-300">Reset
                        Form</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update
                        Sample</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
