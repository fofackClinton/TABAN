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
        Schema::create('chambre_publication', function (Blueprint $table) {
            $table->increments('ID_C_PUB');
            $table->unsignedInteger('ID_CHAMBRE')->index('I_FK_CHAMBRE_PUBLICATION_CHAMBRE');
            $table->string('TYPE')->nullable();
            $table->integer('PRIX')->nullable();
            $table->string('DESCRIPTION')->nullable();
            $table->string('PHOTO')->nullable();
            $table->string('VILLE')->nullable();
            $table->integer('IDC')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chambre_publication');
    }
};
