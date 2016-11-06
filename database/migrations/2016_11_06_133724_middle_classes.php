<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MiddleClasses extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('middle_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lot_no');
            $table->string('plan_no');
            $table->string('file_no');
            $table->string('gs');
            $table->string('grant');
            $table->string('issue_date');
            $table->string('owner');
            $table->string('extent');
            $table->string('present_owner');
            $table->string('present_situ');
            $table->string('nominee');
            $table->string('transfer');
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
        Schema::drop('middle_classes');
    }


}
