<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingStorage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_storage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('storage_id')->unsigned()->index();
            $table->foreign('storage_id')->references('id')->on('storages');

            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('id')->on('trainings');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_storage');
    }
}
