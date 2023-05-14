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
        Schema::create('chambre', function (Blueprint $table) {
            $table->increments('ID_CHAMBRE');
            $table->unsignedInteger('ID_HOTEL')->index('I_FK_CHAMBRE_HOTEL');
            $table->integer('PRIX')->nullable();
            $table->string('CATEGORI')->nullable();
            $table->string('TYPE')->nullable();
            $table->string('DESCRIPTION')->nullable();
            $table->string('PHOTO_CHAMBRE')->nullable();
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
        Schema::dropIfExists('chambre');
    }
};
