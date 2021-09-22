<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userEmployee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='user-employee';

    public function employee(){
      return $this->hasOne('App\Models\employee');
    }

    public function users(){
      return $this->hasMany('app\Models\users');
    }
}
