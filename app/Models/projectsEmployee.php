<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\projects;

class projectsEmployee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='project-employee';

   public function employee(){
     return $this->hasMany('app\Models\employee', 'id', 'employeeID');
   }

    public function projects(){
      return $this->hasMany('App\Models\projects', 'id', 'projectID');
    }

    public function tasks(){
        return $this->hasMany('App\Models\taskProject', 'projectID', 'projectID');
    }
}
