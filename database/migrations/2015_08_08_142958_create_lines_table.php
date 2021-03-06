<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('icon')->nullable();
            $table->integer('user_id');
            $table->nullableTimestamps();
        });

        Schema::create('byte_line', function (Blueprint $table) {
            $table->integer('byte_id')->unsigned()->index();
            $table->foreign('byte_id')->references('id')->on('bytes')->onDelete('cascade');
            $table->integer('line_id')->unsigned()->index();
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('cascade');
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
        Schema::drop('byte_line');
        Schema::drop('lines');
    }
}
