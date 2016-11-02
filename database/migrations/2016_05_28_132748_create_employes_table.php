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
            $table->string('id_num')->unique();
            $table->string('address');
            $table->date('dob');
            $table->string('gender');
            $table->string('race');
            $table->string('marital_state');
            $table->string('District');
            $table->dateTime('date_of_appoint');
            $table->integer('appointment_no');
            $table->integer('widow_no');
            $table->string('job_position');
            $table->string('job_grade');
            $table->date('penssion_date');

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
