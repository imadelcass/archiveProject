<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellules', function (Blueprint $table) {
            $table->id();
            $table->string('codeCellule', 20);
            $table->unsignedBigInteger('idRanger');
            $table->foreign('idRanger')->references('id')->on('rangers');
            $table->integer('numLigne');
            $table->integer('numColonne');//
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
        Schema::dropIfExists('cellules');
    }
}
