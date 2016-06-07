<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('emp_id')->unsigned();//foregin keys
            $table->string('name');
            $table->string('nic');
            $table->string('leaveType');
            $table->string('noOfDays');
            $table->timestamps();

            //$table->foreign('emp_Id')->referencees('id')->on('employes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loans');
    }
}
