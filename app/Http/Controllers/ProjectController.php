<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class ProjectController extends Controller
{
    public function InsertProjectDetails(Request $request){

        $project = new ProjectModel();

       $project_id = $project -> project_id = $request->input('project_id');
       $project_type_id = $project -> project_type_id = $request->input('project_type_id');
       $company_id = $project -> company_id = $request->input('company_id');
       $project_name = $project -> project_name = $request->input('project_name');
       $address = $project -> address = $request->input('address');
       $reg_no = $project -> reg_no = $request->input('reg_no');
       $status_id = $project -> status_id = $request->input('status_id');

       $project->save();
       echo \json_encode(array("response"=>"project inserted"));
    }
}
