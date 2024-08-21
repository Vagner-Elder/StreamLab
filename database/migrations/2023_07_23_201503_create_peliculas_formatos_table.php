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
        Schema::create('peliculas_formatos', function (Blueprint $table) {
            $table->integer('ID_PELICULA');
            $table->integer('ID_FORMATO')->index('ID_FORMATO');

            $table->primary(['ID_PELICULA', 'ID_FORMATO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas_formatos');
    }
};
