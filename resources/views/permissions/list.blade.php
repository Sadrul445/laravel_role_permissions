<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
        <a href="{{route('permissions.create')}}" class="inline-flex items-center px-4 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-wider hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create Permission</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-messages></x-messages>
            <div class="bg-green-200 border-green-600 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="p-6 text-gray-900">
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
