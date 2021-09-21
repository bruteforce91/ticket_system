<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class roleEmployee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('role-employee')->insert([
        'id' => 1,
        'roleID'=> 1,
        'employeeID'=>1,
      ]);
    }
}

Schema::create('role-employee', function (Blueprint $table) {
  $table->increments('id')->unique();
  $table->integer('roleID')->unsigned();
  $table->foreign('roleID')->references('id')->on('roles');
  $table->integer('employeeID')->unsigned();
  $table->foreign('employeeID')->references('id')->on('employees');
    $table->timestamps();
    $table->softDeletes();
});
