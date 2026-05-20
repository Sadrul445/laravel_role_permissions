<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = [
        'style_no',
        'buyer',
        'sample_type',
        'front_part_image',
        'back_part_image',
        'challenge_images',
        'gg',
        'end_ply',
        'weight_dz_lbs',
        'yarn_composition',
        'description',
        'color',
        'season',
        'knitting_smv',
        'linking_smv',
    ];

    protected $casts = [
        'challenge_images' => 'array', // Cast JSON to array
        'knitting_smv' => 'decimal:10,2',
        'linking_smv' => 'decimal:10,2',
    ];
    
}
