<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDutytimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dutytimes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('task_id')->unsigned()->index()->nullable();
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->integer('training_id')->unsigned()->index()->nullable();
            $table->foreign('training_id')->references('id')->on('trainings');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('application_id')->unsigned()->index()->nullable();
            $table->foreign('application_id')->references('id')->on('applications');

            $table->integer('machine_id')->unsigned()->index()->nullable();
            $table->foreign('machine_id')->references('id')->on('machines');

            $table->integer('storage_id')->unsigned()->index()->nullable();
            $table->foreign('storage_id')->references('id')->on('storages');

            $table->string('duty_day');
            $table->string('duty_time');
            $table->string('off_days');
            $table->string('events');
            $table->string('overtime');
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
        Schema::dropIfExists('dutytimes');
    }
}
