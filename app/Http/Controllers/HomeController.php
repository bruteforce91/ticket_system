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
use App\Models\projects;
use App\Models\projectsEmployee;


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
        $rolesEmployees=userEmployee::all();
        $employee= userEmployee::where('userID', $getID)->first();
        $roleEmployee=rolesEmployee::where('employeeID',$employee['employeeID'])->first();
        $roleValue= roles::where('id', $roleEmployee['roleID'])->first();

        if($roleValue['role']==='PM'){
          $allTasks=task::all();
          $projectsEmployee=projectsEmployee::where('employeeID',$employee['employeeID'])->get();
          $personalProjects=projects::select('id','name')->whereIn('id', $projectsEmployee)->get();
          return view('PMview',compact ('roleValue','allTasks','personalProjects','nameUser'));
        }
        else{
          return view('home',compact ('roleValue'));
        }

    }
}
