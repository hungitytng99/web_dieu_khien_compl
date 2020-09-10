<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThietBiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thiet_bi', function (Blueprint $table) {
            $table->increments('id');
 
            $table->string('name');
 
            $table->string('ip_address')->nullable();

            $table->string('port')->nullable();

            $table->boolean('isShowUser');

            $table->string('scriptOn')->nullable();

            $table->string('scriptOff')->nullable();

            $table->string('statusPath')->nullable();

            $table->timestamp('start_time')->nullable();

            $table->timestamp('stop_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thiet_bi');
    }
}
