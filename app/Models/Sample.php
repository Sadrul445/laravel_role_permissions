<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Sample extends Model
{
    use HasFactory, SoftDeletes;

    // ------------------------------------------------------------------ //
    //  Fillable
    // ------------------------------------------------------------------ //

    protected $fillable = [
        'front_part_image',
        'back_part_image',
        'challenge_images',
        'style_no',
        'buyer',
        'sample_type',
        'gg',
        'end_ply',
        'weight_dz_lbs',
        'color',
        'season',
        'yarn_composition',
        'description',
        'challenges_in',
        'submission_date',
        'knitting_smv',
        'linking_smv',
        'status',
        'created_by',
        'updated_by',
    ];

    // ------------------------------------------------------------------ //
    //  Casts
    // ------------------------------------------------------------------ //

    protected $casts = [
        'challenge_images' => 'array',
        'challenges_in'    => 'array',
        'submission_date'  => 'date',
        'knitting_smv'     => 'decimal:2',
        'linking_smv'      => 'decimal:2',
    ];

    // ------------------------------------------------------------------ //
    //  Constants
    // ------------------------------------------------------------------ //

    const SAMPLE_TYPES = [
        'Proto Sample',
        'Fit Sample',
        'Size Set',
        'PP Sample',
        'TOP Sample',
    ];

    const GAUGES = ['3GG', '5GG', '7GG', '9GG', '12GG'];

    const STATUSES = [
        'draft'    => 'Draft',
        'pending'  => 'Pending',
        'approved' => 'Approved',
        'rejected' => 'Rejected',
    ];

    const CHALLENGE_SUGGESTIONS = [
        'Knitting', 'Linking', 'Ironing', 'Packing',
        'Washing', 'Seaming', 'Finishing', 'QC', 'Embroidery',
    ];

    // ------------------------------------------------------------------ //
    //  Relationships
    // ------------------------------------------------------------------ //

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // ------------------------------------------------------------------ //
    //  Scopes
    // ------------------------------------------------------------------ //

    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByBuyer($query, string $buyer)
    {
        return $query->where('buyer', 'like', "%{$buyer}%");
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('style_no', 'like', "%{$term}%")
              ->orWhere('buyer', 'like', "%{$term}%")
              ->orWhere('color', 'like', "%{$term}%")
              ->orWhere('description', 'like', "%{$term}%");
        });
    }

    // ------------------------------------------------------------------ //
    //  Accessors
    // ------------------------------------------------------------------ //

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? ucfirst($this->status);
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'approved' => 'green',
            'pending'  => 'yellow',
            'rejected' => 'red',
            default    => 'gray',
        };
    }

    // ------------------------------------------------------------------ //
    //  Boot — auto-track creator / updater
    // ------------------------------------------------------------------ //

    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id();
            }
        });

        static::updating(function (self $model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }
}