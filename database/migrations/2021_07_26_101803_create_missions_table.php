<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->time('start_time');
            $table->time('end_time');
            $table->time('elapsed_time');
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
        Schema::dropIfExists('missions');
    }
}
