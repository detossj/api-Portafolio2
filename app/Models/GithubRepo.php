<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GithubRepo extends Model
{
    protected $table = 'github_repos';

    protected $guarded = [];

    protected $casts = [
        'stars' => 'integer',
    ];
}