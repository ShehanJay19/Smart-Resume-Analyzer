<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    // Use guarded empty to allow mass assignment for all fields used in examples.
    // In production, prefer explicit $fillable.
    protected $guarded = [];

    // Cast JSON columns to arrays automatically
    protected $casts = [
        'quality_breakdown' => 'array',
        'scores' => 'array',
    ];
}
