<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectBlocksModel extends Model
{
    protected $table = 'project_block';

    protected $fillable = [

        'block_id',
        'project_id',
        'block_name',
        'status_id'
    ];
}
