<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoroscopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horoscopes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->unique();
            $table->boolean('status')->default(0);
            $table->string('aries', '1000');
            $table->string('taurus', '1000');
            $table->string('gemini', '1000');
            $table->string('cancer', '1000');
            $table->string('leo', '1000');
            $table->string('virgo', '1000');
            $table->string('libra', '1000');
            $table->string('scorpio', '1000');
            $table->string('sagittarius', '1000');
            $table->string('capricorn', '1000');
            $table->string('aquarius', '1000');
            $table->string('pisces', '1000');
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
        Schema::dropIfExists('horoscopes');
    }
}
