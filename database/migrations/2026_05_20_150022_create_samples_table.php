<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('style_no')->unique();
            $table->string('buyer')->nullable();
            $table->string('sample_type')->nullable();
            /*
            |--------------------------------------------------------------------------
            | Sample Images
            |--------------------------------------------------------------------------
            */

            // Single Image
            $table->string('front_part_image')->nullable();

            // Single Image
            $table->string('back_part_image')->nullable();

            // Multiple Images (JSON Array)
            $table->json('challenge_images')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Product Details
            |--------------------------------------------------------------------------
            */

            // Example: 3GG / 5GG / 7GG / 9GG / 12GG
            $table->string('gg')->nullable();

            $table->string('end_ply')->nullable();

            $table->string('weight_dz_lbs')->nullable();

            $table->text('yarn_composition')->nullable();

            $table->text('description')->nullable();

            $table->string('color')->nullable();

            // Example: 2026
            $table->year('season')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Challenges
            |--------------------------------------------------------------------------
            */

            // Multi Select Tags System
            // Example:
            // ["Knitting", "Ironing", "Packing"]
            $table->json('challenges_in')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Production Information
            |--------------------------------------------------------------------------
            */

            $table->date('submission_date')->nullable();

            // Example: 2.50 mins/pcs
            $table->decimal('knitting_smv', 10, 2)->nullable();

            $table->decimal('linking_smv', 10, 2)->nullable();


            /*
            |--------------------------------------------------------------------------
            | Status & Audit
            |--------------------------------------------------------------------------
            */

            $table->enum('status', [
                'draft',
                'pending',
                'approved',
                'rejected'
            ])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
