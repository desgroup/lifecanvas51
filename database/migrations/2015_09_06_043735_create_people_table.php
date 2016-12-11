<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('relationship')->nullable();;
            $table->integer('account_id')->nullable();;
            $table->integer('user_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('byte_people', function (Blueprint $table) {
            $table->integer('byte_id')->unsigned()->index();
            $table->foreign('byte_id')->references('id')->on('bytes')->onDelete('cascade');
            $table->integer('people_id')->unsigned()->index();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('byte_people');
        Schema::drop('people');
    }
}
