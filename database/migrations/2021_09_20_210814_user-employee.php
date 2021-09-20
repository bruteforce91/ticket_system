<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user-employee', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('employeeID')->unsigned();
        $table->foreign('employeeID')->references('id')->on('employees');
        $table->integer('userID')->unsigned();
        $table->foreign('userID')->references('id')->on('users');
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
        Schema::dropIfExists('user-employee');
    }
}
