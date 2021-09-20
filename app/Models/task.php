<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];

    protected $table='tasks';

    public function taskEmployee(){
      return $this->belongsTo('app\Models\task-employee') ;
    }
}
