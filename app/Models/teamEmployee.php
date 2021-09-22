<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class teamEmployee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='team-employee';

    public function employee(){
      return $this->hasMany('App\Models\employee', 'id', 'employeeID');
    }

    public function teams(){
      return $this->hasMany('App\Models\teams','id','teamID');
    }
}
