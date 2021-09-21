<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class commits extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='commits';

    public function employee(){
      return $this->hasMany('app\Models\employee');
    }

    public function tasks(){
      return $this->hasMany('app\Models\projects');
    }
}
