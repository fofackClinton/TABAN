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
        Schema::table('vehicul_reservation', function (Blueprint $table) {
            $table->foreign(['ID_USERS'], 'FK_VEHICUL_RESERVATION_UTILISATEUR')->references(['id'])->on('users');
            $table->foreign(['ID_PUBLICATION'], 'FK_VEHICUL_RESERVATION_VEHICUL_PUBLICATION')->references(['ID_PUBLICATION'])->on('vehicul_publication');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicul_reservation', function (Blueprint $table) {
            $table->dropForeign('FK_VEHICUL_RESERVATION_UTILISATEUR');
            $table->dropForeign('FK_VEHICUL_RESERVATION_VEHICUL_PUBLICATION');
        });
    }
};
