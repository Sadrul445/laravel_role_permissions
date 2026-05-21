<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
             <nav class="text-sm text-gray-800 mb-1">
            <a href="{{ route('samples.index') }}" class="hover:underline">Samples</a>
            <span class="mx-2">/</span>
            <span>New Sample</span>
        </nav>
            <a href="{{ route('samples.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Back</a>
        </div>

    </x-slot>
    {{--
    resources/views/samples/create.blade.php
    Create a new Sample — clean, responsive, modern CMS layout.
    All custom CSS lives in css/app.css (compiled via Vite / Mix).
--}}
    {{-- ── Page Header Slot ──────────────────────────────────────────────── --}}

    {{-- ── Main Content ──────────────────────────────────────────────────── --}}
    <div class="sample-form-wrapper">

        {{-- Page breadcrumb & title --}}

        {{-- Validation error banner --}}
        @if ($errors->any())
            <div class="error-banner">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ════════════════════════════════════════════════════════════════ --}}
        {{-- FORM                                                            --}}
        {{-- ════════════════════════════════════════════════════════════════ --}}
        <form action="{{ route('samples.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- ── SECTION 1 · Sample Images ─────────────────────────────── --}}
            @include('samples._partials.section-images')

            {{-- ── SECTION 2 · Product Details ──────────────────────────── --}}
            @include('samples._partials.section-product')

            {{-- ── SECTION 3 · Challenges ────────────────────────────────── --}}
            @include('samples._partials.section-challenges')

            {{-- ── SECTION 4 · Production Information ────────────────────── --}}
            @include('samples._partials.section-production')

            {{-- ── SECTION 5 · Status & Audit ────────────────────────────── --}}
            @include('samples._partials.section-status')

        </form>

    </div>

    {{-- ── Inline scripts (only JS behaviour, no inline styles) ─────────── --}}
    @push('scripts')
        @include('samples._partials.scripts')
    @endpush
</x-app-layout>