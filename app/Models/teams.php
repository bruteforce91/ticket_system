<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class teams extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='teams';

    public function teamEmployee(){
      return $this->hasMany('App\Models\teamEmployee','teamID','id') ;
    }
}
