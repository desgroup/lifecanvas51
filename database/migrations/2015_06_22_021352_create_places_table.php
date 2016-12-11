<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country_code')->nullable();
            $table->string('url_place')->nullable();
            $table->string('url_wikipedia')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->tinyInteger('zoom')->nullable();
            $table->string('filename')->nullable();
            $table->integer('image_id')->nullable()->unsigned();
            $table->integer('zone_id')->nullable()->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::drop('places');
    }
}
