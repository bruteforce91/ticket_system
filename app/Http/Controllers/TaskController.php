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

    public function destroy($id){
      $task=taskEmployee::where('taskID',$id)->delete();
       if ($task){
         $data=[
         'status'=>'1',
         'msg'=>'success'
       ];
       }else{
         $data=[
         'status'=>'0',
         'msg'=>'fail'
       ];
       return response()->json($data);
    }
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
