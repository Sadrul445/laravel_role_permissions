<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles / Create
            </h2>
            <a href="{{ route('roles.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Back</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('roles.store')}}" method="post">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Role Name
                                <div class="my-3">
                                    <input value="{{ old('name') }}" type="text" name="name" id="name"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600" id="name-error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="grid grid-cols-4 gap-4 mx-4">
                                    @if ($permissions->isNotEmpty())
                                        @foreach ($permissions as $permission)
                                            <div class="mt-3">
                                                <input type="checkbox"
                                                       class="rounded" 
                                                       name="permission[]"
                                                       value="{{ $permission->name }}">
                                                <label for="permission-{{ $permission->id }}" class="text-sm text-gray-700">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 mt-6 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create
                                    Role</button>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
