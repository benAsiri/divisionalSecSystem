<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('fullname');
            $table->string('id_num');
            $table->string('address');
            $table->dateTime('dob');
            $table->string('sex');
            $table->string('race');
            $table->string('marital_state');
            $table->string('District');

            $table->integer('user_id')->unsigned();

            $table->dateTime('date_of_appoint');
            $table->integer('appointment_no');
            $table->integer('widow_no');
            $table->string('job_position');
            $table->string('job_grade');
            $table->dateTime('penssion_date');

            $table->foreign('user_id')->references('id')->on('users');



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
        Schema::drop('employes');
    }
}
