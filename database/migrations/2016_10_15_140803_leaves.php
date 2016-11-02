<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Leaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Emp_Id');
            $table->string('position');
            $table->string('leavetype');
            $table->string('dept');
            $table->string('commencingleave');
            $table->string('reason');
            $table->string('days');
            $table->string('status');
            $table->timestamps('published_at');
            $table->foreign('Emp_Id')->references('id_num')->on('employes')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leaves');
    }
}