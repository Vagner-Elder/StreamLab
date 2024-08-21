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
        Schema::create('peliculas_actores', function (Blueprint $table) {
            $table->integer('ID_PELICULA');
            $table->integer('ID_ACTOR')->index('ID_ACTOR');

            $table->primary(['ID_PELICULA', 'ID_ACTOR']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas_actores');
    }
};
