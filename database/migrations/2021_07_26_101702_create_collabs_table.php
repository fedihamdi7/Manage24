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
            $table->bigIncrements('id');
            $table->string('collab_name', 100);
            $table->string('collab_last_name', 100);
            $table->date('collab_dateIn');
            $table->date('collab_dateOut')->nullable();
            $table->string('collab_phone', 8);
            $table->string('collab_mail')->unique();
            $table->bigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('collabs');
    }
}
