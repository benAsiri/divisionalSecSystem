<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mleaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mleaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Emp_Id')->unsingned();
            $table->string('chkMedicalCertificate');
            $table->string('chkChildBirthCertificate');
            $table->date('StartLeaveDate');
            $table->date('EndLeaveDate');
            $table->string('reason');
            $table->integer('noOfChilds');
            $table->string('status');
            $table->foreign('Emp_Id')->references('id_num')->on('employes')->onDelete('cascade');
            $table->timestamps('published_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Mleaves');
    }
}
