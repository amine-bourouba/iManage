<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('email_pro')->unique();
            $table->string('gender');
            $table->string('job_title');
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
        Schema::dropIfExists('members');
    }
}
