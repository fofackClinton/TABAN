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
        Schema::create('localisation', function (Blueprint $table) {
            $table->increments('ID_LOCALISATION');
            $table->unsignedInteger('ID_AGENCE')->index('I_FK_LOCALISATION_AGENCE');
            $table->unsignedInteger('ID_HOTEL')->index('I_FK_LOCALISATION_HOTEL');
            $table->string('LONGITUDE')->nullable();
            $table->string('LATITUDE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localisation');
    }
};
