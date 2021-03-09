<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectBlocksModel;

class ProjectBlocksController extends Controller
{
    public function InsertProjectBlocks(Request $request){

        $project_block = new ProjectBlocksModel();

        $block_id = $project_block->block_id = $request->input('block_id');
        $project_id = $project_block->project_id = $request->input('project_id');
        $block_name = $project_block->block_name = $request->input('block_name');
        $status_id = $project_block->status_id = $request->input('status_id');

        $project_block->save();
        echo \json_encode(array("response"=>"project block inserted"));
    }
}
