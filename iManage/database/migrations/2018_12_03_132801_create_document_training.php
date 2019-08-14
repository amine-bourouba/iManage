<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTraining extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_training', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id')->unsigned()->index();
            $table->foreign('document_id')->references('id')->on('documents');

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
        Schema::dropIfExists('document_training');
    }
}
