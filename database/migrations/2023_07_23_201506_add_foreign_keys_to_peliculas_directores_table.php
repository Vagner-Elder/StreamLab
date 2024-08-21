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
        Schema::table('peliculas_directores', function (Blueprint $table) {
            $table->foreign(['ID_PELICULA'], 'peliculas_directores_ibfk_1')->references(['ID'])->on('peliculas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ID_DIRECTOR'], 'peliculas_directores_ibfk_2')->references(['ID'])->on('directores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peliculas_directores', function (Blueprint $table) {
            $table->dropForeign('peliculas_directores_ibfk_1');
            $table->dropForeign('peliculas_directores_ibfk_2');
        });
    }
};
