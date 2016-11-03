<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->string('first_date');
            $table->string('timezone');
            $table->integer('timezone_offset');
            $table->string('language');
            $table->string('locale');
            $table->integer('first_weekday');
            $table->boolean('metric');
            $table->boolean('calories_available');
            $table->string('platform');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('moves_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('moves_profiles');
    }
}
