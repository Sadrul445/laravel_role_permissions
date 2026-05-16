<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permissions') }}
            </h2>
            <a href="{{ route('permissions.create') }}"
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
            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead style="font-size:13px" class="font-bold text-white bg-gray-800">
                            <tr class="text-center">
                                <th scope="col" class="hidden px-4 py-4 text-center uppercase tracking-wider">
                                    ID</th>
                                <th scope="col" class="px-4 py-4 text-center uppercase tracking-wider">
                                    Name</th>
                                <th scope="col" class="px-4 py-4 text-center uppercase tracking-wider">
                                    Created At</th>
                                <th scope="col" class="px-4 py-4 text-center uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($permissions as $permission)
                                <tr class="text-center">
                                    <td class="px-4 py-4 whitespace-nowrap hidden">{{ $permission->id }}</td>
                                    <td class="px-4 py-4 whitespace-normal">{{ $permission->name }}</td>
                                    <td class="px-4 py-4 whitespace-normal">
                                        {{ $permission->created_at->format('d M, Y , h:i:s A') }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <a href="{{ route('permissions.edit', $permission->id) }}"
                                            class="inline-flex items-center px-2 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 my-3 bg-gray-100 px-4 py-3">
                    {{ $permissions->links() }}
                </div>
                </div>
                
            </div>

        </div>
    </div>
</x-app-layout>
