<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_application', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->unsigned()->index();
            $table->foreign('application_id')->references('id')->on('applications');

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
        Schema::dropIfExists('training_application');
    }
}
