<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberEnterprise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_enterprise', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('enterprise_id')->unsigned()->index();
            $table->foreign('enterprise_id')->references('id')->on('enterprises');

            $table->integer('member_id')->unsigned()->index();
            $table->foreign('member_id')->references('id')->on('members');
            $table->integer('evaluation')->nullable();
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
        Schema::dropIfExists('member_employee');
    }
}
