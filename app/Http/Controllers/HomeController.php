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
      $employee= userEmployee::where('userID', $getID)->first();
      $employee_id = $employee['employeeID'];
      $employee = employee::where('id', $employee_id)->with('rolesEmployee.roles', 'projects.tasks.tasks', 'projects.projects')->first();
      $role_emp = $employee['rolesEmployee'][0]['roles']['role'];
      $taskEmployee=taskEmployee::all();
      
        if($role_emp == 'PM'){
            $role_id = roles::where('role', 'DEV')->first();
            $dev = rolesEmployee::where('roleID', $role_id['id'])->with('employee')->get();
            $obj = [
                'dev' => $dev,
                'PM' => $employee,
              ];
            // return $obj['dev'];
            return view('PMview',compact ('obj','role_emp','taskEmployee'));
        }

















        return;
      // configuration for CEO,PM,DEV
        $usersEmployees=userEmployee::all();
        $employee= userEmployee::where('userID', $getID)->first();
        $roleEmployee=rolesEmployee::where('id',$employee['employeeID'])->first();
        $roleValue= roles::where('id', $roleEmployee['roleID'])->first();



        if($roleValue['role']==='PM'){

           // available Tasks for personal  projects
            $a = employee::where('id', $employee['employeeID'])->with('projects.projects')->first();
            return $a;

           $projectsEmployee=projectsEmployee::where('employeeID',$employee['employeeID'])->with('projects')->get();
           return $projectsEmployee;//array prog_id - empl_id
           $personalProjects=projects::whereIn('id', $projectsEmployee['projectID'])->get();
           $taskForProject=taskProject::whereIn('projectID', $personalProjects)->get();
           $tasksData= task::whereIn('id',$allTaskAvailables['taskID'])->get();



           //select all Dev
           $devRole=roles::where('role','=','DEV')->first();
           $devEmployees=rolesEmployee::where('roleID',$devRole['id'])->get();
           $idAllDev[]=$devEmployees['employeeID'];

           $dataDevEmployees=employee::whereIn('id',$idAllDev)->get();
           return view('PMview',compact ('roleValue','nameUser','devEmployees','tasksData','taskForProject'));


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
