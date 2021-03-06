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
use App\Models\teamEmployee;
use DB;

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
      $employee = employee::where('id', $employee_id)->with('rolesEmployee.roles', 'projectsPM.tasks.tasks', 'projectsPM.projects')->first();
      $role_emp = $employee['rolesEmployee'][0]['roles']['role'];
      $taskEmployee=taskEmployee::all();

        if($role_emp == 'PM'){
            $role_id = roles::where('role', 'DEV')->first();
            $dev = rolesEmployee::where('roleID', $role_id['id'])->with('employee')->get();
            $obj = [
                'dev' => $dev,
                'PM' => $employee,
              ];
            //return $obj;
            return view('PMview',compact ('obj','role_emp','taskEmployee'));
        }

        if($role_emp == 'DEV'){
          $employeeDevWithTasks=employee::where('id',$employee_id)->with('taskEmployee.tasks')->get();
          $devCommits=commits::where('employeeID',$employee_id)->get();

          // query PM di riferimento
          $PM=rolesEmployee::where('roleID',2)->with('employee')->get();
          $DEVTeam=teamEmployee::where('employeeID',$employee_id)->first();
          $PMEmployee=teamEmployee::whereIn('employeeID',$PM)->with('employee','teams')->where('teamID',$DEVTeam['teamID'])->get();
          return view('DEVview',compact ('employeeDevWithTasks','devCommits','role_emp','PMEmployee'));

        }

        if($role_emp=='CEO'){
          $employeeCEO=employee::where('id',$employee_id)->first();
          $projectEmployee =projectsEmployee::with('projects.projectsEmployee','employee.projects')->get();
          $proj=projects::with('projectsEmployee.employee')->get();
          $roleDev_id = roles::where('role', 'DEV')->first();
          $rolePM_id=roles::where('role', 'PM')->first();
          $allTeams=teams::all();
          $allProjects=projects::all();
          $allDev = rolesEmployee::where('roleID', $roleDev_id['id'])->with('employee')->get();
          $allPM = rolesEmployee::where('roleID', $rolePM_id['id'])->with('employee')->get();
          $allEmployee=[
            $allDev,$allPM
          ];
          // return $allEmployee[0][0]['employee'][0]['name'];
          $teamEmployee=teams::with('teamEmployee.employee')->get();

          // cross projects
          $query = DB::table("task-project")
                ->select("task-project.taskID", "task-project.projectID", "task-employee.employeeID", "team-employee.teamID" )
                ->join("task-employee", "task-employee.taskID", "=", "task-project.taskID")
                ->join("team-employee", "team-employee.employeeID", "=", "task-employee.employeeID")
                ->get()
                ->groupBy("projectID")->toArray();


            $project_id = [];
            $cross = false;
            $flag = false;
            foreach ($query as $key => $value){
                foreach ($value as $v){
                    if(!$flag){
                        $flag=$v->teamID;
                    }
                    if($v->teamID != $flag){
                        $cross = true;
                    }
                }
                if($cross){
                    array_push($project_id, $key);
                }
                $flag = null;
                $cross = false;
            }
            $nameProjCross=projects::where('id',$project_id)->get();
          return view('CEOview',compact ('nameProjCross','employeeCEO','role_emp','allTeams','allProjects','allDev','allPM','teamEmployee','allEmployee','projectEmployee'));
        }
        else{
          return view('home',compact ('roleValue'));
        }

    }
}
