<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingMachine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_machine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('machine_id')->unsigned()->index();
            $table->foreign('machine_id')->references('id')->on('machines');

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
        Schema::dropIfExists('training_machine');
    }
}
