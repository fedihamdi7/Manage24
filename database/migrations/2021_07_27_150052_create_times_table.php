<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mission_id')->unsigned();
            $table->bigInteger('collab_id')->unsigned();
            $table->date('date_start');
            $table->date('date_finish');
            $table->time('start_time');
            $table->time('finish_time');
            $table->time('elapsed_time');
            $table->foreign('collab_id')->references('id')->on('collabs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('times');
    }
}
