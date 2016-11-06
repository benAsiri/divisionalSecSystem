<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class LDOPermits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_d_o__permits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permit_no')->unique();
            $table->string('GS_division');
            $table->string('name_of_village');
            $table->string('name_of_land');
            $table->string('permit_holder_name');
            $table->string('extent');
            $table->string('present_owner');
            $table->string('present_situation');
            $table->string('cancellation');
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
        Schema::drop('l_d_o__permits');
    }
}