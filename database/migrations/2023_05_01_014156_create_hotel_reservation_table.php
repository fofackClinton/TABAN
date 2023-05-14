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
        Schema::create('hotel_reservation', function (Blueprint $table) {
            $table->increments('ID_RESERVATION');
            $table->unsignedInteger('ID_C_PUB')->index('I_FK_HOTEL_RESERVATION_CHAMBRE_PUBLICATION');
            $table->unsignedBigInteger('ID_USERS')->index('I_FK_HOTEL_RESERVATION_UTILISATEUR');
            $table->string('NOM')->nullable();
            $table->dateTime('DATE_DEBUT')->nullable();
            $table->dateTime('DATE_FIN')->nullable();
            $table->integer('IDC')->nullable();
            $table->integer('IDD')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_reservation');
    }
};
