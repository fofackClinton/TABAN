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
        Schema::create('vehicul_publication', function (Blueprint $table) {
            $table->increments('ID_PUBLICATION');
            $table->unsignedInteger('ID_VEHICUL')->index('I_FK_VEHICUL_PUBLICATION_VEHICULE');
            $table->string('NOM')->nullable();
            $table->integer('PRIX')->nullable();
            $table->string('DESCRIPTION')->nullable();
            $table->string('PHOTO')->nullable();
            $table->string('TYPE')->nullable();
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
        Schema::dropIfExists('vehicul_publication');
    }
};
