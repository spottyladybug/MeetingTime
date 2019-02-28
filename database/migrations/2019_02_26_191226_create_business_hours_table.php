<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->dateTime('start');
            $table->dateTime('finish');
            $table->integer('duration')->nullable();
            $table->string('venue')->nullable();
            $table->timestamps();
        });

        Schema::table('business_hours', function (Blueprint $table){
            $table->foreign('manager_id')->references('id')->on('managers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_hours', function (Blueprint $table){
            $table->dropForeign('business_hours_manager_id_foreign');
        });

        Schema::dropIfExists('business_hours');
    }
}
