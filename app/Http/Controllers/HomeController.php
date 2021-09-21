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
        $roleEmployee=rolesEmployee::where('employeeID',$employee['employeeID'])->first();
        $roleValue= roles::where('id', $roleEmployee['roleID'])->first();

        if($roleValue['role']==='PM'){
          $projectsEmployee=projectsEmployee::where('employeeID',$employee['employeeID'])->get();
          $personalProjects=projects::select('id','name')->whereIn('id', $projectsEmployee)->get();
          $taskForProject=taskProject::select('id','taskID','projectID')->whereIn('projectID', $personalProjects)->get();

          // no work
          //$tasksData= task::where('id',$taskForProject['projectID'])->get();

          return view('PMview',compact ('roleValue','personalProjects','nameUser'));
        }

        if($roleValue['role']==='DEV'){
          $personalCommits=commits::where('employeeID',$employee['employeeID'])->get();
          $tasksEmployee=taskEmployee::where('employeeID',$employee['employeeID'])->get();
          $personalTasks=task::select('id','status','description')->whereIn('id', $tasksEmployee)->get();
          return view('DEVview',compact ('roleValue','personalTasks','nameUser','personalCommits'));
        }
        else{
          return view('home',compact ('roleValue'));
        }

    }
}
