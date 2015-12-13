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

              $table->timestamps();

              $table->string('name');
              $table->string('description');
              $table->string('url');
              $table->integer('cost');

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
