<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_application', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->unsigned()->index();
            $table->foreign('application_id')->references('id')->on('applications');

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
        Schema::dropIfExists('storage_application');
    }
}
