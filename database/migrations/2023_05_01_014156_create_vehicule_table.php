<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicule', function (Blueprint $table) {
            $table->increments('ID_VEHICUL');
            $table->unsignedInteger('ID_AGENCE')->index('I_FK_VEHICULE_AGENCE');
            $table->string('NOM')->nullable();
            $table->string('TYPE')->nullable();
            $table->string('DESCRIPTION')->nullable();
            $table->integer('PRIX')->nullable();
            $table->string('PHOTO')->nullable();
            $table->integer('IDC')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicule');
    }
};
