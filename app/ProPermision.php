<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProPermision extends Model
{
    protected $fillable = [
        'project_id', 'permision_id',
    ];
}
