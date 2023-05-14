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
        Schema::create('agence', function (Blueprint $table) {
            $table->increments('ID_AGENCE');
            $table->unsignedBigInteger('ID_USERS')->index('FK_AGENCE_UTILISATEUR');
            $table->string('NOM')->nullable();
            $table->string('VILLE')->nullable();
            $table->string('DOCUMENT')->nullable();
            $table->string('RCCM')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agence');
    }
};
