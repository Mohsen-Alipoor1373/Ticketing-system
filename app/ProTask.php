<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProTask extends Model
{
    protected $fillable = [
        'user_id', 'task_id', 'project_id', 'permision',
    ];
}
