<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('enterprise_id')->unsigned()->index()->nullable();
            $table->foreign('enterprise_id')->references('id')->on('enterprises');
            
            $table->string('full_name');
            $table->string('admin');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('email_pro')->unique();
            $table->string('job_title');
            $table->string('office');
            $table->string('department');
            $table->string('enterprise');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('hire_date');
            $table->binary('photo');
            
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
        Schema::dropIfExists('employees');
    }
}
