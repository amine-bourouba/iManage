<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->unique();
            $table->string('model');
            $table->string('electric_power');
            $table->string('manufacturer');
            $table->string('machine_name');
            $table->string('installation_date');
            $table->string('software_version');
            $table->string('hardware_version');
            $table->string('ip_address');
            $table->string('mac_address')->unique();
            $table->string('delivery_date');
            $table->string('category');
            $table->string('location');
            $table->string('state');
            $table->string('notification');
            $table->string('type');
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
        Schema::dropIfExists('machines');
    }
}
