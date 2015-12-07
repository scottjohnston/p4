<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('escapes', function(Blueprint $table)
          {
              $table->increments('id');
              //$table->integer('user_id')->unsigned(); //FK
              $table->timestamps();

              $table->string('name');
              $table->string('description');
              $table->string('url');
              $table->integer('cost');

              //$table->foreign('user_id')->references('id')->on('users');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('escapes');
    }
}
