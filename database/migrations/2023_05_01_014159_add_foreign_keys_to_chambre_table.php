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
        Schema::table('chambre', function (Blueprint $table) {
            $table->foreign(['ID_HOTEL'], 'FK_CHAMBRE_HOTEL')->references(['ID_HOTEL'])->on('hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chambre', function (Blueprint $table) {
            $table->dropForeign('FK_CHAMBRE_HOTEL');
        });
    }
};
