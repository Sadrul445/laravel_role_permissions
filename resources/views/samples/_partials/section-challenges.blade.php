{{-- resources/views/samples/_partials/section-challenges.blade.php --}}

<div class="section-card">

    {{-- Header --}}
    <div class="section-header">
        <div class="section-icon" style="background:var(--section-challenge-bg); color:var(--section-challenge-fg);">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>
        <div class="section-meta">
            <span class="section-meta-label">Section 3</span>
            <span class="section-meta-title">Challenges</span>
        </div>
    </div>

    {{-- Body --}}
    <div class="section-body">

        <label class="field-label">
            Challenges In
            <span style="font-weight:400; text-transform:none; letter-spacing:0; color:var(--color-text-subtle);">(Multi-select tags)</span>
        </label>

        {{-- Tag input box --}}
        <div id="challenges-container"
             class="tag-input-box"
             onclick="document.getElementById('challenge-text-input').focus()">
            <span class="tag-placeholder" id="tag-placeholder">Click a suggestion below or type to add tags…</span>
            <input type="text"
                   id="challenge-text-input"
                   class="tag-text-input"
                   placeholder=""
                   onkeydown="handleTagKeydown(event)">
        </div>

        {{-- Hidden input carrying JSON for form submission --}}
        <input type="hidden" name="challenges_in" id="challenges-in-value"
               value="{{ old('challenges_in', '[]') }}">

        {{-- Quick-add suggestion chips --}}
        <div class="suggestion-chips">
            @foreach($challengeSuggestions as $suggestion)
                <button type="button"
                        class="suggestion-chip"
                        onclick="addChallengeTag('{{ $suggestion }}')">
                    + {{ $suggestion }}
                </button>
            @endforeach
        </div>

        <p style="margin-top:.5rem; font-size:.7rem; color:var(--color-text-subtle);">
            Type and press <kbd>Enter</kbd> to add a custom tag, or click a suggestion above.
            Press <kbd>Backspace</kbd> to remove the last tag.
        </p>

        @error('challenges_in')
            <p class="field-error">{{ $message }}</p>
        @enderror

    </div>{{-- /section-body --}}

</div>{{-- /section-card --}}