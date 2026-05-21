<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Samples') }}
            </h2>
            <a href="{{ route('samples.create') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-messages></x-messages>
            {{-- <div class="bg-green-200 border-green-600 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="p-6 text-gray-900">
                </div>
            </div> --}}
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead style="font-size:13px" class="font-bold text-white bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">ID</th>    
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Style No</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Buyer</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Sample Type</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">GG</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Color</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Season</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Submission Date</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            @forelse ($samples as $sample)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $sample->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $sample->style_no }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sample->buyer ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sample->sample_type ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sample->gg ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sample->color ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sample->season ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sample->submission_date ? \Carbon\Carbon::parse($sample->submission_date)->format('d M, Y') : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $sample->status === 'approved' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $sample->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $sample->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}
                                            {{ $sample->status === 'draft' ? 'bg-gray-100 text-gray-800' : '' }}">
                                            {{ ucfirst($sample->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-normal break-words text-sm text-gray-500">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('samples.show', $sample) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-xs font-semibold rounded-md hover:bg-blue-700">View</a>
                                            <a href="{{ route('samples.edit', $sample) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-500 text-white text-xs font-semibold rounded-md hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('samples.destroy', $sample) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this sample?')" class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-xs font-semibold rounded-md hover:bg-red-700">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-6 py-4 text-sm text-gray-500 text-center">No samples found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    @if(method_exists($samples, 'links'))
                        <div class="mt-4 my-3 bg-gray-100 px-4 py-3">
                            {{ $samples->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
