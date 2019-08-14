<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskMachine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_machine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('machine_id')->unsigned()->index();
            $table->foreign('machine_id')->references('id')->on('machines');

            $table->integer('task_id')->unsigned()->index();
            $table->foreign('task_id')->references('id')->on('tasks');
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
        Schema::dropIfExists('task_machine');
    }
}
