{{-- resources/views/samples/_partials/section-images.blade.php --}}

<div class="section-card">

    {{-- Header --}}
    <div class="section-header">
        <div class="section-icon" style="background:var(--section-images-bg); color:var(--section-images-fg);">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div class="section-meta">
            <span class="section-meta-label">Section 1</span>
            <span class="section-meta-title">Sample Images</span>
        </div>
    </div>

    {{-- Body --}}
    <div class="section-body">
        <div class="form-grid">

            {{-- Front Part Image --}}
            <div>
                <label class="field-label">Front Part Image</label>

                <label class="upload-zone">
                    <svg xmlns="http://www.w3.org/2000/svg" class="upload-zone-icon" style="width:1.75rem;height:1.75rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <span class="upload-zone-text">Click or drag to upload</span>
                    <span class="upload-zone-hint">JPG, PNG — max 2 MB</span>
                    <input type="file"
                           name="front_part_image"
                           accept="image/*"
                           class="sr-only"
                           onchange="previewSingleImage(this, 'front-preview')">
                </label>

                <div id="front-preview" class="preview-single hidden">
                    <img src="" alt="Front Part Preview">
                </div>

                @error('front_part_image')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Back Part Image --}}
            <div>
                <label class="field-label">Back Part Image</label>

                <label class="upload-zone">
                    <svg xmlns="http://www.w3.org/2000/svg" class="upload-zone-icon" style="width:1.75rem;height:1.75rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <span class="upload-zone-text">Click or drag to upload</span>
                    <span class="upload-zone-hint">JPG, PNG — max 2 MB</span>
                    <input type="file"
                           name="back_part_image"
                           accept="image/*"
                           class="sr-only"
                           onchange="previewSingleImage(this, 'back-preview')">
                </label>

                <div id="back-preview" class="preview-single hidden">
                    <img src="" alt="Back Part Preview">
                </div>

                @error('back_part_image')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Challenge Images (multiple) --}}
            <div class="col-span-full">
                <label class="field-label">
                    Challenge Images
                    <span style="font-weight:400; text-transform:none; letter-spacing:0; color:var(--color-text-subtle);">(Multiple)</span>
                </label>

                <label class="upload-zone">
                    <svg xmlns="http://www.w3.org/2000/svg" class="upload-zone-icon" style="width:1.75rem;height:1.75rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span class="upload-zone-text">Select multiple challenge images</span>
                    <span class="upload-zone-hint">Hold Ctrl / Cmd to select multiple — stored as JSON array</span>
                    <input type="file"
                           name="challenge_images[]"
                           accept="image/*"
                           multiple
                           class="sr-only"
                           onchange="previewMultipleImages(this)">
                </label>

                <div id="challenge-preview" class="preview-multi"></div>

                @error('challenge_images')
                    <p class="field-error">{{ $message }}</p>
                @enderror
                @error('challenge_images.*')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

        </div>{{-- /form-grid --}}
    </div>{{-- /section-body --}}

</div>{{-- /section-card --}}