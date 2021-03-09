<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;
use App\ProjectBlocksModel;
use App\ProjectUnitsModel;
use App\ProjectFloors;
use Illuminate\Support\Facades\DB;

class CheckAvailableHoldController extends Controller
{
    public function checkAvailableORHold(Request $request){

        $project_block = new ProjectBlocksModel();
        $project_unit = new ProjectUnitsModel(); 
        $project_floor = new ProjectFloors();

        $block_id = $project_block->block_id = $request->input('block_id');

        if($project_block::where('block_id','=',$block_id)->first()){

            $floor_id = $project_floor::where('block_id','=',$block_id)->get(['floor_id','floor_name','block_id']);
            $units = $project_unit::where('floor_id','=',$floor_id->floor_id)->get(['unit_id']);

            return $units;
        }
        else{

            return \response()->json([$response = "This block not contain any flat"]);
        }
    }
}
