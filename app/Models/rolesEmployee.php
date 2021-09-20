<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rolesEmployee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='role-employee';

    public function employee(){
      return $this->hasMany('app\Models\employee');
    }

    public function roles(){
      return $this->hasMany('app\Models\roles');
    }
}
