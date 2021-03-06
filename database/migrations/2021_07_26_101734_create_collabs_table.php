<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collabs', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->unique();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('collab_name', 100);
            // $table->string('collab_last_name', 100);
            $table->date('collab_dateIn');
            $table->date('collab_dateOut')->nullable();
            // $table->string('collab_phone', 8);
            // $table->string('collab_mail')->unique();
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            // $table->string('token', 100)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collabs');
    }
}
