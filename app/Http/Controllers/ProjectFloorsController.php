<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectFloors;

class ProjectFloorsController extends Controller
{
    public function InsertProjectFloor(Request $request){

        $project_floor = new ProjectFloors();

        $floor_id = $project_floor-> floor_id = $request->input('floor_id');
        $block_id = $project_floor-> block_id = $request->input('block_id');
        $floor_name = $project_floor-> floor_name = $request->input('floor_name');
        $status_id = $project_floor-> status_id = $request->input('status_id');

        $project_floor->save();
        echo \json_encode(array("response"=>"project floors inserted"));
    }
}
