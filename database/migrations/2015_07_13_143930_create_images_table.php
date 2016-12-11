<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('caption')->nullable();
            $table->text('notes')->nullable();
            $table->string('filename');
            $table->string('extension')->nullable();
            $table->integer('file_type')->nullable();
            $table->integer('rights')->default('0');
            $table->integer('size_kb')->nullable();
            $table->integer('height_px')->nullable();
            $table->integer('width_px')->nullable();
            $table->integer('zone_id')->nullable()->unsigned();
            $table->dateTime('image_date')->nullable();
            $table->double('image_lat')->nullable();
            $table->double('image_lng')->nullable();
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
        Schema::drop('images');
    }
}
