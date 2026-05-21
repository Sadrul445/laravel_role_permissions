{{-- resources/views/samples/_partials/section-product.blade.php --}}

<div class="section-card">

    {{-- Header --}}
    <div class="section-header">
        <div class="section-icon" style="background:var(--section-product-bg); color:var(--section-product-fg);">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 012-2h2z"/>
            </svg>
        </div>
        <div class="section-meta">
            <span class="section-meta-label">Section 2</span>
            <span class="section-meta-title">Product Details</span>
        </div>
    </div>

    {{-- Body --}}
    <div class="section-body">
        <div class="form-grid">

            {{-- Style No --}}
            <div>
                <label for="style_no" class="field-label">
                    Style No <span class="field-required">*</span>
                </label>
                <input type="text"
                       id="style_no"
                       name="style_no"
                       value="{{ old('style_no') }}"
                       placeholder="e.g. SMP-2026-001"
                       class="form-input {{ $errors->has('style_no') ? 'is-invalid' : '' }}">
                @error('style_no')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buyer --}}
            <div>
                <label for="buyer" class="field-label">Buyer</label>
                <input type="text"
                       id="buyer"
                       name="buyer"
                       value="{{ old('buyer') }}"
                       placeholder="Buyer name or company"
                       class="form-input {{ $errors->has('buyer') ? 'is-invalid' : '' }}">
                @error('buyer')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sample Type --}}
            <div>
                <label for="sample_type" class="field-label">Sample Type</label>
                <select id="sample_type"
                        name="sample_type"
                        class="form-select {{ $errors->has('sample_type') ? 'is-invalid' : '' }}">
                    <option value="">— Select type —</option>
                    @foreach($sampleTypes as $type)
                        <option value="{{ $type }}" {{ old('sample_type') === $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
                @error('sample_type')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- GG (Gauge) --}}
            <div>
                <label class="field-label">GG (Gauge)</label>
                <div class="radio-pill-group">
                    @foreach($gauges as $gg)
                        <label class="radio-pill gg-pill">
                            <input type="radio"
                                   name="gg"
                                   value="{{ $gg }}"
                                   {{ old('gg') === $gg ? 'checked' : '' }}>
                            <span class="radio-pill-label">{{ $gg }}</span>
                        </label>
                    @endforeach
                </div>
                @error('gg')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- End Ply --}}
            <div>
                <label for="end_ply" class="field-label">End Ply</label>
                <input type="text"
                       id="end_ply"
                       name="end_ply"
                       value="{{ old('end_ply') }}"
                       placeholder="e.g. 2/48, 1/32"
                       class="form-input {{ $errors->has('end_ply') ? 'is-invalid' : '' }}">
                @error('end_ply')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Weight dz/lbs --}}
            <div>
                <label for="weight_dz_lbs" class="field-label">Weight (dz/lbs)</label>
                <input type="text"
                       id="weight_dz_lbs"
                       name="weight_dz_lbs"
                       value="{{ old('weight_dz_lbs') }}"
                       placeholder="e.g. 12.50"
                       class="form-input {{ $errors->has('weight_dz_lbs') ? 'is-invalid' : '' }}">
                @error('weight_dz_lbs')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Color --}}
            <div>
                <label for="color" class="field-label">Color</label>
                <input type="text"
                       id="color"
                       name="color"
                       value="{{ old('color') }}"
                       placeholder="e.g. Navy Blue, Off White"
                       class="form-input {{ $errors->has('color') ? 'is-invalid' : '' }}">
                @error('color')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Season (Year) --}}
            <div>
                <label for="season" class="field-label">Season (Year)</label>
                <select id="season"
                        name="season"
                        class="form-select {{ $errors->has('season') ? 'is-invalid' : '' }}">
                    <option value="">— Select year —</option>
                    @foreach(range(date('Y') - 1, date('Y') + 3) as $year)
                        <option value="{{ $year }}" {{ old('season') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
                @error('season')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Yarn Composition --}}
            <div class="col-span-full">
                <label for="yarn_composition" class="field-label">Yarn Composition</label>
                <textarea id="yarn_composition"
                          name="yarn_composition"
                          rows="3"
                          placeholder="e.g. 100% Merino Wool, 80% Cotton 20% Polyester…"
                          class="form-textarea {{ $errors->has('yarn_composition') ? 'is-invalid' : '' }}">{{ old('yarn_composition') }}</textarea>
                @error('yarn_composition')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="col-span-full">
                <label for="description" class="field-label">Description</label>
                <textarea id="description"
                          name="description"
                          rows="4"
                          placeholder="Describe the sample in detail…"
                          class="form-textarea {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                @error('description')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

        </div>{{-- /form-grid --}}
    </div>{{-- /section-body --}}

</div>{{-- /section-card --}}