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
        Schema::table('vehicul_publication', function (Blueprint $table) {
            $table->foreign(['ID_VEHICUL'], 'FK_VEHICUL_PUBLICATION_VEHICULE')->references(['ID_VEHICUL'])->on('vehicule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicul_publication', function (Blueprint $table) {
            $table->dropForeign('FK_VEHICUL_PUBLICATION_VEHICULE');
        });
    }
};
