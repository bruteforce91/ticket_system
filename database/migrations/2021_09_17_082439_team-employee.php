<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('team-employee', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('employeeID')->unsigned();
        $table->foreign('employeeID')->references('id')->on('employees');
        $table->integer('teamID')->unsigned();;
        $table->foreign('teamID')->references('id')->on('teams');
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
        Schema::dropIfExists('team-employee');
    }
}
