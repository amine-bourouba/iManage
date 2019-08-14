<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterprises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('enterprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('fax')->unique();
            $table->string('email_pro')->unique();
            $table->string('website')->unique();
            $table->string('address');
            $table->string('activity');
            $table->binary('logo');
            $table->string('covered_region');
            $table->string('category');
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
        Schema::dropIfExists('enterprises');
    }
}
