<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('NUMDOSSIER', 30);
            $table->unsignedBigInteger('IDTYPEDOSSIER');
            $table->foreign('IDTYPEDOSSIER')->references('id')->on('type_dossiers');
            $table->unsignedBigInteger('IDSERVICE');
            $table->foreign('IDSERVICE')->references('id')->on('services');
            $table->unsignedBigInteger('IDBENEFICIAIRE');
            $table->foreign('IDBENEFICIAIRE')->references('id')->on('beneficiaires');
            $table->date('DATEDOSSIER');
            $table->unsignedBigInteger('idCellule');
            $table->foreign('idCellule')->references('id')->on('cellules');
            $table->integer('AnneeDossier');
            $table->string('ObjetDossier', 250);
            $table->boolean('DISPODOSSIER');
            $table->boolean('VALID');
            $table->unsignedBigInteger('VALIDPAR')->nullable();
            $table->foreign('VALIDPAR')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('dossiers');
    }
}
