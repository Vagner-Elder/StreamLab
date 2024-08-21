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
        Schema::create('peliculas_genero', function (Blueprint $table) {
            $table->integer('ID_PELICULA');
            $table->integer('ID_GENERO')->index('ID_GENERO');

            $table->primary(['ID_PELICULA', 'ID_GENERO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas_genero');
    }
};
