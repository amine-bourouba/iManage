<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageMachine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_machine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('machine_id')->unsigned()->index();
            $table->foreign('machine_id')->references('id')->on('machines');

            $table->integer('storage_id')->unsigned()->index();
            $table->foreign('storage_id')->references('id')->on('storages');
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
        Schema::dropIfExists('storage_machine');
    }
}
