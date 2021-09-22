<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class projects extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='projects';

    public function rolesEmployee(){
      return $this->belongsTo('App\Models\projectsEmployee');
    }

    public function projectsEmployee(){
      return $this->belongsTo('App\Models\projectsEmployee','id','projectID') ;
    }
}
