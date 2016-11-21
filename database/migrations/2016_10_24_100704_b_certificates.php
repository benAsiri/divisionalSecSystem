<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BCertificates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('b_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nic')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('mName');
            $table->string('imgSide1')->nullable();
            $table->string('imgSide2')->nullable();

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
        //
        Schema::drop('b_certificates');
    }
}
