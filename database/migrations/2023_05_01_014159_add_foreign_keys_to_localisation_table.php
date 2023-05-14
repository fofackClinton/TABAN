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
        Schema::table('localisation', function (Blueprint $table) {
            $table->foreign(['ID_AGENCE'], 'FK_LOCALISATION_AGENCE')->references(['ID_AGENCE'])->on('agence');
            $table->foreign(['ID_HOTEL'], 'FK_LOCALISATION_HOTEL')->references(['ID_HOTEL'])->on('hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('localisation', function (Blueprint $table) {
            $table->dropForeign('FK_LOCALISATION_AGENCE');
            $table->dropForeign('FK_LOCALISATION_HOTEL');
        });
    }
};
