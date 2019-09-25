<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'LanDev', 'user_id',
    ];

    public function task()
    {
        return $this->belongsToMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
