<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tickets', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('employeeID')->unsigned();;
        $table->foreign('employeeID')->references('id')->on('employees');
        $table->DateTime('time');
        $table->enum('type', ['in', 'out']);
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
        Schema::dropIfExists('tickets');
    }
}
