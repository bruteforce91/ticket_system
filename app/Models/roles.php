<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class roles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='roles';

    public function rolesEmployee(){
      return $this->belongsTo('app\Models\roles-employee') ;
    }
}
