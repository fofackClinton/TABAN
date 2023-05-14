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
        Schema::create('hotel', function (Blueprint $table) {
            $table->increments('ID_HOTEL');
            $table->unsignedBigInteger('ID_USERS')->index('I_FK_HOTEL_UTILISATEUR');
            $table->string('NOM_HOTEL')->nullable();
            $table->string('CATEGORIE_HOTEL')->nullable();
            $table->string('LOCALISATION')->nullable();
            $table->string('DOCUMENT')->nullable();
            $table->string('RCCM')->nullable();
            $table->string('VILLE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel');
    }
};
