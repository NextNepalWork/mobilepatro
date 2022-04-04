<?php

use App\Models\Backend\CardAlignment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardAlignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_alignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alignment');
            $table->timestamps();
        });

        CardAlignment::insert([
            ['alignment' => 'Top'],
            ['alignment' => 'Bottom'],
            ['alignment' => 'Left'],
            ['alignment' => 'Right'],
            ['alignment' => 'Center'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_alignments');
    }
}
