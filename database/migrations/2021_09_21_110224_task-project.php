<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('task-project', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('taskID')->unsigned();
        $table->foreign('taskID')->references('id')->on('tasks');
        $table->integer('projectID')->unsigned();
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
      Schema::dropIfExists('task-project');
    }
}
