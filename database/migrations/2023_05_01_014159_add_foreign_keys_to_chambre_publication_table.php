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
        Schema::table('chambre_publication', function (Blueprint $table) {
            $table->foreign(['ID_CHAMBRE'], 'FK_CHAMBRE_PUBLICATION_CHAMBRE')->references(['ID_CHAMBRE'])->on('chambre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chambre_publication', function (Blueprint $table) {
            $table->dropForeign('FK_CHAMBRE_PUBLICATION_CHAMBRE');
        });
    }
};
