<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'headline',
        'subheadline',
        'cta_text',
        'image'
    ];
}