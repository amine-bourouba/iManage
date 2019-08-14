<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('machine_id')->unsigned()->index()->nullable();
            $table->foreign('machine_id')->references('id')->on('machines');

            $table->integer('storage_id')->unsigned()->index()->nullable();
            $table->foreign('storage_id')->references('id')->on('storages');

            $table->integer('application_id')->unsigned()->index()->nullable();
            $table->foreign('application_id')->references('id')->on('applications');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->string('type');
            $table->string('name');
            $table->double('size');
            $table->Text('content');
            $table->text('user_manual')->nullable();
            $table->text('workshop_manual')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
