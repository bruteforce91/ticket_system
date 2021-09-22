<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\roles;

class rolesEmployee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='role-employee';

    public function employee(){
        return $this->hasMany('App\Models\employee', 'id', 'employeeID');
    }

    public function roles(){
        return $this->hasOne('App\Models\roles', 'id', 'roleID');
    }
}
