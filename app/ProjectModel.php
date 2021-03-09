<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';

    protected $fillable = [

        'project_id',
        'project_type_id',
        'company_id',
        'project_name',
        'address',
        'reg_no',
        'status_id',
        
    ];
}
