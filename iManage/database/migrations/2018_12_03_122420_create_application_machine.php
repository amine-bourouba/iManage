<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationMachine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_machine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('machine_id')->unsigned()->index();
            $table->foreign('machine_id')->references('id')->on('machines');

            $table->integer('application_id')->unsigned()->index();
            $table->foreign('application_id')->references('id')->on('applications');
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
        Schema::dropIfExists('application_machine');
    }
}
