<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teams;
use App\Models\teamEmployee;


class TeamController extends Controller
{
  public function index(){

  }
  public function show($id){

  }

  public function store(Request $request){

  }

  public function destroy($id){

  }

  public function assignTeam(Request $request){
      $devSelected=request()->input('dev');
      $jsonDevSelected=json_decode($devSelected, true);

      $team=request()->input('teams');
      $jsonTeam=json_decode($team, true);
      $teamSelected=teams::where('name',$jsonTeam['name'])->first();

      $obj = [
                  'teamID' => $teamSelected['id'],
                  'employeeID' => $jsonDevSelected['id'],
              ];
    teamEmployee::create($obj);

     return redirect('home');
  }
}
