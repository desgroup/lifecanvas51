<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContinentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continents', function(Blueprint $table)
        {
            $table->string('continent_code')->unique();
            $table->string('continent_name');
            $table->string('un_code')->nullable();
        });

        Schema::create('continents_countries', function (Blueprint $table) {
            $table->string('continent_code');
            $table->foreign('continent_code')->references('continent_code')->on('continents')->onDelete('cascade');
            $table->string('country_code');
            $table->foreign('country_code')->references('country_code')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('continents_countries');
        Schema::drop('continents');
    }
}
