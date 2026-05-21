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

            // Images
            $table->string('front_part_image')->nullable();
            $table->string('back_part_image')->nullable();
            $table->json('challenge_images')->nullable();    // stored as JSON array of paths

            // Product Details
            $table->string('style_no');
            $table->string('buyer')->nullable();
            $table->string('sample_type')->nullable();      // Proto Sample, Fit Sample, etc.
            $table->string('gg')->nullable();               // 3GG, 5GG, 7GG, 9GG, 12GG
            $table->string('end_ply')->nullable();
            $table->string('weight_dz_lbs')->nullable();
            $table->string('color')->nullable();
            $table->year('season')->nullable();
            $table->text('yarn_composition')->nullable();
            $table->text('description')->nullable();

            // Challenges
            $table->json('challenges_in')->nullable();      // stored as JSON array of tag strings

            // Production Information
            $table->date('submission_date')->nullable();
            $table->decimal('knitting_smv', 8, 2)->nullable();
            $table->decimal('linking_smv', 8, 2)->nullable();

            // Status & Audit
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected'])->default('draft');

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
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