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
        Schema::table('agence', function (Blueprint $table) {
            $table->foreign(['ID_USERS'], 'FK_AGENCE_UTILISATEUR')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agence', function (Blueprint $table) {
            $table->dropForeign('FK_AGENCE_UTILISATEUR');
        });
    }
};
