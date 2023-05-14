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
        Schema::table('hotel_reservation', function (Blueprint $table) {
            $table->foreign(['ID_C_PUB'], 'FK_HOTEL_RESERVATION_CHAMBRE_PUBLICATION')->references(['ID_C_PUB'])->on('chambre_publication');
            $table->foreign(['ID_USERS'], 'FK_HOTEL_RESERVATION_UTILISATEUR')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_reservation', function (Blueprint $table) {
            $table->dropForeign('FK_HOTEL_RESERVATION_CHAMBRE_PUBLICATION');
            $table->dropForeign('FK_HOTEL_RESERVATION_UTILISATEUR');
        });
    }
};
