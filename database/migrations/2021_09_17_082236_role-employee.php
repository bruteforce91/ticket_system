<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoleEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('role-employee', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('roleID')->unsigned();
        $table->foreign('roleID')->references('id')->on('roles');
        $table->integer('employeeID')->unsigned();
        $table->foreign('employeeID')->references('id')->on('employees');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('role-employee');
    }
}
