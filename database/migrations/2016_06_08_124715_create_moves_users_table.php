<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves_users', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->string('access_token');
            $table->string('refresh_token');
            $table->integer('expires_in');
            $table->string('error_code')->nullable();
            $table->boolean('disabled')->nullable();
            $table->timestamps();

            $table->primary(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('moves_users');
    }
}
