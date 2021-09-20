<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewCommit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('commits', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('employeeID')->unsigned();
        $table->foreign('employeeId')->references('id')->on('employees');
        $table->integer('taskID')->unsigned();
        $table->foreign('taskID')->references('id')->on('tasks');
        $table->string('title');
        $table->text('description');
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
        Schema::dropIfExists('commits');
    }
}
