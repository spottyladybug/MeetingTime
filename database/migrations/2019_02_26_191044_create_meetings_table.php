<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('employer_id')->nullable();
            $table->unsignedBigInteger('manager_id');
            $table->dateTime('start');
            $table->dateTime('finish');
            $table->string('venue')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('meetings',function (Blueprint $table){
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('employer_id')->references('id')->on('employers');
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
        Schema::table('meetings', function (Blueprint $table){
            $table->dropForeign('meetings_candidate_id_foreign');
            $table->dropForeign('meetings_employer_id_foreign');
            $table->dropForeign('meetings_manager_id_foreign');
        });

        Schema::dropIfExists('meetings');
    }
}
