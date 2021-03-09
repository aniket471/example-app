<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUnitsModel extends Model
{
    protected $table = 'project_unit';

    protected $fillable = [

        'unit_id',
        'unit_name',
        'project_id',
        'floor_id',
        'block_id',
        'unit_type_id',
        'flat_name',
        'base_rate',
        'salable_area',
        'charable_area',
        'gst_applicable',
        'gst_perent',
        'status_id',
        'inventary_status_id'
    ];
}
