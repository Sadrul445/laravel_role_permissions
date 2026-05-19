<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>
            <a href="{{ route('roles.create') }}"
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
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Permissions</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-3 whitespace-nowrap text-center uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($roles as $role)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $role->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $role->name }}</td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-normal break-words text-sm text-gray-500">
                                        {{ $role->permissions->pluck('name')->join(', ') }}
                                    </td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-normal break-words text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y , h:i:s A') }}
                                    </td>
                                    <td class="px-4 py-3 sm:px-6 sm:py-4 whitespace-normal break-words text-sm text-gray-500">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('roles.show', $role) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-xs font-semibold rounded-md hover:bg-blue-700">View</a>
                                            <a href="{{ route('roles.edit', $role) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-500 text-white text-xs font-semibold rounded-md hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this role?')" class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-xs font-semibold rounded-md hover:bg-red-700">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-sm text-gray-500">No roles found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4 my-3 bg-gray-100 px-4 py-3">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
