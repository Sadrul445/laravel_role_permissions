<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Sample Details - ') }} {{ $sample->style_no }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('samples.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Back
                    to List</a>
                <a href="{{ route('samples.edit', $sample) }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">Edit</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-messages></x-messages>

            <!-- Top Row: Images Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Sample Images</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Front Image -->
                    <div class="border rounded-lg p-4 bg-gray-50 flex flex-col items-center justify-center">
                        <span class="text-sm font-semibold text-gray-600 mb-2">Front Part</span>
                        @if ($sample->front_part_image)
                            <img src="{{ asset('storage/' . $sample->front_part_image) }}" alt="Front Part"
                                class="max-h-64 object-contain rounded shadow-md">
                        @else
                            <div class="h-40 flex items-center justify-center text-gray-400">No Image Uploaded</div>
                        @endif
                    </div>

                    <!-- Back Image -->
                    <div class="border rounded-lg p-4 bg-gray-50 flex flex-col items-center justify-center">
                        <span class="text-sm font-semibold text-gray-600 mb-2">Back Part</span>
                        @if ($sample->back_part_image)
                            <img src="{{ asset('storage/' . $sample->back_part_image) }}" alt="Back Part"
                                class="max-h-64 object-contain rounded shadow-md">
                        @else
                            <div class="h-40 flex items-center justify-center text-gray-400">No Image Uploaded</div>
                        @endif
                    </div>

                    <!-- Challenge Images -->
                    <div class="border rounded-lg p-4 bg-gray-50">
                        <span class="text-sm font-semibold text-gray-600 block mb-2 text-center">Challenge Images</span>
                        @if ($sample->challenge_images && is_array($sample->challenge_images))
                            <div class="grid grid-cols-2 gap-2 max-h-64 overflow-y-auto p-1">
                                @foreach ($sample->challenge_images as $img)
                                    <img src="{{ asset('storage/' . $img) }}" alt="Challenge"
                                        class="w-full h-24 object-cover rounded shadow-sm">
                                @endforeach
                            </div>
                        @else
                            <div class="h-40 flex items-center justify-center text-gray-400">No Challenge Images</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Bottom Row: Multi-column Info Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Card: Product Details -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Product Specifications</h3>
                    <dl class="grid grid-cols-2 gap-x-4 gap-y-3 text-sm">
                        <div class="col-span-1 font-semibold text-gray-600">Style No:</div>
                        <div class="col-span-1 text-gray-900 font-medium">{{ $sample->style_no }}</div>

                        <div class="col-span-1 font-semibold text-gray-600">Buyer Name:</div>
                        <div class="col-span-1 text-gray-900">{{ $sample->buyer ?? 'N/A' }}</div>

                        <div class="col-span-1 font-semibold text-gray-600">Sample Type:</div>
                        <div class="col-span-1 text-gray-900">{{ $sample->sample_type ?? 'N/A' }}</div>

                        <div class="col-span-1 font-semibold text-gray-600">Gauge (GG):</div>
                        <div class="col-span-1 text-gray-900">{{ $sample->gg ?? 'N/A' }}</div>

                        <div class="col-span-1 font-semibold text-gray-600">End Ply:</div>
                        <div class="col-span-1 text-gray-900">{{ $sample->end_ply ?? 'N/A' }}</div>

                        <div class="col-span-1 font-semibold text-gray-600">Weight (Dz/Lbs):</div>
                        <div class="col-span-1 text-gray-900">{{ $sample->weight_dz_lbs ?? 'N/A' }}</div>

                        <div class="col-span-1 font-semibold text-gray-600">Color:</div>
                        <div class="col-span-1 text-gray-900">{{ $sample->color ?? 'N/A' }}</div>

                        <div class="col-span-1 font-semibold text-gray-600">Season:</div>
                        <div class="col-span-1 text-gray-900">{{ $sample->season ?? 'N/A' }}</div>
                    </dl>

                    <div class="mt-4 pt-4 border-t">
                        <span class="block text-sm font-semibold text-gray-600 mb-1">Yarn Composition:</span>
                        <p class="text-sm text-gray-900 bg-gray-50 p-2.5 rounded border whitespace-pre-line">
                            {{ $sample->yarn_composition ?? 'No specs added' }}</p>
                    </div>

                    <div class="mt-3">
                        <span class="block text-sm font-semibold text-gray-600 mb-1">Description:</span>
                        <p class="text-sm text-gray-900 bg-gray-50 p-2.5 rounded border whitespace-pre-line">
                            {{ $sample->description ?? 'No description added' }}</p>
                    </div>
                </div>

                <!-- Right Card: Production & Challenges -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 border-b pb-2 mb-4">Production & Quality</h3>
                        <dl class="grid grid-cols-2 gap-x-4 gap-y-3 text-sm">
                            <div class="col-span-1 font-semibold text-gray-600">Submission Date:</div>
                            <div class="col-span-1 text-gray-900">
                                {{ $sample->submission_date ? \Carbon\Carbon::parse($sample->submission_date)->format('d M, Y') : 'N/A' }}
                            </div>

                            <div class="col-span-1 font-semibold text-gray-600">Knitting SMV:</div>
                            <div class="col-span-1 text-gray-900">
                                {{ $sample->knitting_smv ? $sample->knitting_smv . ' min' : 'N/A' }}</div>

                            <div class="col-span-1 font-semibold text-gray-600">Linking SMV:</div>
                            <div class="col-span-1 text-gray-900">
                                {{ $sample->linking_smv ? $sample->linking_smv . ' min' : 'N/A' }}</div>

                            <div class="col-span-1 font-semibold text-gray-600">Current Status:</div>
                            <div class="col-span-1">
                                <span
                                    class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $sample->status === 'approved' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $sample->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $sample->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}
                                    {{ $sample->status === 'draft' ? 'bg-gray-100 text-gray-800' : '' }}">
                                    {{ ucfirst($sample->status) }}
                                </span>
                            </div>
                        </dl>

                        <!-- Challenges Tags Mapping -->
                        <div class="mt-5 pt-4 border-t">
                            <span class="block text-sm font-semibold text-gray-600 mb-2">Identified Challenges:</span>
                            @if ($sample->challenges_in && is_array($sample->challenges_in))
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($sample->challenges_in as $tag)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-sm text-gray-400 italic">No specific challenges tagged.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Audit Trail logs info -->
                    <div class="mt-6 pt-4 border-t text-xs text-gray-500 space-y-1 bg-gray-50 p-3 rounded">
                        <div><span class="font-semibold">Created At:</span>
                            {{ $sample->created_at->format('d M, Y h:i A') }}</div>
                        @if ($sample->updated_at)
                            <div><span class="font-semibold">Last Updated:</span>
                                {{ $sample->updated_at->format('d M, Y h:i A') }}</div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
