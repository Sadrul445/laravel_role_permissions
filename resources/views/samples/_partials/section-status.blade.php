{{-- resources/views/samples/_partials/section-status.blade.php --}}

<div class="section-card">

    {{-- Header --}}
    <div class="section-header">
        <div class="section-icon" style="background:var(--section-status-bg); color:var(--section-status-fg);">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="section-meta">
            <span class="section-meta-label">Section 5</span>
            <span class="section-meta-title">Status &amp; Audit</span>
        </div>
    </div>

    {{-- Body --}}
    <div class="section-body">

        <label class="field-label">Status</label>

        <div class="radio-pill-group">
            @foreach($statuses as $value => $label)
                <label class="radio-pill status-pill status-{{ $value }}">
                    <input type="radio"
                           name="status"
                           value="{{ $value }}"
                           {{ old('status', 'draft') === $value ? 'checked' : '' }}>
                    <span class="radio-pill-label">{{ $label }}</span>
                </label>
            @endforeach
        </div>

        <p style="margin-top:.5rem; font-size:.7rem; color:var(--color-text-subtle);">
            Default status is <strong>Draft</strong>. Change to <strong>Pending</strong> when ready for review.
        </p>

        @error('status')
            <p class="field-error">{{ $message }}</p>
        @enderror

    </div>{{-- /section-body --}}

    {{-- Form Action Bar --}}
    <div class="form-actions">

        <a href="{{ route('samples.index') }}" class="btn btn-ghost">
            Cancel
        </a>

        <button type="submit"
                name="save_as"
                value="draft"
                class="btn btn-outline">
            Save as Draft
        </button>

        <button type="submit"
                name="save_as"
                value="submit"
                class="btn btn-primary">
            Submit Sample
        </button>

    </div>

</div>{{-- /section-card --}}