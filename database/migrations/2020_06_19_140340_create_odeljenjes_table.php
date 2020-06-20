<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdeljenjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odeljenja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->unsignedBigInteger('smer_id');
            $table->unsignedBigInteger('staresina_id');
            $table->integer('broj_ucenika');
            $table->timestamps();
            
            $table->foreign('smer_id')->references('id')->on('smerovi');
            $table->foreign('staresina_id')->references('id')->on('staresine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odeljenja');
    }
}
