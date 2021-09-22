<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class employee extends Model
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
      return $this->belongsTo('app\Models\taskEmployee') ;
    }

    public function rolesEmployee(){
        return $this->hasMany('App\Models\rolesEmployee', 'employeeID', 'id');
    }

    public function projects(){
        return $this->hasMany('App\Models\projectsEmployee', 'employeeID', 'id');
    }

}
