<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('privilege_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->ondelete('restrict')->onupdate('cascade');
            $table->foreign('privilege_id')->references('id')->on('privileges')->ondelete('restrict')->onupdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('privilege_user', function (Blueprint $table) {
            //
        });
    }
}
