<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $guarded = [];

    protected $casts = [
        'technologies' => 'array',
        'featured' => 'boolean',
    ];
}