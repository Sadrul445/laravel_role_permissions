@if(Session::has('success'))
                <div class="bg-green-200 border-green-600 overflow-hidden shadow-sm sm:rounded-sm">
                    <div class="p-6 text-gray-900">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif

            @if (Session::has('error'))
                <div class="bg-red-200 border-red-600 overflow-hidden shadow-sm sm:rounded-sm">
                    <div class="p-6 text-gray-900">
                        {{ Session::get('error') }}
                    </div>
                </div>
            @endif