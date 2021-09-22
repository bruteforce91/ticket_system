<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class taskEmployee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='task-employee';

    public function employee(){
      return $this->hasMany('App\Models\employee', 'id', 'employeeID');
    }

    public function tasks(){
      return $this->hasMany('app\Models\task', 'id','taskID');
    }
}
