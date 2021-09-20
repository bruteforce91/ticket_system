<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project-employee', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('projectID')->unsigned();;
        $table->integer('employeeID')->unsigned();;
        $table->foreign('employeeID')->references('id')->on('employees');
        $table->foreign('projectID')->references('id')->on('projects');
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
      Schema::dropIfExists('project-employee');
    }
}
