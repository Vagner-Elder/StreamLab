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
        Schema::table('peliculas', function (Blueprint $table) {
            $table->foreign(['anio_lanzamiento_id'], 'peliculas_ibfk_1')->references(['ID'])->on('anio_lanzamiento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['clasificacion_id'], 'peliculas_ibfk_2')->references(['ID'])->on('clasificacion')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            $table->dropForeign('peliculas_ibfk_1');
            $table->dropForeign('peliculas_ibfk_2');
        });
    }
};
