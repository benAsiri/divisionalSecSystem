<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatAdvanceProgram extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->text("name");
            $table->integer('emp_id')->unsigned();
            $table->dateTime('handOverDate');
            $table->dateTime('approvedDate');
            $table->boolean('Status');
            $table->timestamps();
            $table->foreign('emp_id')->references('id_num')->on('employes')->onDelete('cascade');
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('advance_programs');  //
    }
}
