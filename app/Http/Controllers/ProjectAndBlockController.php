<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;
use App\ProjectBlocksModel;
use App\ProjectUnitsModel;
use App\ProjectFloors;
use Illuminate\Support\Facades\DB;

class ProjectAndBlockController extends Controller
{
    public function ProjectAndBlockList(Request $request){

        $project = ProjectModel::get(['project_name','project_id']);
    

        if(!$project){
        
            return \response()->json([$response = 'success'=>0,'message'=>'data empty..']);
        }
        else{
        
            $project_block = ProjectBlocksModel::get(['block_name','block_id','project_id']);
            return \response()->json([$response = 'success'=>1,"project_blocks"=>$project_block]);
        }
        
    }
    public function SelectProjectBlock(Request $request){

        $project_block = new ProjectBlocksModel();

        $project_id = $project_block-> project_id = $request->input("project_id");

        if($project_block::where('project_id','=',$project_id)->first()){
    
            $block_id = 'block_id';
            $block_name = 'block_name';
            $project_block_list = $project_block::where('project_id','=',$project_id)->get([$block_name->$block_id]);
            return \response()->json([$response = 'success'=> 1, "project_block"=>$project_block_list]);
        }
        else{
            return \response()->json([$response = 'success'=>0 ,'message'=>'This is not valid project']);
        }
    }

    public function getBlockDetails(Request $request){

        $project_floor = new ProjectFloors();
        $project_unit = new ProjectUnitsModel();

        $block_id = $project_floor->block_id = $request->input('block_id');

        if($project_floor::where('block_id','=',$block_id)->first()){

        
            $all_details = $project_unit::where('block_id','=',$block_id)->get();
            return \response()->json([$response = 'success'=>1 , 'blocks'=>$all_details]);
        }
        else{
            return \response()->json([$response = 'success'=>0,'message'=>'Wing not available']);
        }
    }
    public function ProjectAndBlockListWith(Request $request){

        $project = new ProjectModel();
        $project_id = DB::table('projects')->get(['project_id','project_name']);
        $project_block = new ProjectBlocksModel();
        
        $values =[];
        foreach($project_id as $key=>$value){
        
         $value->blocks = $project_block::where('project_id','=',$value->project_id)->get(['block_id','block_name']);
        
        }
        return \response()->json([$response = 'success'=>1,'data'=>$project_id]);
    }

    public function getBlockDetailsByID(Request $request){

        $project_block = new ProjectBlocksModel();
        $project_unit = new ProjectUnitsModel(); 
        $project_floor = new ProjectFloors();

        $block_id = $project_block->block_id = $request->input('block_id');
    

        if($project_block::where('block_id','=',$block_id)->first()){

            $floor_id = $project_floor::where('block_id','=',$block_id)->get(['block_id','floor_id','floor_name']);

           foreach($floor_id as $key=>$value){
            $value->AvailableBlockCount = $project_unit::where('block_id','=',$block_id)->where('inventory_status_id','=',1)->count();
            $value->Available = $project_unit::where('floor_id','=',$value->floor_id)->where('inventory_status_id','=',1)->get(['unit_id','inventory_status_id','unit_name']);
            $value->Hold = $project_unit::where('floor_id','=',$value->floor_id)->where('inventory_status_id','=',3)->get
            (['unit_id','unit_name','unit_category','inventory_status_id','sales_person_name']);
           
        }
           return \response()->json([$response= 'success'=>1,'data'=>$floor_id]);
        }
        else{
            return \response()->json([$response = 'success'=>0,'message'=>'This wing is not valied']);
        }
    }

    public function getAllUnitsById(Request $request){

        //modify the api for test
        $project_block = new ProjectBlocksModel();
        $project_unit = new ProjectUnitsModel(); 
        $project_floor = new ProjectFloors();

        $block_id = $project_block->block_id = $request->input('block_id');
    

        if($project_block::where('block_id','=',$block_id)->first()){

            $floor_id = $project_floor::where('block_id','=',$block_id)->get(['block_id','floor_id','floor_name']);

           foreach($floor_id as $key=>$value){
            $value->AvailableBlockCount = $project_unit::where('block_id','=',$block_id)->where('inventory_status_id','=',1)->count();
            $value->Available = $project_unit::where('floor_id','=',$value->floor_id)->where('inventory_status_id','=',1)->get(['unit_id','inventory_status_id','unit_name']);
            $value->Hold = $project_unit::where('floor_id','=',$value->floor_id)->where('inventory_status_id','=',3)->get
            (['unit_id','unit_name','unit_category','inventory_status_id','sales_person_name']);
        }
           return \response()->json([$response= 'success'=>1,'data'=>$floor_id]);
        }
        else{
            return \response()->json([$response = 'success'=>0,'message'=>'This wing is not valied']);
        }
    }
}