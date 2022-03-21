<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangers', function (Blueprint $table) {
            $table->id();
            $table->string('codeRanger', 6);
            $table->string('intitulRanger', 100);
            $table->unsignedBigInteger('idArchive');
            $table->foreign('idArchive')->references('id')->on('archives');
            $table->integer('nbrLignes');//11
            $table->integer('nbrColonnes');//11
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
        Schema::dropIfExists('rangers');
    }
}
