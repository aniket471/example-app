<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFloors extends Model
{
    protected $table ='project_floors';

    protected $fillable = [

        'floor_id',
        'block_id',
        'floor_name',
        'status_id'
    ];
}
