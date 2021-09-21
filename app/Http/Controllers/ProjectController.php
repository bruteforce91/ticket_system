<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\rolesEmployee;
use App\Models\taskEmployee;
use App\Models\User;
use App\Models\task;
use App\Models\taskProject;
use App\Models\projectsEmployee;
use App\Models\projects;

class ProjectController extends Controller
{
    public function index(){

    }
    public function show($id){

    }

    public function store(Request $request){

    }

    public function destroy($id){

    }

    public function assignProject(Request $request){
        $projectNameSelected=request()->input('projects');
        $jsonProjectNameSelected=json_decode($projectNameSelected, true);
        $projectSelected=projects::where('name',$jsonProjectNameSelected['name'])->first();

        $pm=request()->input('pm');
        $jsonPMSelected=json_decode($pm, true);
        $PMSelected=employee::where('name',$jsonPMSelected['name'])->first();

        $obj = [
                    'projectID' => $projectSelected['id'],
                    'employeeID' => $PMSelected['id'],
                ];
      projectsEmployee::create($obj);

      return response()->json(['message' => 'ok']);
    }
}
