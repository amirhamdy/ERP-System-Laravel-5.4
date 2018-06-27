<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
    ];
}
