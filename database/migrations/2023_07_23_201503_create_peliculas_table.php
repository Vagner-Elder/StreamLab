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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->string('TITULO');
            $table->text('SINOPSIS');
            $table->string('DURACION',15)->nullable();
            $table->integer('anio_lanzamiento_id')->nullable()->index('anio_lanzamiento_id');
            $table->integer('clasificacion_id')->nullable()->index('clasificacion_id');
            $table->string('CARTEL_URL')->nullable();
            $table->string('PORTADA_URL')->nullable();
            $table->string('TRAILER_URL')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
};
