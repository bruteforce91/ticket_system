<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class taskProject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='task-project';

    public function projects(){
      return $this->hasMany('app\Models\projects');
    }

    public function tasks(){
      return $this->hasMany('app\Models\task');
    }
}
