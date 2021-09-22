<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\taskEmployee;
use App\Models\task;



class TaskController extends Controller
{
    public function index(){

    }
    public function show($id){

    }

    public function store(Request $request){

    }

    public function destroy(Request $request){
      $taskInput=request()->input('tasks');

      $task=taskEmployee::where('taskID',$taskInput)->delete();

       return redirect('home');
    
  }

    public function assignTasks(Request $request){
        $employeeID=request()->input('dev');
        $jsonEmployeeSelected=json_decode($employeeID, true);

        $taskID=request()->input('tasks');

      taskEmployee::create([
        'employeeID'=> $jsonEmployeeSelected['employeeID'],
        'taskID'=>$taskID,
      ]);
      return redirect('home');
    }


}
