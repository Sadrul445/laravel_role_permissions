<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('permissions.store')}}" method="post">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Permission Name
                                <div class="my-3">
                                    <input value="{{ old('name') }}" type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('name')
                                      <p class="mt-2 text-sm text-red-600" id="name-error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 mt-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Permission</button>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
