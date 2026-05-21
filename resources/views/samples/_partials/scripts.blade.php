{{-- resources/views/samples/_partials/scripts.blade.php --}}
<script>
/* ==========================================================================
   Sample Form — Client-side behaviour
   ========================================================================== */

/* --------------------------------------------------------------------------
   1. Image preview helpers
   -------------------------------------------------------------------------- */

/**
 * Single-image preview.
 * @param {HTMLInputElement} input
 * @param {string}           previewId  — ID of the .preview-single wrapper
 */
function previewSingleImage(input, previewId) {
    const wrapper = document.getElementById(previewId);
    if (!wrapper || !input.files || !input.files[0]) return;

    const reader = new FileReader();
    reader.onload = (e) => {
        wrapper.querySelector('img').src = e.target.result;
        wrapper.classList.remove('hidden');
    };
    reader.readAsDataURL(input.files[0]);
}

/**
 * Multiple-image preview for challenge images.
 * @param {HTMLInputElement} input
 */
function previewMultipleImages(input) {
    const container = document.getElementById('challenge-preview');
    if (!container) return;

    container.innerHTML = '';

    Array.from(input.files).forEach((file) => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const item = document.createElement('div');
            item.className = 'preview-multi-item';
            item.innerHTML = `
                <img src="${e.target.result}" alt="Challenge preview">
                <span class="preview-multi-badge">IMG</span>
            `;
            container.appendChild(item);
        };
        reader.readAsDataURL(file);
    });
}


/* --------------------------------------------------------------------------
   2. Tag / Challenges-In system
   -------------------------------------------------------------------------- */

/** Restore tags from old() on validation failure */
let challengeTags = @json(
    old('challenges_in')
        ? (json_decode(old('challenges_in'), true) ?? [])
        : []
);

/**
 * Render current tag list into the DOM and sync the hidden input.
 */
function renderTags() {
    const container   = document.getElementById('challenges-container');
    const placeholder = document.getElementById('tag-placeholder');
    const textInput   = document.getElementById('challenge-text-input');
    const hiddenInput = document.getElementById('challenges-in-value');

    if (!container) return;

    // Remove old pills (keep placeholder + text input)
    container.querySelectorAll('.tag-pill').forEach(el => el.remove());

    // Show / hide placeholder
    placeholder.style.display = challengeTags.length ? 'none' : '';

    // Render a pill for each tag — insert before the text input
    challengeTags.forEach((tag, index) => {
        const pill = document.createElement('span');
        pill.className = 'tag-pill';
        pill.innerHTML = `
            ${tag}
            <button type="button"
                    class="tag-pill-remove"
                    aria-label="Remove ${tag}"
                    onclick="removeChallengeTag(${index})">&times;</button>
        `;
        container.insertBefore(pill, textInput);
    });

    // Sync hidden input
    hiddenInput.value = JSON.stringify(challengeTags);
}

/**
 * Add a tag (no-op if already exists).
 * @param {string} name
 */
function addChallengeTag(name) {
    const trimmed = name.trim();
    if (trimmed && !challengeTags.includes(trimmed)) {
        challengeTags.push(trimmed);
        renderTags();
    }
}

/**
 * Remove a tag by index.
 * @param {number} index
 */
function removeChallengeTag(index) {
    challengeTags.splice(index, 1);
    renderTags();
}

/**
 * Handle keyboard events inside the tag text input.
 * — Enter  → add the typed value as a tag
 * — Backspace (on empty input) → remove the last tag
 * @param {KeyboardEvent} event
 */
function handleTagKeydown(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const val = event.target.value.trim();
        if (val) {
            addChallengeTag(val);
            event.target.value = '';
        }
        return;
    }

    if (event.key === 'Backspace' && event.target.value === '' && challengeTags.length > 0) {
        challengeTags.pop();
        renderTags();
    }
}

// Initialise on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    renderTags();
});
</script>