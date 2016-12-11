<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBytesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bytes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->text('story')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->tinyInteger('type')->default('0');
            $table->tinyInteger('privacy')->default('0');
            $table->tinyInteger('time_perspective')->nullable();
            $table->dateTime('byte_date')->nullable();
            $table->string('accuracy')->nullable();
            $table->integer('zone_id')->nullable()->unsigned();
            $table->integer('image_id')->nullable()->unsigned();
            $table->integer('place_id')->nullable()->unsigned();
            $table->integer('user_id')->unsigned();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bytes');
    }
}
