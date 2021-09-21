<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userEmployee;
use App\Models\rolesEmployee;
use App\Models\roles;
use App\Models\employee;
use App\Models\task;
use App\Models\taskEmployee;
use App\Models\projects;
use App\Models\projectsEmployee;
use App\Models\commits;
use App\Models\taskProject;
use App\Models\teams;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $getID = Auth::user()->id;
      $nameUser=Auth::user()->name;

      // configuration for CEO,PM,DEV
        $usersEmployees=userEmployee::all();
        $employee= userEmployee::where('userID', $getID)->first();
        $roleEmployee=rolesEmployee::where('id',$employee['employeeID'])->first();
        $roleValue= roles::where('id', $roleEmployee['roleID'])->first();



        if($roleValue['role']==='PM'){
          global $allProjectEmployee;
          global $allTaskAvailables;
          global $allProjectEmployee;
          global $allTaskAvailables;
          global $idAllDev;
          // available Tasks for personal  projects
          $projectsEmployee=projectsEmployee::where('employeeID',$employee['employeeID'])->get();
          if(count($projectsEmployee)>0){
            foreach ($projectsEmployee as $key => $project) {
              $allProjectEmployee[]=$project['id'];
            }
            if(count($allProjectEmployee)>0){
              $personalProjects=projects::whereIn('id', $allProjectEmployee)->get();
            }
            if(count($personalProjects)>0){
              $taskForProject=taskProject::whereIn('projectID', $personalProjects)->get();
            }
            if(count($personalProjects)>0){
              foreach ($taskForProject as $key => $task) {
                $allTaskAvailables[]=$task['taskID'];
              }
              $tasksData= task::whereIn('id',$allTaskAvailables)->get();
            }


          //select all Dev
          $devRole=roles::where('role','=','DEV')->first();
          $devEmployees=rolesEmployee::where('roleID',$devRole['id'])->get();
          foreach ($devEmployees as $key => $dev) {
            $idAllDev[]=$dev['employeeID'];
          }
          $dataDevEmployees=employee::whereIn('id',$idAllDev)->get();
          return view('PMview',compact ('roleValue','nameUser','devEmployees','tasksData','taskForProject'));

        }
        return view('PMview',compact ('roleValue','nameUser'));
        }

        if($roleValue['role']==='DEV'){
          $personalCommits=commits::where('employeeID',$employee['employeeID'])->get();
          $tasksEmployee=taskEmployee::where('employeeID',$employee['employeeID'])->get();
          $personalTasks=task::select('id','status','description')->whereIn('id', $tasksEmployee)->get();
          return view('DEVview',compact ('roleValue','personalTasks','nameUser','personalCommits'));
        }

        if($roleValue['role']==='CEO'){
          // all PM
          global $allPMroleEmployee;
          $PMrole=roles::where('role','PM')->first();
          $PMroleEmployee=rolesEmployee::where('roleID',$PMrole['id'])->get();
          foreach ($PMroleEmployee as $key => $employee) {
            $allPMroleEmployee[]=$employee['employeeID'];
          }
          $PMemployees=employee::whereIn('id',$allPMroleEmployee)->get();

          //
          $allTeams=teams::all();
          $allProjects=projects::all();
          return view('CEOview',compact ('roleValue','nameUser','allTeams','allProjects','PMemployees'));
        }
        else{
          return view('home',compact ('roleValue'));
        }

    }
}
