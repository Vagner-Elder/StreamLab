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
        Schema::table('peliculas_actores', function (Blueprint $table) {
            $table->foreign(['ID_PELICULA'], 'peliculas_actores_ibfk_1')->references(['ID'])->on('peliculas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ID_ACTOR'], 'peliculas_actores_ibfk_2')->references(['ID'])->on('actores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peliculas_actores', function (Blueprint $table) {
            $table->dropForeign('peliculas_actores_ibfk_1');
            $table->dropForeign('peliculas_actores_ibfk_2');
        });
    }
};