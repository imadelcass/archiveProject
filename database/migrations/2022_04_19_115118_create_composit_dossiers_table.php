<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompositDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composit_dossiers', function (Blueprint $table) {
            // Add the Auto-Increment column
            $table->increments('id');
            // auto increment needs to be an index (not necessarily primary)
            $table->index(['id']);
            // Remove the primary key
            $table->dropPrimary('id');
            $table->unsignedBigInteger('idTypeDossier');
            $table->foreign('idTypeDossier')->references('id')->on('type_dossiers');
            $table->unsignedBigInteger('idTypePiece');
            $table->foreign('idTypePiece')->references('id')->on('type_pieces');
            // Set the actual primary key
            $table->primary(['idTypeDossier','idTypePiece']);
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
        Schema::dropIfExists('composit_dossiers');
    }
}
