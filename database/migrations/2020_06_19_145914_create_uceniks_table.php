<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUceniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ucenici', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime_prezime');
            $table->date('datum_rodjenja');
            $table->decimal('broj_bodova', 11, 2);
            $table->integer('jmbg');
            $table->integer('pol');
            $table->unsignedBigInteger('odeljenje_id')->nullable();
            $table->timestamps();

            $table->foreign('odeljenje_id')->references('id')->on('odeljenja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ucenici');
    }
}
