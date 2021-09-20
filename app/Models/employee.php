<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class employee extends Authenticatable
{
    use HasFactory;
        use SoftDeletes;
        /*
        *
        * @var string[]
        */
       protected $fillable = [
           'name',
           'surname',
           'email',
           'password',
       ];

       /**
        * The attributes that should be hidden for serialization.
        *
        * @var array
        */
       protected $hidden = [
           'password',
           'remember_token',
       ];

       /**
        * The attributes that should be cast.
        *
        * @var array
        */
       protected $casts = [
           'email_verified_at' => 'datetime',
       ];


    protected $guarded=['id'];

    protected $table='employees';

    public function taskEmployee(){
      return $this->belongsTo('app\Models\task-employee') ;
    }

    public function rolesEmployee(){
      return $this->belongsTo('app\Models\roles-employee') ;
    }

}
