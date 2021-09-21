<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\rolesEmployee;
use App\Models\taskEmployee;
use App\Models\User;


class TaskController extends Controller
{
    public function index(){
      
    }

    public function show($id){

    }

    public function store(Request $request){

    }

    public function destroy($id){

    }

    public function assignTasks(Request $request){
        $employeeID=request()->input('employeeID');
        $taskID=request()->input('taskID');
      taskEmployee::create([
        'employeeID'=> $employeeID,
        'taskID'=> $taskID,
      ]);

      return response()->json(['message' => 'ok']);
    }
}
