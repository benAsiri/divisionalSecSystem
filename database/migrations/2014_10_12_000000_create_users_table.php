<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
<<<<<<< HEAD
            $table->string('password', 60);
            $table->string('image');
=======
            $table->string('NIC')->unique();
            $table->string('status');
            $table->string('position');
            $table->string('password', 60);

            $table->integer('emp_id')->unsigned();

>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
