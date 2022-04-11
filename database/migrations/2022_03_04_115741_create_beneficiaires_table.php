<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->string('CODEBENEFICIAIRE', 30)->unique();
            $table->string('NOMBENEFICIAIRE', 128);
            $table->string('RUE', 45);
            $table->string('VILLE', 45);
            $table->string('CP', 45);
            $table->string('EMAIL', 50);
            $table->string('TEL', 50);
            $table->string('CONTACT', 45);
            $table->string('GSM', 20);
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
        Schema::dropIfExists('beneficiaires');
    }
}
