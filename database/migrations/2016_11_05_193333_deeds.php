<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Deeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('deeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deed_no')->unique();
            $table->string('deed_type');
            $table->string('deed_owner');
            $table->string('extent');
            $table->string('present_owner');
            $table->string('nominee');
            $table->string('reference_no');
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
        Schema::drop('deeds');
    }
}
