<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscapeHolidayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('escape_holiday', function (Blueprint $table){

          $table->increments('id');
          $table->timestamps();

          $table->integer('holiday_id')->unsigned();
          $table->integer('escape_id')->unsigned();

          $table->foreign('holiday_id')->references('id')->on('holidays');
          $table->foreign('escape_id')->references('id')->on('escapes');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('escape_holiday');
    }
}
