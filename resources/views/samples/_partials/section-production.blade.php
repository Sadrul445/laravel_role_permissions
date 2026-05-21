{{-- resources/views/samples/_partials/section-production.blade.php --}}

<div class="section-card">

    {{-- Header --}}
    <div class="section-header">
        <div class="section-icon" style="background:var(--section-production-bg); color:var(--section-production-fg);">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div class="section-meta">
            <span class="section-meta-label">Section 4</span>
            <span class="section-meta-title">Production Information</span>
        </div>
    </div>

    {{-- Body --}}
    <div class="section-body">
        <div class="form-grid">

            {{-- Submission Date --}}
            <div>
                <label for="submission_date" class="field-label">Submission Date</label>
                <input type="date"
                       id="submission_date"
                       name="submission_date"
                       value="{{ old('submission_date') }}"
                       class="form-input {{ $errors->has('submission_date') ? 'is-invalid' : '' }}">
                @error('submission_date')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Spacer (desktop grid alignment) --}}
            <div class="hidden md:block"></div>

            {{-- Knitting SMV --}}
            <div>
                <label for="knitting_smv" class="field-label">
                    Knitting SMV
                    <span style="font-weight:400; text-transform:none; letter-spacing:0; color:var(--color-text-subtle);">(mins/pcs)</span>
                </label>
                <input type="number"
                       id="knitting_smv"
                       name="knitting_smv"
                       value="{{ old('knitting_smv') }}"
                       step="0.01"
                       min="0"
                       placeholder="e.g. 2.50"
                       class="form-input {{ $errors->has('knitting_smv') ? 'is-invalid' : '' }}">
                @error('knitting_smv')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Linking SMV --}}
            <div>
                <label for="linking_smv" class="field-label">
                    Linking SMV
                    <span style="font-weight:400; text-transform:none; letter-spacing:0; color:var(--color-text-subtle);">(mins/pcs)</span>
                </label>
                <input type="number"
                       id="linking_smv"
                       name="linking_smv"
                       value="{{ old('linking_smv') }}"
                       step="0.01"
                       min="0"
                       placeholder="e.g. 1.25"
                       class="form-input {{ $errors->has('linking_smv') ? 'is-invalid' : '' }}">
                @error('linking_smv')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

        </div>{{-- /form-grid --}}
    </div>{{-- /section-body --}}

</div>{{-- /section-card --}}