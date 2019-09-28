<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'project_id', 'description', 'user_id', 'expectation',
    ];

    public function project()
    {
        return $this->belongsToMany(Project::class);
    }
}
