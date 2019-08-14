<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_application', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->unsigned()->index();
            $table->foreign('application_id')->references('id')->on('applications');

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
        Schema::dropIfExists('task_application');
    }
}
