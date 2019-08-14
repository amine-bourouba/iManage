<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('name');
            $table->string('category');
            $table->string('location');
            $table->double('free_space');
            $table->double('capacity');
            $table->string('extension')->nullable();
            $table->string('serial_number')->unique()->nullable();
            $table->string('model')->nullable();
            $table->string('file_system')->nullable();
            $table->string('electric_power')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('installation_date')->nullable();
            $table->string('state')->nullable();
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
        Schema::dropIfExists('storages');
    }
}
