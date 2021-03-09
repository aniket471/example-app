<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectUnitsModel;

class ProjectUnitsController extends Controller
{
    public function InsertProjectUnits(Request $request){

        $project_unit = new ProjectUnitsModel();

        $unit_id = $project_unit-> unit_id = $request->input("unit_id");
        $project_id  = $project_unit-> project_id  = $request->input("project_id");
        $floor_id = $project_unit-> floor_id = $request->input("floor_id");
        $block_id = $project_unit-> block_id = $request->input("block_id");
        $unit_type_id = $project_unit-> unit_type_id = $request->input("unit_type_id");
        $flat_name = $project_unit-> flat_name = $request->input("flat_name");
        $base_rate = $project_unit-> base_rate = $request->input("base_rate");
        $saleable_area = $project_unit-> saleable_area = $request->input("saleable_area");
        $chargeable_area  = $project_unit-> chargeable_area  = $request->input("chargeable_area");
        $gst_applicable  = $project_unit-> gst_applicable  = $request->input("gst_applicable");
        $gst_present = $project_unit-> gst_present = $request->input("gst_present");
        $status_id = $project_unit-> status_id = $request->input("status_id");

        $project_unit->save();
        echo \json_encode(array("response"=>"project unit inserted successfully..."));
    }
}
