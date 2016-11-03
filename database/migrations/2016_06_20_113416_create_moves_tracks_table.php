<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->bigInteger('user_id')->unsigned();
            $table->string('type');
            $table->string('activity')->nullable();
            $table->string('group')->nullable();
            $table->boolean('manual')->nullable();
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('place_id')->unsigned()->nullable();
            $table->string('place_type')->nullable();
            $table->decimal('place_lat', 10, 8)->nullable();
            $table->decimal('place_lng', 11, 8)->nullable();
            $table->decimal('trackpoint_lat', 10, 8)->nullable();
            $table->decimal('trackpoint_lng', 11, 8)->nullable();
            $table->datetime('trackpoint_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('moves_tracks');
    }
}
