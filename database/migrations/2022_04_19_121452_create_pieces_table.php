<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->string('numPiece',30);
            $table->unsignedBigInteger('idTypePiece');
            $table->foreign('idTypePiece')->references('id')->on('type_pieces');
            $table->string('intitulePiece',128);
            $table->unsignedBigInteger('idDossier');
            $table->string('file');
            $table->foreign('idDossier')->references('id')->on('dossiers');
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
        Schema::dropIfExists('pieces');
    }
}
