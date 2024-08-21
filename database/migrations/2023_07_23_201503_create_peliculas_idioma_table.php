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
        Schema::create('peliculas_idioma', function (Blueprint $table) {
            $table->integer('ID_PELICULA');
            $table->integer('ID_IDIOMA')->index('ID_IDIOMA');

            $table->primary(['ID_PELICULA', 'ID_IDIOMA']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas_idioma');
    }
};
