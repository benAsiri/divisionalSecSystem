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
            $table->string('Emp_Id')->unsingned();
            $table->string('Emp_Name');
            $table->string('Emp_Pos');
            $table->string('Emp_Grade');
            $table->date('Loan_request_date');
            $table->string('Ldoc');
            $table->string('Special_notes');
            $table->foreign('Emp_Id')->references('id_num')->on('employes')->onDelete('cascade');
            $table->timestamps('published_at');
        });
    }

    public function down()
    {
        Schema::drop('loans');
    }
}
