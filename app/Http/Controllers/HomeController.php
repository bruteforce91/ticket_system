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

        if($role_emp == 'DEV'){
          $employeeDevWithTasks=employee::where('id',$employee_id)->with('taskEmployee.tasks')->get();
          $devCommits=commits::where('employeeID',$employee_id)->get();
          // return $employeeDevWithTasks[0]['taskEmployee'][1]['tasks'][0];
          return view('DEVview',compact ('employeeDevWithTasks','devCommits','role_emp'));
        }

        if($role_emp=='CEO'){
          $employeeCEO=employee::where('id',$employee_id)->first();

          $roleDev_id = roles::where('role', 'DEV')->first();
          $rolePM_id=roles::where('role', 'PM')->first();
          $allTeams=teams::all();
          $allProjects=projects::all();
          $allDev = rolesEmployee::where('roleID', $roleDev_id['id'])->with('employee')->get();
          $allPM = rolesEmployee::where('roleID', $rolePM_id['id'])->with('employee')->get();

          return view('CEOview',compact ('employeeCEO','role_emp','allTeams','allProjects','allDev','allPM'));
        }


        else{
          return view('home',compact ('roleValue'));
        }

    }
}
