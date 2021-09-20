<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('task-employee', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('employeeID')->unsigned();
        $table->foreign('employeeID')->references('id')->on('employees');
        $table->integer('taskID')->unsigned();
        $table->foreign('taskID')->references('id')->on('tasks');
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
        Schema::dropIfExists('task-employee');
    }
}
