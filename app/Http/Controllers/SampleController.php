<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //fetch all samples
        $query = Sample::latest();

        if ($search = $request->input('search')) {
            $query->search($search);
        }

        if ($status = $request->input('status')) {
            $query->byStatus($status);
        }

        $samples = $query->paginate(20)->withQueryString();

        return view('samples.index', compact('samples'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create sample form
        return view('samples.create', [
            'sampleTypes'          => Sample::SAMPLE_TYPES,
            'gauges'               => Sample::GAUGES,
            'statuses'             => Sample::STATUSES,
            'challengeSuggestions' => Sample::CHALLENGE_SUGGESTIONS,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateSample($request);

        // Handle save_as override (draft button)
        if ($request->input('save_as') === 'draft') {
            $validated['status'] = 'draft';
        }

        // Upload images
        $validated = array_merge($validated, $this->handleImageUploads($request));

        Sample::create($validated);

        return redirect()
            ->route('samples.index')
            ->with('success', 'Sample created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sample $sample)
    {
        return view('samples.show', compact('sample'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sample $sample)
    {
        return view('samples.edit', [
            'sample'               => $sample,
            'sampleTypes'          => Sample::SAMPLE_TYPES,
            'gauges'               => Sample::GAUGES,
            'statuses'             => Sample::STATUSES,
            'challengeSuggestions' => Sample::CHALLENGE_SUGGESTIONS,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sample $sample)
    {
        $validated = $this->validateSample($request, $sample->id);
 
        if ($request->input('save_as') === 'draft') {
            $validated['status'] = 'draft';
        }
 
        $uploads = $this->handleImageUploads($request, $sample);
        $validated = array_merge($validated, $uploads);
 
        $sample->update($validated);
 
        return redirect()
            ->route('samples.show', $sample)
            ->with('success', 'Sample updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sample $sample)
    {
        // Delete stored images
        $this->deleteImages($sample);
        $sample->delete();

        return redirect()
            ->route('samples.index')
            ->with('success', 'Sample deleted.');
    }

    // ================================================================== //
    //  Private Helpers
    // ================================================================== //

    private function validateSample(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            // Images
            'front_part_image'    => 'nullable|image|max:2048',
            'back_part_image'     => 'nullable|image|max:2048',
            'challenge_images'    => 'nullable|array',
            'challenge_images.*'  => 'image|max:2048',

            // Product Details
            'style_no'            => 'required|string|max:100',
            'buyer'               => 'nullable|string|max:150',
            'sample_type'         => ['nullable', Rule::in(Sample::SAMPLE_TYPES)],
            'gg'                  => ['nullable', Rule::in(Sample::GAUGES)],
            'end_ply'             => 'nullable|string|max:50',
            'weight_dz_lbs'       => 'nullable|string|max:50',
            'color'               => 'nullable|string|max:100',
            'season'              => 'nullable|digits:4|integer|min:2000|max:2100',
            'yarn_composition'    => 'nullable|string|max:1000',
            'description'         => 'nullable|string|max:5000',

            // Challenges
            'challenges_in'       => 'nullable|string',   // comes as JSON string

            // Production
            'submission_date'     => 'nullable|date',
            'knitting_smv'        => 'nullable|numeric|min:0',
            'linking_smv'         => 'nullable|numeric|min:0',

            // Status
            'status'              => ['required', Rule::in(array_keys(Sample::STATUSES))],
        ]);
    }

    private function handleImageUploads(Request $request, ?Sample $existing = null): array
    {
        $result = [];

        // Single images
        foreach (['front_part_image', 'back_part_image'] as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if updating
                if ($existing && $existing->$field) {
                    Storage::disk('public')->delete($existing->$field);
                }
                $result[$field] = $request->file($field)->store('samples', 'public');
            }
        }

        // Multiple challenge images
        if ($request->hasFile('challenge_images')) {
            // Delete old files if updating
            if ($existing && $existing->challenge_images) {
                foreach ($existing->challenge_images as $path) {
                    Storage::disk('public')->delete($path);
                }
            }
            $paths = [];
            foreach ($request->file('challenge_images') as $file) {
                $paths[] = $file->store('samples/challenges', 'public');
            }
            $result['challenge_images'] = $paths;
        }

        // Decode challenges_in JSON string → array
        if (isset($result['challenges_in']) || $request->filled('challenges_in')) {
            $raw = $request->input('challenges_in', '[]');
            $result['challenges_in'] = json_decode($raw, true) ?? [];
        }

        return $result;
    }

    private function deleteImages(Sample $sample): void
    {
        foreach (['front_part_image', 'back_part_image'] as $field) {
            if ($sample->$field) {
                Storage::disk('public')->delete($sample->$field);
            }
        }
        if ($sample->challenge_images) {
            foreach ($sample->challenge_images as $path) {
                Storage::disk('public')->delete($path);
            }
        }
    }
}
